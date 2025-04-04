(function ($) {
  "use strict";

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  function dropzone() {
    // Dropzone initialization
    Dropzone.options.myDropzone = {
      acceptedFiles: '.png, .jpg, .jpeg',
      url: storeUrl,
      maxFiles: galleryImages,
      success: function (file, response) {
        $("#sliders").append(`<input type="hidden" name="slider_images[]" id="slider${response.file_id}" value="${response.file_id}">`);

        // Create the remove button
        var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

        // Capture the Dropzone instance as closure.
        var _this = this;
        // Listen to the click event
        removeButton.addEventListener("click", function (e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();

          _this.removeFile(file);

          rmvimg(response.file_id);
        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);

        if (typeof response.error != 'undefined') {
          if (typeof response.file != 'undefined') {
            document.getElementById('errpreimg').innerHTML = response.file[0];
          }
        }
      },

    };

    
     // Dropzone initialization
     Dropzone.options.myDropzoneoutdoor = {
      acceptedFiles: '.png, .jpg, .jpeg',
      url: outdoorstoreUrl,
      maxFiles: galleryImagesoutdoor,
      success: function (file, response) {
        $("#sliders").append(`<input type="hidden" name="slider_imagesoutdoor[]" id="slideroutdoor${response.file_id}" value="${response.file_id}">`);

        // Create the remove button
        var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

        // Capture the Dropzone instance as closure.
        var _this = this;
        // Listen to the click event
        removeButton.addEventListener("click", function (e) {
          // Make sure the button click doesn't submit the form:
          e.preventDefault();
          e.stopPropagation();

          _this.outdoorremoveFile(file);

          outdoorrmvimg(response.file_id);
        });

        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);

        if (typeof response.error != 'undefined') {
          if (typeof response.file != 'undefined') {
            document.getElementById('errpreimg').innerHTML = response.file[0];
          }
        }
      },

    };

 // Dropzone initialization
 Dropzone.options.myDropzonelivingroom = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: livingroomstoreUrl,
  maxFiles: galleryImageslivingroom,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imageslivingroom[]" id="sliderlivingroom${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.livingroomremoveFile(file);

      livingroomrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzonebedroom = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: bedroomstoreUrl,
  maxFiles: galleryImagesbedroom,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imagesbedroom[]" id="sliderbedroom${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.bedroomremoveFile(file);

      bedroomrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzonekitchen = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: kitchenstoreUrl,
  maxFiles: galleryImageskitchen,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imageskitchen[]" id="sliderkitchen${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.kitchenremoveFile(file);

      kitchenrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzonewashroom = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: washroomstoreUrl,
  maxFiles: galleryImageswashroom,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imageswashroom[]" id="sliderwashroom${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.washroomremoveFile(file);

      washroomrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzonebalcony = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: balconystoreUrl,
  maxFiles: galleryImagesbalcony,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imagesbalcony[]" id="sliderbalcony${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.balconyremoveFile(file);

      balconyrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzoneterrace = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: terracestoreUrl,
  maxFiles: galleryImagesterrace,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imagesterrace[]" id="sliderterrace${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.terraceremoveFile(file);

      terracermvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzonestairs = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: stairsstoreUrl,
  maxFiles: galleryImagesstairs,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imagesstairs[]" id="sliderstairs${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.stairsremoveFile(file);

      stairsrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};

 // Dropzone initialization
 Dropzone.options.myDropzoneother = {
  acceptedFiles: '.png, .jpg, .jpeg',
  url: otherstoreUrl,
  maxFiles: galleryImagesother,
  success: function (file, response) {
    $("#sliders").append(`<input type="hidden" name="slider_imagesother[]" id="sliderother${response.file_id}" value="${response.file_id}">`);

    // Create the remove button
    var removeButton = Dropzone.createElement("<button class='rmv-btn'><i class='fa fa-times'></i></button>");

    // Capture the Dropzone instance as closure.
    var _this = this;
    // Listen to the click event
    removeButton.addEventListener("click", function (e) {
      // Make sure the button click doesn't submit the form:
      e.preventDefault();
      e.stopPropagation();

      _this.otherremoveFile(file);

      otherrmvimg(response.file_id);
    });

    // Add the button to the file preview element.
    file.previewElement.appendChild(removeButton);

    if (typeof response.error != 'undefined') {
      if (typeof response.file != 'undefined') {
        document.getElementById('errpreimg').innerHTML = response.file[0];
      }
    }
  },

};    


  }
  dropzone()

  function rmvimg(fileid) {
    // If you want to the delete the file on the server as well,
    // you can do the AJAX request here.

    $.ajax({
      url: removeUrl,
      type: 'POST',
      data: {
        fileid: fileid
      },
      success: function (data) {
        $("#slider" + fileid).remove();
      }
    });

  }

   
   function outdoorrmvimg(fileid) {
    // If you want to the delete the file on the server as well,
    // you can do the AJAX request here.

    $.ajax({
      url: outdoorremoveUrl,
      type: 'POST',
      data: {
        fileid: fileid
      },
      success: function (data) {
        $("#slideroutdoor" + fileid).remove();
      }
    });

  }

function livingroomrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: livingroomremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderlivingroom" + fileid).remove();
    }
  });

}

function bedroomrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: bedroomremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderbedroom" + fileid).remove();
    }
  });

}

function kitchenrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: kitchenremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderkitchen" + fileid).remove();
    }
  });

}

function washroomrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: washroomremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderwashroom" + fileid).remove();
    }
  });

}

function balconyrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: balconyremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderbalcony" + fileid).remove();
    }
  });

}

function terracermvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: terraceremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderterrace" + fileid).remove();
    }
  });

}

function stairsrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: stairsremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderstairs" + fileid).remove();
    }
  });

}

function otherrmvimg(fileid) {
  // If you want to the delete the file on the server as well,
  // you can do the AJAX request here.

  $.ajax({
    url: otherremoveUrl,
    type: 'POST',
    data: {
      fileid: fileid
    },
    success: function (data) {
      $("#sliderother" + fileid).remove();
    }
  });

}


  //remove existing images
  $(document).on('click', '.rmvbtndb', function () {
    let indb = $(this).data('indb');
    $(".request-loader").addClass("show");
    $.ajax({
      url: rmvdbUrl,
      type: 'POST',
      data: {
        fileid: indb
      },
      success: function (data) {
        $(".request-loader").removeClass("show");
        var content = {};
        if (data == 'false') {
          content.message = "You can't delete all images.!!";
          content.title = 'Warning';
          var type = 'warning';
        } else {
          $("#trdb" + indb).remove();
          content.message = 'Gallery image deleted successfully!';
          content.title = 'Success';
          var type = 'success';

        }

        content.icon = 'fa fa-bell';

        $.notify(content, {
          type: type,
          placement: {
            from: 'top',
            align: 'right'
          },
          showProgressbar: true,
          time: 1000,
          delay: 4000
        });
        if (content.title == 'Success') {
          window.location.reload()
        }
      }
    });
  });





  
})(jQuery);
