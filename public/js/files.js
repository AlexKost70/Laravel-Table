const gallery = document.querySelector(".gallery");

(async function getFiles() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const response = await fetch('/api/getFiles', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        }
    });
    const data = await response.json();

    if (response) {
        renderImages(data);
    }
})();

const renderImages = images => {
    images.forEach(imagePath => {
        if (imagePath.startsWith("public/images")) {
            imagePath = imagePath.substring(7);
            const imageElement = "storage/" + imagePath;
            gallery.innerHTML += `<img src=${imageElement} alt="image">`;
        }
    });
}
