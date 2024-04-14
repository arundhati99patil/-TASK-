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
function validateAnswer() {
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

 