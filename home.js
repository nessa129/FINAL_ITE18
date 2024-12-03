document.addEventListener("DOMContentLoaded", () => {
  const menuIcon = document.getElementById("menu-icon");
  const closeIcon = document.getElementById("close-icon");
  const sidebarMenu = document.getElementById("sidebar-menu");

  // Toggle menu visibility
  menuIcon.addEventListener("click", () => {
      sidebarMenu.classList.toggle("visible");
  });

  // Close the menu
  closeIcon.addEventListener("click", () => {
      sidebarMenu.classList.remove("visible");
  });
});
