const section = document.querySelector("section");
const modalBox = document.querySelector(".modal-box");
const showBtn = document.querySelector(".login__submit");
const closeBtn = document.querySelector(".close-btn");

// Show modal when the Enter button is clicked
showBtn.addEventListener("click", (e) => {
  e.preventDefault(); // Prevent form submission
  section.classList.add("active");
});

// Close modal when the Close button is clicked
closeBtn.addEventListener("click", () => {
  section.classList.remove("active");
});

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