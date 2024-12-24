
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

  
  
// View Profile
function viewProfile() {
alert("Viewing Profile...");
// You can implement navigation or additional logic here
}

// Delete Profile
function deleteProfile() {
if (confirm("Are you sure you want to delete your profile?")) {
  document.getElementById("profile-pic-preview").src = "img/user.png";
  alert("Profile deleted successfully.");
}
}

// Trigger File Upload
function triggerFileUpload() {
document.getElementById("upload-profile-pic").click();
}

// Preview Profile Picture
function previewProfilePic(event) {
const file = event.target.files[0];
if (file) {
  const reader = new FileReader();
  reader.onload = function (e) {
    document.getElementById("profile-pic-preview").src = e.target.result;
  };
  reader.readAsDataURL(file);
  alert("Profile picture updated.");
}
}



});


// Function to toggle the dropdown menu visibility
function toggleDropdown() {
const dropdownMenu = document.getElementById("dropdown-menu");
const isMenuVisible = dropdownMenu.style.display === "block";

// Toggle visibility of the dropdown menu
dropdownMenu.style.display = isMenuVisible ? "none" : "block";
}

// Function to close the dropdown menu
function closeDropdown() {
const dropdownMenu = document.getElementById("dropdown-menu");
dropdownMenu.style.display = "none";  // Hide the dropdown menu
}

// View Profile action - Show profile picture in modal
function viewProfile() {
const profilePic = document.getElementById("profile-pic-preview");
const viewProfilePic = document.getElementById("view-profile-pic");
viewProfilePic.src = profilePic.src;  // Copy the current profile picture to the modal
document.getElementById("view-profile-modal").style.display = "flex";  // Show the modal
closeDropdown();  // Close the dropdown menu after selection
}

// Close the view profile modal
function closeViewProfile() {
document.getElementById("view-profile-modal").style.display = "none";  // Hide the modal
}

// Delete Profile action
function deleteProfile() {
if (confirm("Are you sure you want to delete your profile?")) {
  document.getElementById("profile-pic-preview").src = "img/user.png";  // Reset to default image
  document.getElementById("upload-profile-pic").value = "";  // Reset the file input
  alert("Profile deleted.");
}
closeDropdown();  // Close the dropdown menu after action
}


// Trigger file upload
function triggerFileUpload() {
document.getElementById("upload-profile-pic").click();
closeDropdown();  // Close the dropdown menu after selecting "Upload"
}

// Preview profile picture after upload
function previewProfilePic(event) {
const file = event.target.files[0];
if (file) {
  const reader = new FileReader();
  reader.onload = function (e) {
    document.getElementById("profile-pic-preview").src = e.target.result;
  };
  reader.readAsDataURL(file);
  alert("Profile picture updated.");
}
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


