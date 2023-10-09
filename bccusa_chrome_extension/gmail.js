/* $(document).ready(function() {
    // Create a dropdown element.
    const dropdown = $("<select>").attr("id", "myDropdown");
  
    // Create two option elements and append them to the dropdown element.
    const option1 = $("<option>").attr("value", "important").text("Important message");
    const option2 = $("<option>").attr("value", "regular").text("Regular message");
    dropdown.append(option1, option2);
  
    // Append the dropdown element to the compose modal.
    $("#compose").append(dropdown);
  
    // Add an event listener to the dropdown element to handle when the user selects an option.
    dropdown.change(function() {
      // Get the subject input element.
      const subject = $("#subjectBox");
  
      // Set the subject input element's value to the selected option.
      subject.val(this.value);
    });
  }); */