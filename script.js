// Sample members data with their ID and sign-up date
const members = {
    "221-00313": "2023-01-15", // Active
    "221-00314": "2022-05-20", // Inactive (over a year ago)
    "221-00315": "2023-09-10", // Active
    "221-00316": "2021-11-30"  // Inactive (over a year ago)
};

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

    // Check if the membership is active or inactive
    if (timeDifference < oneYearInMilliseconds) {
        resultDiv.textContent = "Status: Active";
        resultDiv.style.color = "green";
        renewButton.style.display = "none"; // Hide the Renew button if active
    } else {
        resultDiv.textContent = "Status: Inactive. Please renew your membership.";
        resultDiv.style.color = "red";
        renewButton.style.display = "inline-block"; // Show the Renew button if inactive
    }
}

function renewMembership() {
    alert("Renewal Submitted Successfully!"); // Simulate renewal
    // You could redirect the user to a renewal page or trigger an actual process.
}
