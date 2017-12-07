$(document).ready(function () {
    $('#signIn').click(function (e) {
        if (!$('#username').val()) {
            alert('Please fill username.');
            return;
        }
        if (!$('#password').val()) {
            alert('Please fill password.');
            return;
        }
        $.ajax({
            url: './php/signin.php',
            type: 'POST',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            dataType: 'text',
            success: function (result) {
                result = $.parseJSON(result);
                if (result.status == 'OK') {
                    setCookie("apiKey", result.apiKey, 30);
                    setCookie("firstname", result.firstname, 30);
                    if ($("#remember").is(":checked"))
                        setCookie("username", $('#username').val(), 30);
                    window.location.href = "index.html";
                } else {
                    alert(result.message);
                }
                console.log("success");
            },
            error: function (e) {
                console.log(e);
            },
            complete: function () {
                console.log("Request complete.");
            }
        })
    });
});

$(document).ready(function () {
    $('#signOutBtn').click(function (e) {
        setCookie("apiKey", "", 30);
        setCookie("firstname", "", 30);
        window.location.href = "index.html";
    });
});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkUserSignedin() {
    if (getCookie("firstname").length > 0) {
        $("#welcomeUser").html("Welcome, " + getCookie('firstname'));
        $('#welcome, #signOutBtn').css("display", "block");
    } else {
        $('#signInBtn, #signUpBtn').css("display", "block");
    }
}

$(document).ready(function () {
    $('#signUp').click(function (e) {
        if (!$('#firstname').val()) {
            alert('Please fill first name.');
            return;
        }
        if (!$('#lastname').val()) {
            alert('Please fill last name.');
            return;
        }
        if (!$('#email').val()) {
            alert('Please fill email.');
            return;
        }
        if (!$('#username').val()) {
            alert('Please fill username.');
            return;
        }
        if (!$('#password').val()) {
            alert('Please fill password.');
            return;
        }
        if ($('#password').val() != $('#confirmpassword').val()) {
            alert('Password & confirm password not match');
            return;
        }
        $.ajax({
            url: './php/signup.php',
            type: 'POST',
            data: {
                firstname: $('#firstname').val(),
                lastname: $('#lastname').val(),
                email: $('#email').val(),
                username: $('#username').val(),
                password: $('#password').val()
            },
            dataType: 'text',
            success: function (result) {
                result = $.parseJSON(result);
                if (result.status == 'OK') {
                    window.location.href = "login.html";
                } else {
                    alert(result.message);
                }
                console.log("success");
            },
            error: function (e) {
                console.log(e);
            },
            complete: function () {
                console.log("Request complete.");
            }
        })
    });
});

$(document).ready(function () {
    $('#saveBtn').click(function (e) {
        if (!$('#firstname').val()) {
            alert('Please fill first name.');
            return;
        }
        if (!$('#lastname').val()) {
            alert('Please fill last name.');
            return;
        }
        if (!$('#oldpassword').val()) {
            alert('Please fill old password.');
            return;
        }
        if (!$('#newpassword').val()) {
            alert('Please fill new password.');
            return;
        }
        if ($('#newpassword').val() != $('#confirmpassword').val()) {
            alert('New password & confirm password not match');
            return;
        }
        $.ajax({
            url: './php/edit_info.php',
            type: 'POST',
            data: {
                firstname: $('#firstname').val(),
                lastname: $('#lastname').val(),
                username: getCookie('username'),
                oldpassword: $('#oldpassword').val(),
                newpassword: $('#newpassword').val()
            },
            dataType: 'text',
            success: function (result) {
                result = $.parseJSON(result);
                if (result.status == 'OK') {
                    window.location.href = "index.html";
                } else {
                    alert(result.message);
                }
                console.log("success");
            },
            error: function (e) {
                console.log(e);
            },
            complete: function () {
                console.log("Request complete.");
            }
        })
    });
});