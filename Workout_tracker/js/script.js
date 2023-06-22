// Execute JavaScript code when the page is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Add event listener to the logout button
    var logoutBtn = document.getElementById("logoutBtn");
    if (logoutBtn) {
      logoutBtn.addEventListener("click", function() {
        // Call the logout.php file to log out the user
        window.location.href = "logout.php";
      });
    }
  });
  