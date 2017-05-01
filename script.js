setInterval(function(){
  getAnnouncements();
  getAgendaItems();
},1000);


function getAnnouncements() {
  // ID of the Google Spreadsheet
  var spreadsheetID = "1SrwKg9MFtnxfIOAQt88oZGj-_evhJAmLRp_AGYF35k4";
  // Make sure it is public or set to Anyone with link can view
  var url = "https://spreadsheets.google.com/feeds/list/" + spreadsheetID + "/od6/public/values?alt=json";
  //Loop through each data value from the Spreadsheet.
  $.getJSON(url, function(data) {
    //Remove current content from List.
    document.getElementById("announcementsList").innerHTML = "";
    var entry = data.feed.entry;
    var preHTML = '<a href="#" class="list-group-item myClass"><h4 class="list-group-item-heading myClass">';
    var middleHTML = '</h4><p class="list-group-item-text myClass">';
    var postHTML = '</p></a>';
    $(entry).each(function() {
      // Column names are name, age, etc.
      $('#announcementsList').append(preHTML + this.gsx$header.$t + middleHTML + this.gsx$value.$t + postHTML);
    });
  });
}

function getAgendaItems() {
  console.log("Not Implemented Yet!");
}
