$(document).ready(function() {
  $(".editLoginUser").on("click", function() {
    $("#editLoginUser").modal("show");
    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
      $('#editLoginId').val(data[0]);
      $('#editUser').val(data[1]);
      $('#editUserLoginName').val(data[2]);
      $('#editUserLoginPassword').val(data[3]);

      $('#submitEditLoginDetails').prop('disabled', true);
  });
});
$(document).ready(function() {
  $(".deleteUser").on("click", function() {
    $("#deleteUser").modal("show");
    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function() {
        return $(this).text();
      })
      .get();
      $('#deleteUserId').val(data[0]);
      $('#displayBox').text(`User with id (${data[0]}) and Name (${data[1].toUpperCase()}) Will be DELETED!!!`);
    });
  });

function getUserId() {
    loginId = $("#loginId");
    $.ajax({
      //create an ajax request to display.php
      type: "POST",

      url: "../../../inventory/get_home_user_id.php",
      success: function(response) {
        var id = JSON.parse(response);
        id = +id + 1;
        loginId.val(`USER-${id}`);
      }
    });
    $('#submitLoginDetails').prop('disabled', true);
    $('#userLoginPassword').prop('disabled', true);
  }
  $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});

function checkUserName(){
  var userName = $('#userLoginName').val();
  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data:{"checkName": userName },
    url: "../../../inventory/check_user_name.php",
    success: function(response) {
      if(JSON.parse(response) == 'yes'){
        $('#userLoginName').css({"border":"1px solid 	#008000","box-shadow": "0 0 5px #008000"})
        $('#userLoginPassword').prop('disabled', false);
      }else{
        $('#userLoginName').css({"border":"1px solid red","box-shadow": "0 0 5px #CC0000"})
        $('#userLoginPassword').prop('disabled', true);
      }
    }
  });
}

function randomPassword(length) {
  var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*!@#$%^&*ABCDEFGHIJKLMNOP1234567890";
  var pass = "";
  for (var x = 0; x < length; x++) {
      var i = Math.floor(Math.random() * chars.length);
      pass += chars.charAt(i);
  }
  return pass;
}

function generate() {
  generatedPassword = randomPassword(10);
  $('#userLoginPassword').val(generatedPassword);
  var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      if ($("#userLoginPassword").val().match(passwordRegex)) {
        $('#userLoginPassword').css({"border":"1px solid 	#008000","box-shadow": "0 0 5px #008000"});
        $('#submitLoginDetails').prop('disabled', false);
      } else {
        $('#submitLoginDetails').prop('disabled', true);
        $('#userLoginPassword').css({"border":"1px solid red","box-shadow": "0 0 5px #CC0000"})

      }
}



$("#userLoginPassword").keyup(function(){
      var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      if ($("#userLoginPassword").val().match(passwordRegex)) {
        $('#submitLoginDetails').prop('disabled', false);
        $('#userLoginPassword').css({"border":"1px solid 	#008000","box-shadow": "0 0 5px #008000"});
      } else {
        $('#submitLoginDetails').prop('disabled', true);
        $('#userLoginPassword').css({"border":"1px solid red","box-shadow": "0 0 5px #CC0000"})
      }
  });


// this is for  the edit 
  function editCheckUserName(){
  var userName = $('#editUserLoginName').val();

  $.ajax({
    //create an ajax request to display.php
    type: "POST",
    data:{"checkName": userName },
    url: "../../../inventory/check_user_name.php",
    success: function(response) {
      if(JSON.parse(response) == 'yes'){
        $('#editUserLoginName').css({"border":"1px solid 	#008000","box-shadow": "0 0 5px #008000"})
        $('#editUserLoginPassword').prop('disabled', false);
      }else{
        $('#editUserLoginName').css({"border":"1px solid red","box-shadow": "0 0 5px #CC0000"})
        $('#editUserLoginPassword').prop('disabled', true);
      }
    }
  });
}

function editGenerate() {
  generatedPassword = randomPassword(10);
  $('#editUserLoginPassword').val(generatedPassword);
  var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      if ($("#editUserLoginPassword").val().match(passwordRegex)) {
        $('#editUserLoginPassword').css({"border":"1px solid 	#008000","box-shadow": "0 0 5px #008000"});
        $('#submitEditLoginDetails').prop('disabled', false);
      } else {
        $('#submitEditLoginDetails').prop('disabled', true);
        $('#editUserLoginPassword').css({"border":"1px solid red","box-shadow": "0 0 5px #CC0000"})

      }
}



$("#editUserLoginPassword").keyup(function(){
      var passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;

      if ($("#editUserLoginPassword").val().match(passwordRegex)) {
        $('#submitEditLoginDetails').prop('disabled', false);
        $('#editUserLoginPassword').css({"border":"1px solid 	#008000","box-shadow": "0 0 5px #008000"});
      } else {
        $('#submitEditLoginDetails').prop('disabled', true);
        $('#editUserLoginPassword').css({"border":"1px solid red","box-shadow": "0 0 5px #CC0000"})
      }
  });
