function openMenu() {
  document.getElementById("drawer").classList.add("open");
  document.getElementById("overlay").classList.add("show");
}

//=============
//    MODAL
//=============
function closeMenu() {
  document.getElementById("drawer").classList.remove("open");
  document.getElementById("overlay").classList.remove("show");
}

function openLoginModal() {
    document.getElementById('loginModal').style.display = 'block';
}

function closeLoginModal() {
    document.getElementById('loginModal').style.display = 'none';
}

window.onclick = function (event) {
    const modal = document.getElementById('loginModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};
 document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    if (params.get('login') === 'registered') {
        document.getElementById('loginModal').style.display = 'block';
        const modalContent = document.querySelector('#loginModal .modal-content');
        const msg = document.createElement('p');
        msg.style.color = 'green';
        msg.textContent = "Registration successful! Please log in.";
        modalContent.insertBefore(msg, modalContent.firstChild);
    }
});


