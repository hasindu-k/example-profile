import "./bootstrap";
import "@fortawesome/fontawesome-free/css/all.min.css";
import $ from "jquery";

$(document).ready(function () {
    $(".togglePassword").click(function () {
        let passwordField = $(this).closest("div").find("input");
        let eyeIcon = $(this).find("i");

        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            passwordField.attr("type", "password");
            eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    $("#profile-image").click(function () {
        $("#profile-picture-input").click();
    });

    $("#upload-button").click(function () {
        $("#profile-picture-input").click();
    });

    $("#profile-picture-input").change(function () {
        if (this.files.length > 0) {
            $("#upload-form").submit();
        }
    });
});
