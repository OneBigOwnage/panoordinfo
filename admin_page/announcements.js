  $("#btnSaveNewAnn").on('click', function() {
    saveNewAnn();
  });
  $("#refreshAnnouncementsBtn").on("click", function() {
    refreshAnnouncements();
  });
  $(document).on('click', '.annToggleBtn', function() {
    $("span", this).toggleClass("glyphicon-chevron-down glyphicon-chevron-up");
  });
  $(document).on('click', '.saveAnnBtn', function() {
    saveAnnouncementItem(this.id.split("_").pop());
  });
  $(document).on('click', '.delAnnBtn', function() {
    deleteAnnouncementItem(this.id.split("_").pop());
  });


  function refreshAnnouncements() {
    $.ajax({
      url: 'DBfunctions.php',
      data: {
        function: 'getAnnouncements'
      },
      dataType: 'json',
      success: function (response) {
        if (response) {
          $('#announcementsTableBody').html('');
          $.each(response, function (index, item) {

            $('#announcementsTableBody').append('\
              <tr>\
                <td class="col-xs-4 col-md-1">\
                  <button class="annToggleBtn" type="button" name="button" data-toggle="collapse" data-target="#annContent_' + item['id'] + '">\
                    <span class="glyphicon glyphicon-chevron-down"></span>\
                  </button>\
                </td>\
                <td class="col-xs-4 col-md-10">\
                  ' + item['header'] + '\
                </td>\
                <td class="col-xs-4 col-md-1">\
                  <button class="editAnnBtn" type="button" name="button" data-toggle="modal" data-target="#editAnnModal_' + item['id'] + '"><span class="glyphicon glyphicon-pencil"></span></button>\
                  <button type="button" name="button" data-toggle="modal" data-target="#delAnnModal_' + item['id'] + '"><span class="glyphicon glyphicon-trash"></span></button>\
                </td>\
              </tr>\
              <tr id="annContent_' + item['id'] + '" class="collapse">\
                <td colspan="3">\
                  ' + item['content'] + '\
                </td>\
              </tr>\
            ');


            $('#editAnnDiv').append('\
            <div class="modal fade" id="editAnnModal_' + item['id'] + '" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">\
              <div class="modal-dialog">\
                <div class="modal-content">\
                  <div class="modal-header">\
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                    <h4 class="modal-title">MEDEDELING AANPASSEN: ' + item['header'] + '</h4>\
                  </div>\
                  <div class="modal-body">\
                    <div class="input-group col-xs-12">\
                      <input type="text" class="form-control annHeader" placeholder="Titel..." value="' + item['header'] + '">\
                    </div>\
                    <div class="input-group col-xs-12">\
                      <textarea rows="4" class="form-control annContent" placeholder="Verdere uitleg van het item...">' + item['content'] + '</textarea>\
                    </div>\
                  </div>\
                  <div class="modal-footer">\
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>\
                    <button id="btnSaveAnn_' + item['id'] + '" type="button" class="btn btn-success saveAnnBtn" data-dismiss="modal">Opslaan</button>\
                  </div>\
                </div>\
              </div>\
            </div>\
            \
            <div id="delAnnModal_' + item['id'] + '" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">\
             <div class="modal-dialog">\
               <div class="modal-content">\
                 <div class="modal-header" style="background-color:#e63838;">\
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                     <h4 class="modal-title" style="font-size:35px;"><span class="glyphicon glyphicon-warning-sign"></span> Verwijderen?</h4>\
                 </div>\
                 <div class="modal-body">Weet U zeker dat U dit item wilt verwijderen?\
                 </div>\
                 <div class="modal-footer">\
                   <div class="col-xs-12">\
                     <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Terug</button>\
                     <button id="delBtn_' + item['id'] + '" type="button" class="btn btn-danger delAnnBtn" data-dismiss="modal">Verwijderen</button>\
                   </div>\
                 </div>\
               </div>\
             </div>\
           </div>\
          ');
          });
        }
      },
      error: function (response) {
        console.log("AJAX ERROR: \r\n" + response[0]);
      }
    });
  }


  function saveNewAnn(header, content) {
    $.ajax({
      url: 'DBfunctions.php',
      data: {
        function: 'saveNewAnn',
        "header" : $('#newAnnHeader').val(),
        "content" : $('#newAnnContent').val()
      },
      dataType: 'text',
      success: function (response) {
        if (response == "true") {
          console.log("AJAX_SUCCESS_PHP_SUCCES: \r\n" + response);
        } else {
          console.log("AJAX_SUCCESS_PHP_ERROR: \r\n" + response);
        }
      },
      error: function (response) {
        console.log("AJAX_ERROR: \r\n" + response);
      }
    });
  }


  function saveAnnouncementItem(id) {
      var header = $("#editAnnModal_" + id).find(".annHeader").val();
      var content = $("#editAnnModal_" + id).find(".annContent").val();
      console.log("Saving item: " + id + " | " + header + " | " + content);

      $.ajax({
        url: 'DBfunctions.php',
        data: {
          function: 'saveAnnouncementItem',
          id: id,
          header: header,
          content: content
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

  function deleteAnnouncementItem(id) {
    $.ajax({
      url: 'DBfunctions.php',
      data: {
        function: 'delAnnouncementItem',
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



  function checkOpen() {
    arr = new Array();
    $.each($(".in").toArray(), function (index, ele) {
      arr.push(ele['id'].substring(11));
    });
    if (arr.indexOf("2")) {
      console.log("yes.");
    }
    return arr;
  }

  refreshAnnouncements();
