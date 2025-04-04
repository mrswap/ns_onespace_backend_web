$(document).ready(function () {
  'use strict';
  $('.js-example-basic-single1').select2();
  // blog form
  $('#blogForm').on('submit', function (e) {
    $('.request-loader').addClass('show');
    e.preventDefault();

    let action = $(this).attr('action');
    let fd = new FormData($(this)[0]);

    $.ajax({
      url: action,
      method: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        $('.request-loader').removeClass('show');

        if (data.status == 'success') {
          location.reload();
        }
      },
      error: function (error) {
        deactive(error)
        let errors = ``;

        for (let x in error.responseJSON.errors) {
          errors += `<li>
                <p class="text-danger mb-0">${error.responseJSON.errors[x][0]}</p>
              </li>`;
        }

        $('#blogErrors ul').html(errors);
        $('#blogErrors').show();

        $('.request-loader').removeClass('show');

        $('html, body').animate({
          scrollTop: $('#blogErrors').offset().top - 100
        }, 1000);
      }
    });
  });


  // custom page form
  $('#pageForm').on('submit', function (e) {
    $('.request-loader').addClass('show');
    e.preventDefault();

    let action = $(this).attr('action');
    let fd = new FormData($(this)[0]);

    $.ajax({
      url: action,
      method: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        $('.request-loader').removeClass('show');

        if (data.status == 'success') {
          location.reload();
        }
      },
      error: function (error) {
        let errors = ``;

        for (let x in error.responseJSON.errors) {
          errors += `<li>
                <p class="text-danger mb-0">${error.responseJSON.errors[x][0]}</p>
              </li>`;
        }

        $('#pageErrors ul').html(errors);
        $('#pageErrors').show();

        $('.request-loader').removeClass('show');

        $('html, body').animate({
          scrollTop: $('#pageErrors').offset().top - 100
        }, 1000);
      }
    });
  });


  // show or hide input field according to selected ad type
  $('.ad-type').on('change', function () {
    let adType = $(this).val();

    if (adType == 'banner') {
      if (!$('#slot-input').hasClass('d-none')) {
        $('#slot-input').addClass('d-none');
      }

      $('#image-input').removeClass('d-none');
      $('#url-input').removeClass('d-none');
    } else {
      if (!$('#image-input').hasClass('d-none') && !$('#url-input').hasClass('d-none')) {
        $('#image-input').addClass('d-none');
        $('#url-input').addClass('d-none');
      }

      $('#slot-input').removeClass('d-none');
    }
  });

  $('.edit-ad-type').on('change', function () {
    let adType = $(this).val();

    if (adType == 'banner') {
      if (!$('#edit-slot-input').hasClass('d-none')) {
        $('#edit-slot-input').addClass('d-none');
      }

      $('#edit-image-input').removeClass('d-none');
      $('#edit-url-input').removeClass('d-none');
    } else {
      if (!$('#edit-image-input').hasClass('d-none') && !$('#edit-url-input').hasClass('d-none')) {
        $('#edit-image-input').addClass('d-none');
        $('#edit-url-input').addClass('d-none');
      }

      $('#edit-slot-input').removeClass('d-none');
    }
  });


  // show different input field according to input type for digital product
  $('select[name="input_type"]').on('change', function () {
    let optionVal = $(this).val();

    if (optionVal == 'upload') {
      $('#file-input').removeClass('d-none');

      if (!$('#link-input').hasClass('d-none')) {
        $('#link-input').addClass('d-none');
      }
    } else if (optionVal == 'link') {
      $('#link-input').removeClass('d-none');

      if (!$('#file-input').hasClass('d-none')) {
        $('#file-input').addClass('d-none');
      }
    }
  });

  // product form
  $('#productForm').on('submit', function (e) {
    $('.request-loader').addClass('show');
    e.preventDefault();

    let action = $(this).attr('action');
    let fd = new FormData($(this)[0]);

    $.ajax({
      url: action,
      method: 'POST',
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        $('.request-loader').removeClass('show');

        if (data.status == 'success') {
          location.reload();
        }
      },
      error: function (error) {
        let errors = ``;

        for (let x in error.responseJSON.errors) {
          errors += `<li>
                <p class="text-danger mb-0">${error.responseJSON.errors[x][0]}</p>
              </li>`;
        }

        $('#productErrors ul').html(errors);
        $('#productErrors').show();

        $('.request-loader').removeClass('show');

        $('html, body').animate({
          scrollTop: $('#productErrors').offset().top - 100
        }, 1000);
      }
    });
  });


  // show or hide price input fields by toggling the 'Request Price Button'
  $('input[name="price_btn_status"]').on('change', function () {
    let radioBtnVal = $('input[name="price_btn_status"]:checked').val();

    if (parseInt(radioBtnVal) === 1) {
      $('#equipment-price-input').addClass('d-none');
    } else {
      $('#equipment-price-input').removeClass('d-none');
    }
  });



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
  });

  $('tbody').on('click', '.deletepropertyAsset', function () {
    $(this).parent().parent().remove();
  });

  function bootnotify(message, title, type) {
    var content = {};

    content.message = message;
    content.title = title;
    content.icon = 'fa fa-bell';

    $.notify(content, {
      type: type,
      placement: {
        from: 'top',
        align: 'right'
      },
      showProgressbar: true,
      time: 1000,
      allow_dismiss: true,
      delay: 4000
    });
  }


  // Form Submit with AJAX Request Start
  $("#PropertySubmit").on('click', function (e) {

    $(e.target).attr('disabled', true);
    $(".request-loader").addClass("show");

    if ($(".iconpicker-component").length > 0) {
      $("#inputIcon").val($(".iconpicker-component").find('i').attr('class'));
    }

    let carForm = document.getElementById('carForm');
    let fd = new FormData(carForm);
    let url = $("#carForm").attr('action');
    let method = $("#carForm").attr('method');

    //if summernote has then get summernote content
    $('.form-control').each(function (i) {
      let index = i;

      let $toInput = $('.form-control').eq(index);

      if ($(this).hasClass('summernote')) {
        let tmcId = $toInput.attr('id');
        let content = tinyMCE.get(tmcId).getContent();
        fd.delete($(this).attr('name'));
        fd.append($(this).attr('name'), content);
      }
    });

    $.ajax({
      url: url,
      method: method,
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        $(e.target).attr('disabled', false);
        $('.request-loader').removeClass('show');

        $('.em').each(function () {
          $(this).html('');
        });

        if (data.status == 'success') {
          location.reload();
        }

        if (data == "downgrade") {
          $('.modal').modal('hide');

          "use strict";
          let content = {};

          content.message = 'Some of your feature limit is reached or exceeded!';
          content.title = "Warning";
          content.icon = 'fa fa-bell';

          $.notify(content, {
            type: 'warning',
            placement: {
              from: 'top',
              align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            delay: 4000,
          });
          $("#allLimits").modal('show');
        }


      },
      error: function (error) {

        if (error.responseJSON.deactive) {

          deactive(error)
          $('.request-loader').removeClass('show');
          return
        }
        let errors = ``;

        for (let x in error.responseJSON.errors) {
          errors += `<li>
                <p class="text-danger mb-0">${error.responseJSON.errors[x][0]}</p>
              </li>`;
        }

        $('#carErrors ul').html(errors);
        $('#carErrors').show();

        $('.request-loader').removeClass('show');

        $('html, body').animate({
          scrollTop: $('#carErrors').offset().top - 100
        }, 1000);
      }

    });
    $(e.target).attr('disabled', false);
  });
  $("#PropertySubmit2").on('click', function (e) {

    $(e.target).attr('disabled', true);
    $(".request-loader").addClass("show");

    if ($(".iconpicker-component").length > 0) {
      $("#inputIcon").val($(".iconpicker-component").find('i').attr('class'));
    }

    let carForm = document.getElementById('carForm2');
    let fd = new FormData(carForm);
    let url = $("#carForm2").attr('action');
    let method = $("#carForm2").attr('method');

    //if summernote has then get summernote content
    $('.form-control').each(function (i) {
      let index = i;

      let $toInput = $('.form-control').eq(index);

      if ($(this).hasClass('summernote')) {
        let tmcId = $toInput.attr('id');
        let content = tinyMCE.get(tmcId).getContent();
        fd.delete($(this).attr('name'));
        fd.append($(this).attr('name'), content);
      }
    });

    $.ajax({
      url: url,
      method: method,
      data: fd,
      contentType: false,
      processData: false,
      success: function (data) {
        $(e.target).attr('disabled', false);
        $('.request-loader').removeClass('show');

        $('.em').each(function () {
          $(this).html('');
        });

        if (data.status == 'success') {
          location.reload();
        }

        if (data == "downgrade") {
          $('.modal').modal('hide');

          "use strict";
          var content = {};

          content.message = 'Some of your feature limit is reached or exceeded!';
          content.title = "Warning";
          content.icon = 'fa fa-bell';

          $.notify(content, {
            type: 'warning',
            placement: {
              from: 'top',
              align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            delay: 4000,
          });
          $("#allLimits").modal('show');
        }
      },
      error: function (error) {
        if (error.responseJSON.deactive) {

          deactive(error)
          $('.request-loader').removeClass('show');
          return
        }
        let errors = ``;

        for (let x in error.responseJSON.errors) {
          errors += `<li>
                <p class="text-danger mb-0">${error.responseJSON.errors[x][0]}</p>
              </li>`;
        }

        $('#carErrors2 ul').html(errors);
        $('#carErrors2').show();

        $('.request-loader').removeClass('show');

        $('html, body').animate({
          scrollTop: $('#carErrors2').offset().top - 100
        }, 1000);
      }

    });
    $(e.target).attr('disabled', false);
  });
  // Form Submit with AJAX Request End



  // spacification delete
  $('tbody').on('click', '.deleteSpecification', function () {
    let spacification = $(this).data('specification');
    $('.request-loader').addClass('show');
    $(this).parent().parent().remove();
    $.ajax({
      url: specificationRmvUrl,
      method: 'POST',
      data: {
        spacificationId: spacification,
      },

      success: function (data) {

        if (data.status == 'success') {


          $('.request-loader').removeClass('show');

          var content = {};
          content.message = 'Additional feature has been delete';
          content.title = "Warning";
          content.icon = 'fa fa-bell';

          $.notify(content, {
            type: 'success',
            placement: {
              from: 'top',
              align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            delay: 4000,
          });

        }

      },
      error: function (error) {
        if (data.status == 'success') {

          var content = {};

          content.message = 'Something went worng!';
          content.title = "Warning";
          content.icon = 'fa fa-bell';

          $.notify(content, {
            type: 'warning',
            placement: {
              from: 'top',
              align: 'right'
            },
            showProgressbar: true,
            time: 1000,
            delay: 4000,
          });

        }

      }
    });
  });

});





