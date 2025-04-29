// This script fetches the daily respondents count from the server and updates the HTML element with the class 'new-counts-respondents'.

// This script is designed to update the displayed count every 10 seconds.

// This function fetches the daily respondents count from the server and updates the displayed count.
// It updates the displayed count every 10 seconds.
async function updateDailyRespondents() {
  try {
      // Fetch the daily respondents count from the server
      const response = await fetch('../controllers/get_daily_respondents.php');
      const data = await response.json();

      // Update the displayed count
      const dailyCountElement = document.querySelector('.new-counts-respondents[data-refresh="true"]');
      if (dailyCountElement) {
          dailyCountElement.textContent = data.dailyCount;
      }
  } catch (error) {
      console.error('Error fetching daily respondents count:', error);
  }
}

// Update every 10 seconds
setInterval(updateDailyRespondents, 10000);
updateDailyRespondents(); // Initial call to display immediately