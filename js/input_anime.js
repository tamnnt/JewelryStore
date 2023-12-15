
// Input anime

var inputField = document.querySelectorAll("input"),
inputWrapper = document.querySelectorAll(".input-wrapper");

// Event to Anime Input
inputField.forEach(function (el) {
el.addEventListener("focus", animeInput);
el.addEventListener("focusout", removeAnimeInput);
});

// To anime input
function animeInput(event) {
    event.target.closest(".input-wrapper").classList.add("active");
}

function removeAnimeInput(event) {
    if (event.target.value == "") {
        event.target.closest(".input-wrapper").classList.remove("active");
    }
}