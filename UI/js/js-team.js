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
            url: './php/login.php',
            type: 'POST',
            data: {
                username: $('#username').val(),
                password: $('#password').val()
            },
            dataType: 'text',
            success: function (result) {
                result = $.parseJSON(result);
                if (result.status == 'OK') {
                    if ($("#remember").is(":checked")) {
                        setCookie("apiKey", result.apiKey, 30);
                        setCookie("username", $('#username').val(), 30);
                    }
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

$('#myForm')
    .ajaxForm({
        url: 'myscript.php', // or whatever
        dataType: 'json',
        success: function (response) {
            alert("The server says: " + response);
        }
    });