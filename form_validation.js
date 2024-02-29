// Function to validate the feedback form
function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    // Check if name, email, and message fields are not empty
    if (name.trim() == "" || email.trim() == "" || message.trim() == "") {
        alert("Please fill in all fields.");
        return false; // Prevent form submission
    }

    // Check if the email is valid
    var emailRegex = /^\S+@\S+\.\S+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}
