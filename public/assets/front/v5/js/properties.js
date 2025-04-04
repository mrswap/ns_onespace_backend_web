function updateURL(data) {
  $('.request-loader').addClass('show');
  let name = data.split('=')[0];

  if (name == 'type') {
    reset();
    getCategories(data.split('=')[1]);

  } else if (name == 'category') {
    let currentURLq = window.location.href;
    let mainUrl = currentURLq.split('?')[0];
    let prevUrlq = currentURLq.split('?')[1];
    let newUrlArrayq = prevUrlq ? prevUrlq.split('&') : [];
    reset();


    newUrlArrayq.forEach((url, index) => {

      let urlNq = url.split('=');
      if (urlNq[0] == 'type') {
        var updatedURLq = mainUrl + '?' + url;
        window.history.pushState({
          path: updatedURLq
        }, '', updatedURLq);
        getCategories(urlNq[1])
      }


    });


  } else if (name == 'country') {

    let currentURLq = window.location.href;
    let mainUrl = currentURLq.split('?')[0];
    let prevUrlq = currentURLq.split('?')[1];
    let newUrlArrayq = prevUrlq ? prevUrlq.split('&') : [];

    newUrlArrayq.forEach((url, index) => {
      let urlNq = url.split('=');
      if (urlNq[0] == 'state') {
        newUrlArrayq.splice(index, 1);

      }
    });

    newUrlArrayq.forEach((url, index) => {
      let urlNq = url.split('=');
      if (urlNq[0] == 'city') {
        newUrlArrayq.splice(index, 1);
      }

    });

    let newUrl = newUrlArrayq.join("&")
    var updatedURLq = mainUrl + '?' + newUrl;
    window.history.pushState({
      path: updatedURLq
    }, '', updatedURLq);

  } else if (name == 'state') {
    requestArrayRmvfromUrl('city')

  } else if (name == 'min' || name == 'max') {
    requestArrayRmvfromUrl('price')
    $('#pricetype input:radio[value="all"]').prop('checked', true);
  } else if (name == 'price') {
    requestArrayRmvfromUrl('min')
    requestArrayRmvfromUrl('max')
  } else if (name == 'sort') {
    if (data.split('=')[1] == 'high-to-low' || data.split('=')[1] == 'low-to-high') {
      $('#pricetype input:radio[value="fixed"]').prop('checked', true);
      requestArrayRmvfromUrl('min')
      requestArrayRmvfromUrl('max')
      this.updateURL('price=fixed');
    }

  }

  var currentURL = window.location.href;
  if (currentURL.indexOf('?') != -1) {

    if (data) {
      let prevUrl = currentURL.split('?')[1];
      let newUrlArray = prevUrl.split('&');
      let found = false;
      let replace = false;
      newUrlArray.forEach((url, index) => {
        if (url == data) {
          found = true;
        } else {
          let urlN = url.split('=');
          let dataN = data.split('=');
          if (urlN[0] == dataN[0]) {
            newUrlArray[index] = data;
            replace = true;
          }
        }

      });

      if (!found && !replace) {
        var updatedURL = currentURL + '&' + data;
        window.history.pushState({
          path: updatedURL
        }, '', updatedURL);
      } else {
        let joined = newUrlArray.join('&')
        let mainUrl = currentURL.split('?')[0];
        var updatedURL = mainUrl + '?' + joined;
        window.history.pushState({
          path: updatedURL
        }, '', updatedURL);
      }

    }

  } else {
    var updatedURL = currentURL + '?' + data;
    window.history.pushState({
      path: updatedURL
    }, '', updatedURL);
  }
  getData(updatedURL);
}

function requestArrayRmvfromUrl(requestName) {
  let currentURLq = window.location.href;
  let mainUrl = currentURLq.split('?')[0];
  let prevUrlq = currentURLq.split('?')[1];
  let newUrlArrayq = prevUrlq ? prevUrlq.split('&') : [];

  newUrlArrayq.forEach((url, index) => {
    let urlNq = url.split('=');
    if (urlNq[0] == requestName) {
      newUrlArrayq.splice(index, 1);

    }
    let newUrl = newUrlArrayq.join("&")
    var updatedURLq = mainUrl + '?' + newUrl;
    window.history.pushState({
      path: updatedURLq
    }, '', updatedURLq);
  });
}
function updateAmenities(data, checkbox) {

  var currentURL = window.location.href;
  if (currentURL.indexOf('?') != -1) {

    if (data) {
      let prevUrl = currentURL.split('?')[1];
      let newUrlArray = prevUrl.split('&');
      let found = false;


      newUrlArray.forEach((url, index) => {
        let durl = decodeURIComponent(url);
        if (durl == data) {
          found = true;
          if ($('#' + checkbox.id + ':checkbox:checked').length <= 0) {
            newUrlArray.splice(index, 1);
            var updatedURL = currentURL + '&' + newUrlArray;
            window.history.pushState({
              path: updatedURL
            }, '', updatedURL);
          }
        }

      });
      if (!found) {
        var updatedURL = currentURL + '&' + data;

        window.history.pushState({
          path: updatedURL
        }, '', updatedURL);
      } else {
        let joined = newUrlArray.join('&')
        let mainUrl = currentURL.split('?')[0];
        var updatedURL = mainUrl + '?' + joined;
        window.history.pushState({
          path: updatedURL
        }, '', updatedURL);
      }

    }

  } else {
    var updatedURL = currentURL + '?' + data;
    window.history.pushState({
      path: updatedURL
    }, '', updatedURL);
  }
  $('.request-loader').addClass('show');
  getData(updatedURL);
}

