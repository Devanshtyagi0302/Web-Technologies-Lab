// JavaScript for opening a new browser window
function openNewWindow() {
    // Specify the content you want to display in the new window
    const content = `
        <html>
        <head>
            <title>New Browser Window</title>
        </head>
        <body>
            <h1>Hello, this is a new browser window!</h1>
            <p>Javascript functions used:
            document.getElementById() - The getElementById() method returns the element that 
            has the ID attribute with the specified value. This method is one of the most common 
            methods in the HTML DOM, and is used almost every time you want to manipulate, or get 
            info from, an element on your document.
            Returns null if no elements with the specified ID exists. An ID should be unique within a 
            page. However, if more than one element with the specified ID exists, the getElementById() 
            method returns the first element in the source code.
            </p>
        </body>
        </html>
    `;

    // Open a new browser window with the specified content
    const newWindow = window.open('', 'NewWindow', 'width=1200,height=800');

    // Write the content to the new window
    newWindow.document.write(content);

    // Close the new window after 5 seconds (you can adjust the time as needed)
    setTimeout(function () {
        newWindow.close();
    }, 5000);
}

// Add a click event listener to the button
document.getElementById('openButton').addEventListener('click', openNewWindow);
