
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
    
    if (userName === "Devansh") {
        const message = document.querySelector(".welcome-message");
        message.innerHTML = `Welcome, ${userName}!`;
    } else {
        const user = prompt("Please enter your username:");
        const password = prompt("Please enter your password:");
        
        if (user === "Devansh" && password === "Devansh") {
            setCookie("username", user, 30); 
            document.querySelector(".welcome-message").innerHTML = `Welcome, ${user}!`;
        } else {
            alert("Incorrect username or password. Please try again.");
            window.close();
        }

    }
}

displayWelcomeMessage();