function getData(currentURL, page) {
  var n = $('.properties')
  $.ajax({
    type: 'GET',
    url: currentURL,
    data: {
      page: page,
    },
    success: function (data) {

      $('.properties').html();
      $('.properties').html(data.propertyContents);

      var property_contents = data.properties;
      properties = property_contents.data;
      mapInitialize(property_contents.data);


    },
    complete: function () {
      $(".request-loader").removeClass('show'); $("html, body").animate({ scrollTop: 0 })

    }




  });
}

function getCategories(type) {
  $.ajax({
    type: 'GET',
    url: baseURL + '/categories?type=' + type,

    success: function (data) {
      let ul = $("#catogoryul");
      $('#catogoryul').empty();

      $('#categories .list-item a').removeClass('active');

      let urlParams = new URLSearchParams(window.location.search);
      let scategory = urlParams.get('category');
      if (scategory == 'all') {
        $('#categories .list-item a').addClass('active')
      }

      data.categories.forEach(item => {

        ul.append(`<li class="list-item">

                <a class="${item.category_content.slug == scategory ? 'active' : ''}"
                    onclick="updateURL('category=${item.category_content.slug}')">
                    ${item.category_content.name} </a>
            </li>`);
      });


    }, complete: function () {
      $(".request-loader").removeClass('show');
    }
  });
}
function resetURL() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = false;
  });

  document.getElementById('searchForm').reset();
  priceRest();
  var currentURL = window.location.href;
  if (currentURL.indexOf('?') != -1) {
    let updatedURL = currentURL.split('?')[0];
    window.history.pushState({
      path: updatedURL
    }, '', updatedURL);
    getData(updatedURL)
  }
}
function reset() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = false;
  });

  document.getElementById('searchForm').reset();
  priceRest();
  $('select[name="sort"]').val($('select[name="sort"] option:first').val());

  var currentURL = window.location.href;
  if (currentURL.indexOf('?') != -1) {
    let updatedURL = currentURL.split('?')[0];
    window.history.pushState({
      path: updatedURL
    }, '', updatedURL);

  }
}
function priceRest() {
//   let omin = document.getElementById("o_min").value;
//   let omax = document.getElementById("o_max").value;
//   //let slider = document.querySelector("[data-range-slider='priceSlider']");
//   var slider = document.getElementById('slider-range'); 
//   slider.noUiSlider.set([omin, omax]);
   
}

 
function getCities(e) {

  $('.request-loader').addClass('show');
  let addedCity = "city_id";
  let id = $(e).val();
   //   alert('id'+id);
  let cityUrl = baseURL + '/cities?state_id='+id
  $.ajax({
    type: 'GET',
    url: cityUrl,
    
    success: function (data) {
      if (data.cities.length > 0) {
        $('.city').show();
        $('.' + addedCity).find('option').remove().end();
        $('.' + addedCity).append($(
          `<option data-id="0"></option>`).val('all').html('All'));
        $.each(data.cities, function (key, value) {

          $('.' + addedCity).append(
            $(
                `<option ></option>`
            ).val(value
                .id).html(value.city_content
                .name));

                
          // $('.' + addedCity).append(
          //   $(
          //     `<option data-id="${value.id}"></option>`).val(value
          //       .city_content.name).html(value.city_content.name));
        });
        // $('.' + addedCity).append($('<option>', {value: 2,text: 'Two'}));
        $('.' + addedCity).niceSelect('destroy'); //destroy the plugin 
        $('.' + addedCity).niceSelect(); 
      } else {
        $('.' + addedCity).find('option').remove().end();
        $('.city').hide();
      }
      $('.request-loader').removeClass('show');
    }
  });
}

