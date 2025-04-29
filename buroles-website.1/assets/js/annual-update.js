// This script fetches the annual respondents count from the server and updates the HTML element with the class 'total-counts-respondents'.

async function updateAnnualRespondents() {
  try {
      // Fetch the annual respondents count from the server
      const response = await fetch('../controllers/get_annual_respondents.php');
      const data = await response.json();

      // Update the displayed count
      const totalCountElement = document.querySelector('.total-counts-respondents[data-refresh="true"]');
      if (totalCountElement) {
          totalCountElement.textContent = data.annualCount;
      }
  } catch (error) {
      console.error('Error fetching annual respondents count:', error);
  }
}

// Update every 10 seconds
setInterval(updateAnnualRespondents, 10000);
updateAnnualRespondents(); // Initial call to display immediately
