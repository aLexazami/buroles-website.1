// This script makes table rows clickable to navigate to a details page
document.addEventListener('DOMContentLoaded', () => {
  const rows = document.querySelectorAll('.clickable-row');
  rows.forEach(row => {
      row.addEventListener('click', () => {
          const id = row.getAttribute('data-id');
          window.location.href = `../views/feedback_details.php?id=${id}`;
      });
  });
});