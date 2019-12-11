refreshAgenda();
refreshAnnouncements();
updatePictures();
// setInterval(function() {
//   refreshAgenda();
//   refreshAnnouncements();
// }, 2000);

function refreshAgenda() {
var items = getAgendaItems();
if (items != undefined) {
  $('.panel-body.tinyAgendaPanel').html('');
  items.forEach(function(item) {
    var out = '\
      \
      <div class="panel tinyAgendaPanel">\
        <div class="panel-heading">\
          <h3 class="panel-title">\
            <span class="glyphicon glyphicon-pushpin"></span> ' + item['item_header'] + '\
            <span class="label dateLabel pull-right">' + item['item_date'] + '</span>\
          </h3>\
        </div>\
        <div class="panel-body">' + item['item_content'] + '</div>\
      </div>\
    ';
    $('.panel-body.tinyAgendaPanel').append(out);
  });
}
}

function checkUpdate() {
$.ajax({
  url: 'schermFunctions.php',
  data: {function: 'checkUpdate'},
  datatype: 'text',
  success: function(callback) {
    if (callback == 1) {
      updatePictures();
    }
  },
  error: function(callback){
    console.log('Error: ' + callback);
  }
});
}

function updatePictures() {
$.ajax({
  url: '../admin_page/DBfunctions.php',
  data: {
    function: 'getPhotos'
  },
  dataType: 'json',
  success: function(callback) {
    $('#carouselBody').html('');
    $('#carouselIndicators').html('');

    $.each(callback, function(index, item) {
      var helper = "";
      var isActive = "";
      if ((item['width'] / 762 * 454) >= item['height']) {helper = "wideHelper";} else {helper = "highHelper";}
      if (index == 0) {
        isActive = " active";
        $('#carouselIndicators').append('<li data-target="#IMGcarousel" data-slide-to="0" class="active"></li>');
      } else {
        isActive = "";
        $('#carouselIndicators').append('<li data-target="#IMGcarousel" data-slide-to="' + index + '"></li>');
      }

      $('#carouselBody').append('\
        <div class="item' + isActive + '">\
          <center>\
            <img class="' + helper + '" src="data:image/' + item['ext'] + ';base64,' + item['photo'] + '">\
          </center>\
        </div>\
            ');
    });
  },
  error: function(callback) {
    console.log("Error: " + callback.toString());
  }
});
}


function getAgendaItems() {
var items;
$.ajax({
  async: false,
  url: 'schermFunctions.php',
  data: {
    function: 'getAgendaItems'
  },
  dataType: 'json',
  success: function(data) {
    items = data;
  },
  error: function(data) {
    console.log(data);
  }
});
return items;
}


function getAnnouncementItems() {
var items;
$.ajax({
  async: false,
  url: 'schermFunctions.php',
  data: {
    function: 'getAnnouncementItems'
  },
  dataType: 'json',
  success: function(data) {
    items = data;
  },
  error: function(data) {
    console.log("ERROR: " + data);
  }
});
return items;
}


function refreshAnnouncements() {
var items = getAnnouncementItems();
if (items != undefined) {
  $('.panel-body.tinyAnnouncementPanel').html('');
  items.forEach(function(item) {
    $('.panel-body.tinyAnnouncementPanel').append('\
      \
      <div class="panel tinyAnnouncementPanel">\
        <div class="panel-heading">\
          <h3 class="panel-title">\
            <span class="glyphicon glyphicon-bullhorn"></span> ' + item['item_header'] + '\
          </h3>\
        </div>\
      <div class="panel-body">' + item['item_content'] + '</div>\
      </div>\
    ');
  });
}
}
