// Function to set a cookie
function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

// Function to get a cookie by name
function getCookie(name) {
    const cookieName = `${name}=`;
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    return null;
}

// Function to display the welcome message
function displayWelcomeMessage() {
    const userName = getCookie("username");
    const lastAccess = getCookie("lastAccess");
    if (userName) {
        document.querySelector(".welcome-message").innerHTML = `Welcome back, ${userName}!<br>Last accessed on: ${lastAccess}`;
    } else {
        const user = prompt("Please enter your name:");
        if (user) {
            setCookie("username", user, 30); // Cookie expires in 30 days
            const currentDate = new Date().toDateString();
            setCookie("lastAccess", currentDate, 30); // Store the current date in the cookie
            document.querySelector(".welcome-message").innerHTML = `Welcome, ${user}!`;
        }
    }
}

// Call the function to display the welcome message on page load
displayWelcomeMessage();
