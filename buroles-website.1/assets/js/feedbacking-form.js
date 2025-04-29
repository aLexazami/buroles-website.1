// feedbacking-form.js
// This script handles the navigation between different sections of the feedback form.
// It shows/hides sections based on user input and manages the flow of the form.
document.addEventListener("DOMContentLoaded", function () {
  const sections = [
    document.querySelector(".feedback-form-box"),
    document.querySelector(".citizen-charter-form-box"),
    document.querySelector(".citizen-charter-2-form-box"),
    document.querySelector(".client-satisfaction-form-box"),
  ];

  let currentSectionIndex = 0;

  // Function to show the current section and hide others
  function showSection(index) {
    sections.forEach((section, i) => {
      section.style.display = i === index ? "block" : "none";
    });
  }

  // Function to validate required fields in feedback-form-box
  function validateFeedbackFormBox() {
    const requiredFields = [
      { id: "date", name: "Date" },
      { id: "age", name: "Age" },
      { id: "sex", name: "Sex" },
      { id: "customer-type", name: "Customer Type" },
      { id: "service-availed", name: "Service Availed" },
      { id: "region", name: "Region" },
    ];

    // Clear any existing error message
    const errorContainer = document.getElementById("feedback-form-error");
    if (errorContainer) {
      errorContainer.textContent = "";
    }

    // Check if all required fields are filled
    for (const field of requiredFields) {
      const element = document.getElementById(field.id);
      if (!element || !element.value) {
        if (errorContainer) {
          errorContainer.textContent = `Please fill out the required field: ${field.name}`;
        }
        return false;
      }
    }
    return true;
  }

  // Function to validate required fields in citizen-charter-form-box
  function validateCitizenCharterFormBox() {
    const errorContainer = document.getElementById("feedback-form-error2");
    if (errorContainer) {
      errorContainer.textContent = "";
    }

    // Check if a value is selected for the yes_no radio button
    const yesNoValue = document.querySelector("input[name='yes_no']:checked");
    if (!yesNoValue) {
      if (errorContainer) {
        errorContainer.textContent = "Please select Yes or No.";
      }
      return false;
    }

    return true;
  }

  // Function to validate required fields in citizen-charter-2-form-box
  function validateCitizenCharter2FormBox() {
    const errorContainer = document.getElementById("feedback-form-error3");
    if (errorContainer) {
      errorContainer.textContent = "";
    }

    // Check if a value is selected for the cc-1 radio button
    const cc1Value = document.querySelector("input[name='cc-1']:checked");
    if (!cc1Value) {
      if (errorContainer) {
        errorContainer.textContent = "Please select an option for CC1.";
      }
      return false;
    }

    // Check if a value is selected for the cc-2 radio button
    const cc2Value = document.querySelector("input[name='cc-2']:checked");
    if (!cc2Value) {
      if (errorContainer) {
        errorContainer.textContent = "Please select an option for CC2.";
      }
      return false;
    }

    // Check if a value is selected for the cc-3 radio button
    const cc3Value = document.querySelector("input[name='cc-3']:checked");
    if (!cc3Value) {
      if (errorContainer) {
        errorContainer.textContent = "Please select an option for CC3.";
      }
      return false;
    }

    return true;
  }

  // Function to validate required fields in client-satisfaction-form-box
  function validateClientSatisfactionFormBox() {
    const clientSatisfactionBox = document.querySelector('.client-satisfaction-form-box');
    const radioGroups = clientSatisfactionBox.querySelectorAll('input[type="radio"]');
    const errorContainer = document.getElementById('feedback-form-error4');
    const radioNames = new Set();

    // Collect all unique radio input names
    radioGroups.forEach(radio => radioNames.add(radio.name));

    // Check if at least one radio is selected for each group
    let allFilled = true;
    radioNames.forEach(name => {
        const group = clientSatisfactionBox.querySelectorAll(`input[name="${name}"]:checked`);
        if (group.length === 0) {
            allFilled = false;
        }
    });

    if (!allFilled) {
        errorContainer.textContent = "Please answer all questions in the Client Satisfaction section.";
        return false;
    } else {
        errorContainer.textContent = "";
        return true;
    }
  }

  // Function to handle navigation between sections
  // This function is called when the user clicks the next or previous button
  function handleNavigation(buttonType) {
    if (buttonType === "next") {
      if (currentSectionIndex === 0) {
        // Validate feedback-form-box before proceeding
        if (!validateFeedbackFormBox()) {
          return;
        }
      }
      if (currentSectionIndex === 1) {
        // Validate citizen-charter-form-box before proceeding
        if (!validateCitizenCharterFormBox()) {
          return;
        }
        const yesNoValue = document.querySelector("input[name='yes_no']:checked");
        if (yesNoValue && yesNoValue.value === "no") {
          currentSectionIndex = 3; // Skip to client-satisfaction-form-box
        } else {
          currentSectionIndex++;
        }
      } else if (currentSectionIndex === 2) {
        // Validate citizen-charter-2-form-box before proceeding
        if (!validateCitizenCharter2FormBox()) {
          return;
        }
        currentSectionIndex++;
      } else if (currentSectionIndex === 3) {
        // Validate client-satisfaction-form-box before proceeding
        if (!validateClientSatisfactionFormBox()) {
          return;
        }
        currentSectionIndex++;
      } else if (currentSectionIndex < sections.length - 1) {
        currentSectionIndex++;
      }
    } else if (buttonType === "previous") {
      if (currentSectionIndex === 3) {
        // Go back to citizen-charter-form-box if user picked "no"
        const yesNoValue = document.querySelector("input[name='yes_no']:checked");
        if (yesNoValue && yesNoValue.value === "no") {
          currentSectionIndex = 1;
        } else {
          currentSectionIndex--;
        }
      } else if (currentSectionIndex > 0) {
        currentSectionIndex--;
      }
    }
    showSection(currentSectionIndex);
  }

  // Add event listeners to the next buttons
  document.querySelectorAll("button[value='next']").forEach((button) => {
    button.addEventListener("click", () => handleNavigation("next"));
  });

  // Add event listeners to the previous buttons
  document.querySelectorAll("button[value='previous']").forEach((button) => {
    button.addEventListener("click", () => handleNavigation("previous"));
  });

  // Add event listener to the submit button
  document.querySelector('button[name="submit"]').addEventListener('click', function (event) {
    const clientSatisfactionBox = document.querySelector('.client-satisfaction-form-box');
    const radioGroups = clientSatisfactionBox.querySelectorAll('input[type="radio"]');
    const errorContainer = document.getElementById('feedback-form-error4');
    const radioNames = new Set();

    // Collect all unique radio input names
    radioGroups.forEach(radio => radioNames.add(radio.name));

    // Check if at least one radio is selected for each group
    let allFilled = true;
    radioNames.forEach(name => {
        const group = clientSatisfactionBox.querySelectorAll(`input[name="${name}"]:checked`);
        if (group.length === 0) {
            allFilled = false;
        }
    });

    if (!allFilled) {
        event.preventDefault();
        errorContainer.textContent = "Please answer all questions in the Client Satisfaction section.";
    } else {
        errorContainer.textContent = "";
    }
  });

  // Initialize the first section
  showSection(currentSectionIndex);
});