$("#expectedPrice").on('keyup', function(e) {
  getsquar();
  
});
$("#carpetArea").on('keyup', function(e) {
  getsquar();
});
$(".country").on('change', function(e) {
  $('.request-loader').addClass('show');
  let addedState = "state_id";
  let addedCity = "city_id";
  let id = $(this).val();

  $.ajax({
      type: 'GET',
      url: stateUrl,
      data: {
          id: id,
      },
      success: function(data) {
          if (data.states.length > 0) {
              $('.state').show();
              $('.city').hide()
              $('.' + addedState).find('option').remove();
              $('.' + addedCity).find('option').remove();
              $.each(data.states, function(key, value) {

                  $('.' + addedState).append($(
                      `<option></option>`
                  ).val(value
                      .id).html(value.state_content.name));
              });
              $('.' + addedState).niceSelect('destroy'); //destroy the plugin 
              $('.' + addedState).niceSelect(); 

              let firstStateId = data.states[0].id;



              $.ajax({
                  type: 'GET',
                  url: cityUrl,
                  data: {
                      state_id: firstStateId,
                  },
                  success: function(data) {

                      if (data.cities.length > 0) {
                          $('.city').show();
                          $('.' + addedCity).find('option').remove()
                              .end();
                          $.each(data.cities, function(key, value) {
                              $('.' + addedCity).append(
                                  $(
                                      `<option ></option>`
                                  ).val(value
                                      .id).html(value.city_content
                                      .name));
                          });
                          $('.' + addedCity).niceSelect('destroy'); //destroy the plugin 
                          $('.' + addedCity).niceSelect(); 
                      }
                      $('.request-loader').removeClass('show');
                  }
              });

          } else if (data.cities.length > 0) {
              $('.state').hide()
              $('.city').show();
              $('.' + addedCity).find('option').remove();
              $.each(data.cities, function(key, value) {
                  $('.' + addedCity).append(
                      $(
                          `<option ></option>`
                      ).val(value
                          .id).html(value.city_content.name));
              });
          }
          $('.request-loader').removeClass('show');
      }
  });
});


$(document).ready(function () {
  'use strict';
  $('#categories li a').on('click', function () {
    $('#categories li a').removeClass('active');
    $(this).addClass('active');

  })



  $('body').on('click', '.customPaginagte a', function (event) {
    event.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    let currentURL = window.location.href;
    getData(currentURL, page);
  });

  history.pushState(null, document.title, location.href);
  window.addEventListener('popstate', function (event) {
    history.pushState(null, document.title, location.href);
  });
});

function getsquar(){
  var expectedPrice=$("#expectedPrice").val();
    var carpetArea=  $("#carpetArea").val();
    expectedPrice =parseInt(expectedPrice);
    carpetArea =parseInt(carpetArea);
    if(expectedPrice >0 && carpetArea >0){
    var sqlpri=(expectedPrice/carpetArea)
    }
    else{
      var sqlpri=0;
      }
      $("#sqrPrice").val(sqlpri);
}



$('thead').on('click', '.addRow', function (e) {
  e.preventDefault();
  var tr = `<tr>
              <td>
                ${labels}
              </td>
              <td>
                ${values}
              </td>
              <td>
                <a href="javascript:void(0)" class="btn btn-danger  btn-sm deleteRow">
                  <i class="fas fa-minus"></i></a>
              </td>
            </tr>`;
  $('#tbody').append(tr);
  
});

$('tbody').on('click', '.deleteRow', function () {
  $(this).parent().parent().remove();
});


$('thead').on('click', '.addassetsRow', function (e) {
  e.preventDefault();
  var tr = `<tr>
              <td>
                ${category}
              </td>
              <td>
                ${subcategory}
              </td>
              <td>
                ${asset}
              </td>
              <td>
                ${quantity}
              </td>
              <td>
                <a href="javascript:void(0)" class="btn btn-danger  btn-sm deletepropertyAsset">
                  <i class="fas fa-minus"></i></a>
              </td>
            </tr>`;
  $('#tAssetsbody').append(tr);
  $('.Category').niceSelect('destroy'); //destroy the plugin 
              $('.Category').niceSelect(); 
  $('.subcategory').niceSelect('destroy'); //destroy the plugin 
              $('.subcategory').niceSelect(); 
});

$('tbody').on('click', '.deletepropertyAsset', function () {
  $(this).parent().parent().remove();
});

$(document).on('change', ".Category", function(e){
    
  $('.request-loader').addClass('show');
  let id = $(this).val();
  let namet = $(this).attr('name');
  var lang =namet.split('_');
   var input=this;

  $.ajax({
      type: 'GET',
      url: subcategoryUrl,
      data: {
          id: id,
      },
      success: function(data) {
         
          $(input).parent().parent().parent().find('.subcategory[name="'+lang[0]+'_subcategory[]"]').html('');
          $(input).parent().parent().parent().find('.subcategory[name="'+lang[0]+'_subcategory[]"]').html('<option selected value="">Please Select</option>');
              
          if (data.length > 0) {
              
              $.each(data, function(key, value) {

                  $(input).parent().parent().parent().find('.subcategory[name="'+lang[0]+'_subcategory[]"]').append($(
                      `<option></option>`
                  ).val(value
                      .id).html(value.name));
              });
              $('.subcategory').niceSelect('destroy'); //destroy the plugin 
              $('.subcategory').niceSelect(); 
          } 
          $('.request-loader').removeClass('show');
      }
  });
});	
