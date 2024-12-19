function checkMembershipStatus() {
    const memberIdInput = document.getElementById("memberId").value;
    const resultDiv = document.getElementById("result");
    const renewButton = document.getElementById("renewButton");

    // Check if the ID exists in the members object
    const joinDateStr = members[memberIdInput];
    if (!joinDateStr) {
        resultDiv.textContent = "Invalid membership ID.";
        resultDiv.style.color = "black";
        renewButton.style.display = "none"; // Hide the Renew button if invalid ID
        return;
    }

    const joinDate = new Date(joinDateStr);
    const currentDate = new Date();
    const oneYearInMilliseconds = 365 * 24 * 60 * 60 * 1000; // One year in milliseconds

    // Calculate the difference in time (in milliseconds)
    const timeDifference = currentDate - joinDate;

    // Determine membership status
    let status = '';
    if (timeDifference < oneYearInMilliseconds) {
        status = "Active";
        resultDiv.style.color = "green";
        renewButton.style.display = "none"; // Hide the Renew button if active
    } else {
        status = "Inactive. Please renew your membership.";
        resultDiv.style.color = "red";
        renewButton.style.display = "inline-block"; // Show the Renew button if inactive
    }

    // Store the status in sessionStorage
    sessionStorage.setItem("membershipStatus", status);
    resultDiv.textContent = "Status: " + status;
}



function redirectToRenewPage() {
    // Add any additional functionality before redirecting if needed
    console.log("Redirecting to renewal page...");
}


// Sample members data (for demonstration)
const members = {
    "221-00313": "2023-01-15",
    "221-00314": "2022-05-20",
    "221-00315": "2023-09-10",
    "221-00316": "2021-11-30"
};

function loadMembershipDetails() {
    // Retrieve the membership status from sessionStorage
    const status = sessionStorage.getItem("membershipStatus");
    const membershipStatusDiv = document.getElementById("checkMembershipStatus");
    const currentExpiryDateDiv = document.getElementById("currentExpiryDate");

    // Check if the status exists, otherwise show an error
    if (!status) {
        membershipStatusDiv.textContent = "Status not available.";
        return;
    }

    // Display the status
    membershipStatusDiv.textContent = status;

    // Retrieve the member ID from the URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const memberId = urlParams.get("memberId");

    // If the memberId is invalid or missing, display an error message
    if (!memberId || !members[memberId]) {
        currentExpiryDateDiv.textContent = "Invalid or missing membership ID.";
        return;
    }

    const joinDate = new Date(members[memberId]);
    const currentDate = new Date();
    const oneYearInMilliseconds = 365 * 24 * 60 * 60 * 1000;

    // Display the current expiry date
    const expiryDate = new Date(joinDate.getTime() + oneYearInMilliseconds);
    currentExpiryDateDiv.textContent = expiryDate.toISOString().split("T")[0]; // Display the calculated expiry date
}

document.addEventListener("DOMContentLoaded", () => {
    loadMembershipDetails(); // Ensure membership details are loaded when the page is loaded
});


function submitRenewal() {
    const renewalPeriod = parseInt(document.getElementById("renewalPeriod").value);
    if (!renewalPeriod) {
        alert("Please select a renewal period.");
        return;
    }

    // Calculate the new expiry date
    const currentDate = new Date();
    currentDate.setFullYear(currentDate.getFullYear() + renewalPeriod);
    const newExpiryDate = currentDate.toISOString().split("T")[0];

    // Update the UI
    document.getElementById("newExpiryDate").textContent = newExpiryDate;
    alert(`Renewal successful! Your new expiry date is ${newExpiryDate}.`);

    // Optional: Redirect back to the membership status page
    window.location.href = "membership_status.html";
}

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