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

$(document).on("click", ".delete-btn", function () {
    let id = $(this).data("id");

    if (!confirm("Are you sure you want to delete this student?")) {
        return;
    }

    $.ajax({
        url: `/students/${id}`,
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // CSRF token for Laravel
        },
        success: function (response) {
            alert(response.message);
            location.reload(); // Refresh the page after deletion
        },
        error: function (xhr) {
            alert("Error deleting student.");
        },
    });
});
