$(document).ready(function() {
  $("#modal_close").on("click", function() {
    $("#success_msg").hide();
    $("#register_form")[0].reset();
    $("#email_error").hide();
    $("#name_error").hide();
    $("#password_error").hide();
  });

  // Hide spinner by default
  $("#spinner").hide();

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

    // validate email
    var email = $("#user_email").val();
    var reg_email = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (email == "") {
      $("#email_error").html("Email is required");
      $("#email_error").css("color", "red");
      return false;
    } else if (!email.match(reg_email)) {
      $("#email_error").html("Enter valid email");
      $("#email_error").css("color", "red");
      return false;
    } else {
      $("#email_error").html("");
    }

    // validate password
    var password = $("#user_password").val();

    if (password == "") {
      $("#password_error").html("Password is required");
      $("#password_error").css("color", "red");
      return false;
    } else {
      $("#password_error").html("");
      $("#verify_ajax").hide();
      $("#spinner").show();

      $.ajax({
        type: "POST",
        url: "webservices/register.php",
        data: $("#register_form").serialize(),
        success: function(result) {
          if (result.status == "fail") {
            $("#email_error").html("Email already exists");
            $("#email_error").css("color", "red");
            $("#verify_ajax").show();
            $("#spinner").hide();
          } else if (result.status == "success") {
            $("#success_msg").html(
              "Dear " + name + " Please confrim your email"
            );
            $("#register_form")[0].reset();
            $("#verify_ajax").show();
            $("#spinner").hide();
          }
        }
      });
    }
  });
});
