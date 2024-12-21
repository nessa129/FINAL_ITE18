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

  function previewProfilePic(event) {
    const input = event.target;
    const preview = document.getElementById("profile-pic-preview");
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result; // Set the preview image to the uploaded image
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  
});

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
