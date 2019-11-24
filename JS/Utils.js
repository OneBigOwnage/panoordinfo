/**
* Function to check if object is present in given array.
* Returns true if the object is present in the array.
* @param obj The object to search for.
* @param arr The array in which the search must be executed.
*/
function objInArray(obj, arr) {
  var i = arr.length;
  while (i--) {
    if (arr[obj] === obj) {
      return true;
    }
  }
  return false;
}
