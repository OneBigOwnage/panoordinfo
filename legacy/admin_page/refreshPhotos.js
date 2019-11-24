getPhotos();

$(document).on("click", "#deletePhotosBtn", function() {
  delPhotos();
});

$(document).on("click", "#refreshPhotosBtn", function() {
  getPhotos();
});

$('#imageSelector').on('change', function(e) {
  changeLabel(this);
});

$(document).on('submit', '#uploadForm', function(e) {
  e.preventDefault();
  uploadFiles();
});

$(document).on("click dragstart", ".imgPanel > img", function() {
  $("#cBox_" + this.id.split("_").pop()).prop("checked", !$("#cBox_" + this.id.split("_").pop()).prop("checked"));
});

function getPhotos() {
  $.ajax({
    url: 'DBfunctions.php',
    data: {
      function: 'getPhotos'
    },
    dataType: 'json',
    success: function(data) {
      $('#IMGDiv').html('');
      $.each(data, function(index, item) {
        $('#IMGDiv').append('\
        <div class="col-xs-4 col-md-3 imgCol">\
          <div class="imgPanel">\
            <img class="thumbnailIMG img-thumbnail img-responsive" id="IMG_' + item['id'] + '" src="data:image/' + item['ext'] + ';base64,' + item['photo'] + '" ondragstart="return false;"/>\
            <input id="cBox_' + item['id'] + '" class="cBox" type="checkbox" value="">\
          </div>\
        </div>\
              ');
      });
    },
    error: function(data) {
      console.log("Fail: " + data);
    }
  });
}

function uploadFiles() {
  $("#uploadAlert").toggleClass("in alert-info");
  $("#uploadAlert > p").html("Bestanden worden geüpload...");
  $("#uploadBtn").disabled = true;
  $("#fileLabel").disabled = true;
  var files = Array.from(document.getElementById('imageSelector').files);
  var fData = new FormData();

  $.each(files, function(i, file) {
    fData.append("file_" + i, files[i]);
  })

  $.ajax({
    url: 'upload.php',
    data: fData,
    processData: false,
    contentType: false,
    dataType: 'text',
    type: 'POST',
    success: function(data) {
      getPhotos();
      console.log("Fail: " + data);
      $("#uploadAlert").toggleClass("alert-info alert-success");
      $("#uploadAlert > p").html("Bestanden succesvol geüpload.");
      $("#uploadBtn").disabled = false;
      $("#fileLabel").disabled = false;
    },
    error: function(data) {
      console.log("Fail: " + data);
      $("#uploadAlert").toggleClass("alert-info alert-danger");
      $("#uploadAlert > p").html("Er is iets fout gegaan, probeer het opnieuw.\nAls dit probleem zich langer voor blijft doen, a.u.b. een administrator inlichten!");
      $("#uploadBtn").disabled = false;
      $("#fileLabel").disabled = false;
    }
  });
}

function changeLabel(input) {
  oldVal = $('#fileLabel > p').html();

  if (input.files && input.files.length > 1) {
    $('#fileLabel > p').html(input.files.length + " Bestanden geselecteerd");
  } else {
    $('#fileLabel > p').html(input.files[0]['name']);
  }
}

function delPhotos() {
  var trashList = new Array();
  $.each($(".cBox:checked"), function(index, item) {
    trashList.push(item.id.split("_").pop());
  });

  $.ajax({
    url: 'DBfunctions.php',
    data: {
      function: 'delPhotos',
      IDs: trashList
    },
    dataType: 'text',
    success: function(data) {
      getPhotos();
    },
    error: function(data) {
      console.log(data);
    }
  });
}
