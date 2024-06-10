/* Updated script.js */

document.addEventListener('DOMContentLoaded', function () {
    const openPopupButton = document.getElementById('open-popup');
    const overlay = document.getElementById('overlay');
    const popup = document.getElementById('popup');
    const closePopupButton = document.getElementById('close-popup');
    const popupForm = document.getElementById('popup-form');

    openPopupButton.addEventListener('click', function () {
        overlay.style.display = 'block';
        popup.style.display = 'block';
    });

    closePopupButton.addEventListener('click', function () {
        overlay.style.display = 'none';
        popup.style.display = 'none';
    });

    document.addEventListener('click', function (e) {
        console.log("Clicked:", e.target)
        if (e.target === popup) {
            overlay.style.display = 'none';
            popup.style.display = 'none';
        }
    });

    popupForm.addEventListener('submit', function (e) {
        e.preventDefault();
        // Handle form submission here, you can add your logic.
        // For example, you can access form data using popupForm.elements.
        const name = popupForm.elements.name.value;
        const email = popupForm.elements.email.value;
        // Perform any necessary actions with the form data.
        console.log(`Name: ${name}, Email: ${email}`);
        // Close the popup
        overlay.style.display = 'none';
        popup.style.display = 'none';
    });
});
