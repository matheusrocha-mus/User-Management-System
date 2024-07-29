function updateModalEmail (userEmail) {
    const modal = document.getElementById('deleteUser');
    modal.querySelector("strong").textContent = userEmail;
}

document.addEventListener('DOMContentLoaded', function () {
    // Small script to set the width of the button based on its height
    const button = document.getElementById('square-button');
    function setButtonWidth() {
        const height = button.offsetHeight;
        button.style.width = `${height}px`;
    }
    setButtonWidth();
    window.addEventListener('resize', setButtonWidth);
});