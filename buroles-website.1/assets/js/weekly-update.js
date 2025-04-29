// This script fetches the weekly respondents count from the server and updates the HTML element with the class 'weekly-counts-respondents'.

async function updateWeeklyRespondents() {
  try {
      // Fetch the weekly respondents count from the server
      const response = await fetch('../controllers/get_weekly_respondents.php');
      const data = await response.json();

      // Update the displayed count
      const weeklyCountElement = document.querySelector('.weekly-counts-respondents[data-refresh="true"]');
      if (weeklyCountElement) {
          weeklyCountElement.textContent = data.weeklyCount;
      }
  } catch (error) {
      console.error('Error fetching weekly respondents count:', error);
  }
}

// Update every 10 seconds
setInterval(updateWeeklyRespondents, 10000);
updateWeeklyRespondents(); // Initial call to display immediately