document.addEventListener('DOMContentLoaded', function () {
  $(document).ready(function () {


    var userData = {
      id: 0,
      name: "",
      email: "",
      role: "",
    };

    chrome.storage.local.get(['user_data'], function (data) {
      if (data.user_data.id) {
        console.log('Login data retrieved:', data);
        userData = {
          id: data.user_data.id,
          name: data.user_data.name,
          email: data.user_data.email,
          role: data.user_data.role,
        };
      }
      loginSettings();
    });

    $('#appendTemplates').click(function () {

      const composeEmailSection = document.querySelector('[role="dialog"]');

      if (composeEmailSection) {
        const selectDropdown = document.createElement('select');
        selectDropdown.innerHTML = `
  <option value="option1">Option 1</option>
  <option value="option2">Option 2</option>
  <option value="option3">Option 3</option>
`;

        // Add event listeners to handle dropdown selection if needed

        // Append the dropdown to the Gmail compose modal
        composeEmailSection.appendChild(selectDropdown);
      }
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
      $.ajax({
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
      });
    });
  });

});