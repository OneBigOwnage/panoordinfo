importScript('Connect.js');

//Clicklistener for btn_genUniqid.
$(document).on("click", "#btn_genUniqid", function() {
  var args = [];
  args.push(100);
  serverCall('gen', args, null);
});
