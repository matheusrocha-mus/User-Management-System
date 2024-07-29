function updateModalEmail (user) {
    const userData = JSON.parse(user);
    console.log(userData);
    const modal = document.getElementById('deleteUser');
    modal.querySelector("strong").textContent = userData.email;
    document.getElementById('userToDelete').value = userData.id;
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