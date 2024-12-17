
const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar-hnm"),
    toggle = body.querySelector(".toggle-hnm"),
    modeSwitch = body.querySelector(".toggle-switch-hnm"),
    modeText = body.querySelector(".mode-text-hnm");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})



