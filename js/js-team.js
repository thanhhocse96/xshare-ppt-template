$(document).ready(function () {
    $("#username,#password,#firstname,#lastname,#confirmpassword,#currentpassword,#newpassword").keypress(function (e) {
        if (e.keyCode == 13) {
            switch (window.location.href) {
                case 'http://localhost:808/sign-in.html':
                    $("#signIn").click();
                    break;
                case 'http://localhost:808/sign-up.html':
                    $("#signUp").click();
                    break;
                case 'http://localhost:808/profile.html':
                    $("#saveBtn").click();
                    break;
                default:
                    break;
            }
        }
    });
})

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
                    setCookie("admin", result.admin, 30);
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
        setCookie("admin", "", 30);
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
    if (getCookie("admin") == '*')
        $('#adminBtn').css("display", "block");
}

function loadUser() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
            document.getElementById("mytable").innerHTML = this.responseText;
    }
    xmlhttp.open("POST", "php/queryuser.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function deleteUser() {
    var id = document.getElementById("id").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "* ID phải là số nguyên")
                alert("* ID phải là số nguyên");
            else
            if (this.responseText == "Success!") {
                loadUser();
            } else {
                alert(this.responseText);
            }
        }
    }
    xmlhttp.open("POST", "php/deleteuser.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id);
}

function getOldInfo() {
    $.ajax({
        url: './php/getOldInfo.php',
        type: 'POST',
        data: {
            username: getCookie("username")
        },
        dataType: 'text',
        success: function (result) {
            result = $.parseJSON(result);
            if (result.status == "OK") {
                $("#firstname").val(result.firstname);
                $("#lastname").val(result.lastname);
            } else {}
            console.log("success");
        },
        error: function (e) {
            console.log(e);
        },
        complete: function () {
            console.log("Request complete.");
        }
    })
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
                    window.location.href = "sign-in.html";
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
        if (!$('#currentpassword').val()) {
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
                currentpassword: $('#currentpassword').val(),
                newpassword: $('#newpassword').val()
            },
            dataType: 'text',
            success: function (result) {
                result = $.parseJSON(result);
                if (result.status == 'OK') {
                    setCookie("firstname", $('#firstname').val(), 30);
                    alert('Edit information success.');
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