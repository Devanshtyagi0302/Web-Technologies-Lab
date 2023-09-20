// JavaScript for Guess the Number Game

// Generate a random number between 1 and 100 (inclusive)
const targetNumber = Math.floor(Math.random() * 100) + 1;

// Initialize variables for game state
let attempts = 5;
let gameOver = false;

// Get references to HTML elements
const guessInput = document.getElementById('guessInput');
const guessButton = document.getElementById('guessButton');
const resultMessage = document.getElementById('result');
const attemptsRemaining = document.getElementById('attempts');

// Event listener for the "Submit Guess" button
guessButton.addEventListener('click', () => {
    if (gameOver) {
        return; // Ignore clicks if the game is over
    }

    const userGuess = parseInt(guessInput.value);

    if (isNaN(userGuess) || userGuess < 1 || userGuess > 100) {
        resultMessage.textContent = 'Please enter a valid number between 1 and 100.';
    } else {
        attempts--;
        attemptsRemaining.textContent = attempts;

        if (userGuess === targetNumber) {
            resultMessage.style.color = 'green';
            resultMessage.textContent = `Congratulations! You guessed the number: ${targetNumber}`;
            gameOver = true;
        } else if (attempts === 0) {
            resultMessage.style.color = 'red';
            resultMessage.textContent = `Sorry, you've run out of attempts. The number was ${targetNumber}.`;
            gameOver = true;
        } else {
            resultMessage.style.color = 'blue';
            resultMessage.textContent = userGuess < targetNumber
                ? 'Try a higher number.'
                : 'Try a lower number.';
        }
    }

    guessInput.value = ''; // Clear the input field
});

// Initialize attempts remaining
attemptsRemaining.textContent = attempts;
