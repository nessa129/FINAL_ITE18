document.addEventListener("DOMContentLoaded", () => {
  const menuIcon = document.getElementById("menu-icon");
  const closeIcon = document.getElementById("close-icon");
  const sidebarMenu = document.getElementById("sidebar-menu");
  const userIcon = document.querySelector(".user-icon");
  const userMenu = document.getElementById("user-menu");
  const userMenuClose = document.getElementById("user-menu-close");

  // Toggle User Menu Visibility
  userIcon.addEventListener("click", () => {
      userMenu.style.display = userMenu.style.display === "block" ? "none" : "block";
      sidebarMenu.classList.remove("visible"); // Hide sidebar menu when user menu is shown
  });

  // Close User Menu
  userMenuClose.addEventListener("click", () => {
      userMenu.style.display = "none";
  });

  // Toggle Sidebar Menu Visibility
  menuIcon.addEventListener("click", () => {
      sidebarMenu.classList.toggle("visible");
      userMenu.style.display = "none"; // Hide user menu when sidebar menu is shown
  });

  // Close Sidebar Menu (Optional Close Icon)
  if (closeIcon) {
      closeIcon.addEventListener("click", () => {
          sidebarMenu.classList.remove("visible");
      });
  }
});

function checkMembershipStatus() {
  const memberIdInput = document.getElementById("memberId").value;
  const resultDiv = document.getElementById("result");
  const renewButton = document.getElementById("renewButton");

  // Show loading message before making the request
  resultDiv.textContent = "Checking membership status...";
  resultDiv.style.color = "black";
  renewButton.style.display = "none"; // Hide Renew button initially

  // Send AJAX request to check membership status
  fetch('/membership/check-status', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token
      },
      body: JSON.stringify({ memberId: memberIdInput }) // Send the member ID to the backend
  })
  .then(response => response.json())
  .then(data => {
      if (data.status === 'Not Found') {
          resultDiv.textContent = "Invalid membership ID.";
          resultDiv.style.color = "black";
          renewButton.style.display = "none"; // Hide the Renew button if invalid ID
      } else {
          resultDiv.textContent = "Status: " + data.status + (data.expiry ? " (Expires: " + data.expiry + ")" : "");
          resultDiv.style.color = data.status === "Active" ? "green" : "red";

          // Show the Renew button if the membership is expired
          if (data.status === "Expired") {
              renewButton.style.display = "inline-block";
          } else {
              renewButton.style.display = "none";
          }

          // Store the status in sessionStorage
          sessionStorage.setItem("membershipStatus", data.status);
      }
  })
  .catch(error => {
      console.error('Error:', error);
      resultDiv.textContent = "Error checking membership status.";
  });
}


function redirectToRenewPage() {
  // Add any additional functionality before redirecting if needed
  console.log("Redirecting to renewal page...");
  window.location.href = "renew"; // Add your actual URL here
}

function previewProfilePic(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      // Update both the profile picture and the user icon
      document.getElementById("profile-pic-preview").src = e.target.result;
      document.getElementById("user-icon").src = e.target.result;  // Update the user icon
    };
    reader.readAsDataURL(file);
    alert("Profile picture updated.");
  }
}
