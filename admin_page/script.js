$('#logoutBtn').on('click', function() {
  logOut();
});

$('.toggleContent').on('click', function() {
  $("span", this).toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
});

$('.saveBtn').on('click', function(event) {
  saveAgendaItem(this.id.split("_").pop());
});

$('#newSaveBtn').on('click', function() {
  newAgendaItem();
});

$('.delBtn').on('click', function(event) {
  deleteAgendaItem(this.id.split("_").pop());
});

$('#setUpdateBtn').on('click', function() {
  setUpdate();
});


function setUpdate() {
  $.ajax({
    url: '../scherm/schermFunctions.php',
    data: {function: 'setUpdateReady'},
    success: function(callback) {
      console.log(callback);
    }
  });
}

function newAgendaItem() {
  var header = $("#newHeader").val();
  var content = $("#newContent").val();
  var date = $("#newDate").val();

  $.ajax({
    url: 'DBfunctions.php',
    data: {
      function: 'newAgendaItem',
      header: header,
      content: content,
      date: date
    },
    dataType: 'text',
    success: function(data) {
      console.log(data);
    },
    error: function(data) {
      console.log(data);
    }
  });

}


function deleteAgendaItem(id) {
  $.ajax({
    url: 'DBfunctions.php',
    data: {
      function: 'deleteAgendaItem',
      id: id
    },
    dataType: 'text',
    success: function(data) {
      console.log(data);
    },
    error: function(data) {
      console.log(data);
    }
  });
}






function saveAgendaItem(id) {
  var header = $("#editModal_" + id).find(".itemHeader").val();
  var content = $("#editModal_" + id).find(".itemContent").val();
  var date = $("#editModal_" + id).find(".itemDate").val();

  console.log("Saving Item: " + id + ", " + header + ", " + content + ", " + date + ".");

  $.ajax({
    url: 'DBfunctions.php',
    data: {
      function: 'saveAgendaItem',
      id: id,
      header: header,
      content: content,
      date: date
    },
    dataType: 'text',
    success: function(data) {
      console.log(data);
    },
    error: function(data) {
      console.log(data);
    }
  });

}

function checkLogin() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (checkDB(username, password)) {
    return window.location.href = '/admin_page/dashboard.php';
  } else {
    $("#fail-alert").alert();
    $("#fail-alert").fadeTo(2000, 500).slideUp(500, function() {
      $("#fail-alert").slideUp(500);
    });
    return false;
  }
}


function checkDB(user, pass) {
  var correctLogin;
  $.ajax({
    async: false,
    url: 'testFunctions.php',
    data: {
      function: 'checkLogin',
      username: user,
      password: pass
    },
    dataType: 'text',
    success: function(data) {
      console.log('succes');
      if (data == "TRUE") {
        correctLogin = true;
      } else {
        correctLogin = false;
      }

    },
    error: function(data) {
      console.log("Error: " + data);
    }
  });
  return correctLogin;
}


function logOut() {
  console.log("Logging out...");
  $.ajax({
    url: 'testFunctions.php',
    data: {
      function: 'logout'
    },
    dataType: 'text',
  });
  return window.location.href = 'index.php';
}
