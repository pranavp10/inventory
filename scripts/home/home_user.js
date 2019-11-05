
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
  }
  $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
  