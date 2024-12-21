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
  
  document.addEventListener("DOMContentLoaded", () => {
    const hamberger = document.getElementById("menuicon");
    const sideMenu = document.getElementById("sidemenu");
 
 hamberger.addEventListener("click", () => {
    sideMenu.classList.toggle("visible");
  });
});

document.addEventListener("DOMContentLoaded", () => {
    const cart = document.getElementById("cart");
    const sideMenu = document.getElementById("sidemenu");
 
 cart.addEventListener("click", () => {
    sideMenu.classList.toggle("visible");
  });
});


 document.getElementById("check").addEventListener("click", function() {
        // Redirect to the payment page
        window.location.href = "http://127.0.0.1:5500/payment.html?";
    });


