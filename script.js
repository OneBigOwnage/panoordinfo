console.log('https://docs.google.com/spreadsheets/d/1SrwKg9MFtnxfIOAQt88oZGj-_evhJAmLRp_AGYF35k4/edit#gid=0');

setInterval(function() {
  getAnnouncements();
  getAgendaItems();
}, 3000);


function getAnnouncements() {
  // ID of the Google Spreadsheet
  var spreadsheetID = "1SrwKg9MFtnxfIOAQt88oZGj-_evhJAmLRp_AGYF35k4";
  // Make sure it is public or set to Anyone with link can view
  var url = "https://spreadsheets.google.com/feeds/list/" + spreadsheetID + "/od6/public/values?alt=json";
  //Loop through each data value from the Spreadsheet.
  $.getJSON(url, function(data) {
    var entry = data.feed.entry;

    //Remove current content from List.
    document.getElementById("announcementsList").innerHTML = "";
    var preHTML = '<a href="#" class="list-group-item"><h4 class="list-group-item-heading">';
    var middleHTML = '</h4><p class="list-group-item-text">';
    var postHTML = '</p></a>';
    $(entry).each(function() {
      var len = (this.gsx$infoheader.$t.length + this.gsx$infovalue.$t.length);
      if (len != 0) {
        // Column names are name, age, etc.
        $('#announcementsList').append(preHTML + this.gsx$infoheader.$t + middleHTML + this.gsx$infovalue.$t + postHTML);
      }
    });
  });
}

function getAgendaItems() {
  // ID of the Google Spreadsheet
  var spreadsheetID = "1SrwKg9MFtnxfIOAQt88oZGj-_evhJAmLRp_AGYF35k4";
  // Make sure it is public or set to Anyone with link can view
  var url = "https://spreadsheets.google.com/feeds/list/" + spreadsheetID + "/od6/public/values?alt=json";
  //Loop through each data value from the Spreadsheet.
  $.getJSON(url, function(data) {
    //Remove current content from List.
    document.getElementById("agendaList").innerHTML = "";
    var entry = data.feed.entry;
    var preHTML = '<a href="#" class="list-group-item"><h4 class="list-group-item-heading"><span class="glyphicon glyphicon-pushpin"></span>';
    var middle1HTML = '<span class="label label-info">';
    var middle2HTML = '</span></h4><p class="list-group-item-text">';
    var postHTML = '</p></a>';
    $(entry).each(function() {
      var len = (this.gsx$agendaheader.$t.length + this.gsx$agendadate.$t.length + this.gsx$agendavalue.$t.length);
      if (len != 0) {
        // Column names are name, age, etc.
        $('#agendaList').append(preHTML + this.gsx$agendaheader.$t + middle1HTML + this.gsx$agendadate.$t + middle2HTML + this.gsx$agendavalue.$t + postHTML);
      }

    });
  });
}
