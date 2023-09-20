// JavaScript for Custom Modal
function openModal() {
    document.getElementById('myModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

// JavaScript for Lightbox Image Gallery
function openImage(imageSrc) {
    window.open(imageSrc, '_blank');
}

// JavaScript for Resizable Box
const resizableBox = document.querySelector('.resizable-box');

resizableBox.addEventListener('mousedown', (e) => {
    e.preventDefault();
    let isResizing = true;

    const initialWidth = resizableBox.offsetWidth;
    const initialX = e.clientX;

    document.addEventListener('mousemove', resize);

    document.addEventListener('mouseup', () => {
        isResizing = false;
        document.removeEventListener('mousemove', resize);
    });

    function resize(e) {
        if (!isResizing) return;

        const newWidth = initialWidth + (e.clientX - initialX);
        resizableBox.style.width = `${newWidth}px`;
    }
});

// JavaScript for Drag-and-Drop Box
const dragBox = document.querySelector('.drag-box');

dragBox.addEventListener('dragstart', (e) => {
    e.dataTransfer.setData('text/plain', 'Drag Me');
});

dragBox.addEventListener('dragend', () => {
    // Handle the end of the drag operation if needed
});

dragBox.addEventListener('dragover', (e) => {
    e.preventDefault();
});

dragBox.addEventListener('drop', (e) => {
    e.preventDefault();
    const data = e.dataTransfer.getData('text/plain');
    e.target.textContent = data;
});
