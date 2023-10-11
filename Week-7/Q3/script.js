const coordinates = document.getElementById("coordinates");
const xCoord = document.getElementById("xCoord");
const yCoord = document.getElementById("yCoord");

document.addEventListener("mousemove", (e) => {
    const mouseX = e.clientX;
    const mouseY = e.clientY;

    xCoord.textContent = mouseX;
    yCoord.textContent = mouseY;
});
