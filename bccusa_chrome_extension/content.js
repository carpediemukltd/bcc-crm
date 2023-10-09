document.addEventListener('DOMContentLoaded', function () {
  $(document).ready(function () {

    var userData = {
      id: 0,
      name: "",
      email: "",
      role: "",
    };

    chrome.storage.local.get(['user_data'], function (data) {
      if (data) {
        if (data.user_data.id) {
          console.log('Login data retrieved:', data);
          userData = {
            id: data.user_data.id,
            name: data.user_data.name,
            email: data.user_data.email,
            role: data.user_data.role,
          };
        }
      }
      loginSettings();
    });

    $('#appendTemplates').click(function () {
      const dropdown = document.createElement("select");
      dropdown.id = "myDropdown";

      const option1 = document.createElement("option");
      option1.value = "important";
      option1.textContent = "Important message";

      const option2 = document.createElement("option");
      option2.value = "regular";
      option2.textContent = "Regular message";

      dropdown.appendChild(option1);
      dropdown.appendChild(option2);

      document.getElementById("compose").appendChild(dropdown);

      dropdown.addEventListener("change", function () {
        const subject = document.getElementById("subjectBox");
        subject.value = this.value;
      });

    });

    function loginSettings() {
      console.log('userData', userData);
      $('#loading').hide();
      if (userData.id > 0) {

        $('#loginDiv').hide();
        $('#member_name').html(userData.name);
        $('#afterLogin').show();
      } else {

        $('#loginDiv').show();
        $('#member_name').html('');
        $('#afterLogin').hide();
      }
    }

    $('#logoutButton').click(function () {
      chrome.storage.local.remove('user_data', function () {
        console.log('Logout Successfully.');
        userData = {
          id: 0,
          name: "",
          email: "",
          role: "",
        };
        loginSettings();
      });
    });

    $('#loginButton').click(function () {

      var email = $('#email').val();
      var password = $('#password').val();
      if (email == "") {
        alert("Please enter your email.");
        return false;
      }
      if (password == "") {
        alert("Please enter your password.");
        return false;
      }
      $('#loading').show();
      /* $.ajax({
        url: 'http://localhost:8000/extension?email=' + email + "&password=" + password,
        type: "GET",
        processData: false,
        data: "",
        success: function (data) {
          console.log('Login Successfully.');
          userData = {
            id: data.response.id,
            name: data.response.name,
            email: data.response.email,
            role: data.response.role,
          };

          loginSettings();

          // Save the data to chrome.storage.sync
          chrome.storage.local.set({ user_data: userData }, function () {
            console.log('Login data saved:', userData);
          });
        },
        error: function () {
          console.log("Error getting data");
        },
      }); */

      userData = {
        id: 1,
        name: "Wasiq",
        email: "wasiq@live.com",
        role: 'admin',
      };
      chrome.storage.local.set({ user_data: userData }, function () {
        console.log('Login data saved:', userData);
      });
      loginSettings();


    });
  });

});