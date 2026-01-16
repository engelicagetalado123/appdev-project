// notifications.js

// Load unread count
function loadNotifCount() {
  fetch('fetch_notifications.php')
    .then(response => response.text())
    .then(count => {
        const badge = document.getElementById('notif-count');
        if (badge) badge.textContent = count;
    })
    .catch(err => console.error('Error loading notifications count:', err));
}

// Toggle dropdown and load notifications
function openNotifications() {
  const dropdown = document.getElementById("notif-dropdown");
  dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";

  if (dropdown.style.display === "block") {
    fetch('list_notifications.php')
      .then(response => response.text())
      .then(html => {
          dropdown.innerHTML = html;
          markNotificationsRead();
      })
      .catch(err => console.error('Error loading notifications list:', err));
  }
}
// Mark notifications as read 
function markNotificationsRead() {
    fetch('mark_notifications_read.php', { method: 'POST' }).then(() => { // Refresh count after marking as read 
        loadNotifCount();
    }).catch(err => console.error('Error marking notifications as read:', err));
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", () => {
  loadNotifCount();
  setInterval(loadNotifCount, 30000); // refresh every 30 seconds
});

//delete notif
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("delete-btn")) {
        const notifId = e.target.getAttribute("data-id");

        fetch("delete_notification.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "id=" + notifId
        })
            .then(response => response.text())
            .then(result => {
                if (result === "success") {
                    // Remove the notification from the DOM
                    e.target.parentElement.remove();
                } else {
                    alert("Failed to delete notification.");
                }
            });
    }
});
