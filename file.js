function calculateAge() {
    var dob = new Date(document.getElementById("dob").value);
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();
    var m = today.getMonth() - dob.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
        age--;
    }
    document.getElementById("age").value = age;
}







 function validateFirstName() {
        var firstName = document.getElementById("fname").value.trim();
        if (!/^[A-Za-z\s]+$/.test(firstName)) {
            document.getElementById("fnameError").textContent = "Please enter a valid first name";
            return false;
        } else {
            document.getElementById("fnameError").textContent = "";
            return true;
        }
    }


     // Function to validate last name
    function validateLastName() {
        var lastName = document.getElementById("lname").value.trim();
        if (!/^[A-Za-z\s]+$/.test(lastName)) {
            document.getElementById("lnameError").textContent = "Please enter a valid last name";
            return false;
        } else {
            document.getElementById("lnameError").textContent = "";
            return true;
        }
    }

    // Function to validate address
    function validateAddress() {
        var address = document.getElementById("address").value.trim();
        if (address === "") {
            document.getElementById("addressError").textContent = "Address is required";
            return false;
        } else {
            document.getElementById("addressError").textContent = "";
            return true;
        }
    }

    // Function to validate phone number
    function validatePhoneNumber() {
        var phone = document.getElementById("phone").value.trim();
        if (!/^[0-9]{10}$/.test(phone)) {
            document.getElementById("phoneError").textContent = "Please enter a valid 10-digit phone number";
            return false;
        } else {
            document.getElementById("phoneError").textContent = "";
            return true;
        }
    }

    function validateDateOfBirth() {
    var dob = document.getElementById("dob").value.trim();
    var dobDate = new Date(dob);
    var currentDate = new Date();
    
    if (dob === "") {
        document.getElementById("dobError").textContent = "Date of birth is required";
        return false;
    } else if (dobDate >= currentDate) {
        document.getElementById("dobError").textContent = "Date of birth must be in the past";
        return false;
    } else {
        document.getElementById("dobError").textContent = "";
        return true;
    }
}

 function validatePhoto() {
        var photo = document.getElementById("photo").value.trim();
        var extension = photo.substr(photo.lastIndexOf('.') + 1).toLowerCase();
        if (extension !== "jpg" && extension !== "jpeg" && extension !== "png") {
            document.getElementById("photoError").textContent = "Please upload an image with a .jpg, .jpeg, or .png extension";
            return false;
        } else {
            document.getElementById("photoError").textContent = "";
            return true;
        }
    }

     function validateForm() {
        return validateFirstName() && validateLastName() && validateAddress() && validatePhoneNumber() && validateDateOfBirth() && validatePhoto();
    }







    // Function to generate and display random numbers for addition question
function generateRandomNumbers() {
    var num1 = Math.floor(Math.random() * 10) + 1;
    var num2 = Math.floor(Math.random() * 10) + 1;
    document.getElementById("num1").textContent = num1;
    document.getElementById("num2").textContent = num2;
}

// Call the function to generate initial random numbers
window.onload = function() {
    generateRandomNumbers();
};
function validateForm() {
    var num1 = parseInt(document.getElementById("num1").textContent);
    var num2 = parseInt(document.getElementById("num2").textContent);
    var userAnswer = parseInt(document.getElementById("additionAnswer").value);
    var correctAnswer = num1 + num2;

    if (userAnswer !== correctAnswer) {
        alert("Incorrect answer. Please try again.");
        generateRandomNumbers(); // Generate new random numbers
        document.getElementById("additionAnswer").value = ""; // Clear the input field
        return false; // Prevent form submission
    }
    
    return true; // Allow form submission
}