$(document).ready(function() {
  $("#modal_close").on("click", function() {
    $("#success_msg").hide();
    $("#register_form")[0].reset();
    $("#email_error").hide();
    $("#name_error").hide();
    $("#password_error").hide();
  });

  // Hide new password field by default
  $("#reset_password_btn").hide();

  // Hide new password field by default
  $("#new_pass_field").hide();

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
              "Dear " +
                name +
                ", an email has been sent, please click the link to confirm your email."
            );
            $("#register_form")[0].reset();
            $("#verify_ajax").show();
            $("#spinner").hide();
          } else if (result.status == "mail_failed") {
            $("#success_msg").html(
              "Failed sending message to the email provided."
            );
            $("#verify_ajax").show();
            $("#spinner").hide();
          }
        }
      });
    }
  });

  // ----------------- VERIFY EMAIL

  $("#verify_email_btn").on("click", function() {
    var input_email_verification = $("#input_email_verification").val();
    var verify_email = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (input_email_verification == "") {
      $("#email_verification_error").html("Email is required");
      $("#email_verification_error").css("color", "red");
      return false;
    } else if (!input_email_verification.match(verify_email)) {
      $("#email_verification_error").html("Enter valid email");
      $("#email_verification_error").css("color", "red");
      return false;
    } else {
      $.ajax({
        type: "POST",
        url: "webservices/verify_email.php",
        data: $("#forgot_password_form").serialize(),
        success: function(result) {
          if (result.status == "success") {
            $("#verify_email_btn").hide();
            $("#verifiction_msg").html("");
            $("#new_pass_field").show(500);
            $("#reset_password_btn").show();
          } else if (result.status == "fail") {
            $("#verifiction_msg").html("Email does not exist");
            $("#verifiction_msg").css("color", "red");
          }
        }
      });
    }
  });

  // ------------------ VERIFY NEW PASSWORD

  $("#reset_password_btn").on("click", function() {
    var input_email_verification = $("#input_email_verification").val();
    var verify_email = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (input_email_verification == "") {
      $("#email_verification_error").html("Email is required");
      $("#email_verification_error").css("color", "red");
      return false;
    } else if (!input_email_verification.match(verify_email)) {
      $("#email_verification_error").html("Enter valid email");
      $("#email_verification_error").css("color", "red");
      return false;
    } else {
      $("#email_verification_error").hide();
    }

    var new_password = $("#new_password_input").val();

    if (new_password == "") {
      $("#new_pass_verification_error").html("Password is required");
      $("#new_pass_verification_error").css("color", "red");
      return false;
    } else {
      $("#new_pass_verification_error").hide();
      $.ajax({
        type: "POST",
        url: "webservices/update_password.php",
        data: $("#forgot_password_form").serialize(),
        success: function(result) {
          if (result.status == "success") {
            $("#verifiction_msg").html("Password updated successfully");
            $("#verifiction_msg").css("color", "green");
          } else if (result.status == "fail") {
            $("#verifiction_msg").html("Password not updated, try again");
            $("#verifiction_msg").css("color", "red");
          }
        }
      });
    }
  });
});
