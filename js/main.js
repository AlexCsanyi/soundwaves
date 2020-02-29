$(document).ready(function() {
  $("#verify_ajax").on("click", function() {
    // validate username
    var name = $("#user_name").val();
    var reg_name = /^[a-zA-Z]{3,30}$/;

    if (name == "") {
      $("#name_error").html("Name is required");
      $("#name_error").css("color", "red");
      return false;
    } else if (!name.match(reg_name)) {
      $("#name_error").html("Enter valid name");
      $("#name_error").css("color", "red");
      return false;
    } else {
      $("#name_error").html("");
    }

    $.ajax({
      type: "POST",
      url: "webservices/register.php",
      success: function(result) {
        alert(result);
      }
    });
  });
});
