$(document).ready(function () {

    console.log('ready');
    $('#loginButton').click(function () {
console.log('asdf');
        $.ajax({
            url: 'http://localhost:8000/extension?email=' + email + "&password=" + password,
            type: "GET",
            dataType: "json",
            contentType: "application/json",
            processData: false,
            data: "",
            success: function (data) {
                alert(data.response.name);
                var savedData = {
                    cid: data.response.id,
                    name: data.response.name,
                    email: data.response.email,
                    role: data.response.role,
                };
                $('#loginDiv').hide();
                $('#afterLogin').show();
                /* 
                                $('#login_form').css('display', 'none');
                                $('#logged_in').css('display', 'block');
                                $('#account_name').html(data.response.name);
                                $('#account_email').html(data.response.email);
                */
                // Save the data to chrome.storage.sync
                chrome.storage.local.set({ loginData: savedData }, function () {
                    console.log('Login data saved:', savedData);
                });
            },
            error: function () {
                console.log("Error getting data");
            },
        });
    });
});
