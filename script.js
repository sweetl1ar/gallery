const wrapper = document.querySelector('.wrapper');
function registerActive() {
    wrapper.classList.toggle('active');
}
function loginActive() {
    wrapper.classList.toggle('active');
}

const backButton = document.querySelector('.arr');

backButton.addEventListener('click', () => {
   window.location.href = "index.html";
}); 