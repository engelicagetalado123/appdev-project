// Drawer toggle functions
function openMenu() {
    document.getElementById("drawer").classList.add("open");
    document.getElementById("overlay").classList.add("show");
}
function closeMenu() {
    document.getElementById("drawer").classList.remove("open");
    document.getElementById("overlay").classList.remove("show");
}

// Close drawer if overlay is clicked
document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("overlay");

    if (overlay) {
        overlay.addEventListener("click", closeMenu);
    }
});
