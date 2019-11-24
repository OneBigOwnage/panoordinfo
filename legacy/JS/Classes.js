/***/
var Announcement = function(id, title, description) {
  this.id;
  this.title;
  this.description;
  this.validationRules;

  //Needs inheritance;
  this.saveData = function() {

  }
}


var AgendaItem = function() {
  this.id;
  this.title;
  this.date;
  this.description;
  this.validationRules = getValidationRules();
}



/***/
var Picture = function(id, ) {
  this.id;
  this.fileName;
  this.fileSize;
  this.x;
  this.y;

  //Function to check if the filesize is not too large.
  this.checkFileSize = function() {

  }
}


/***/
function saveData(obj, isNew) {
  var type = typeof obj;

  //Must be made smart...

  serverCall();
}

/**
* Function to retrieve validation rules for a given objectType.
*
* @param
* @return
*/
function getValidationRules(objtype) {
    return serverCall('getValidationRules', new Array(objtype), null, false);
}
