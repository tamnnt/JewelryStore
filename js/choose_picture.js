

// choose picture 

const fileInput = document.querySelector(".inputFile"),
uploadIcon = document.querySelector(".uploadIcon"),
fileReturn = document.querySelector(".fileReturn");

// To Add the file name when Upload

uploadIcon.addEventListener("click", function (event) {
   fileInput.focus();
// return false;
});

fileReturn.addEventListener("click", function (event) {
   fileInput.focus();
});

fileInput.addEventListener("change", function (event) {
   fileReturn.innerText = this.value.replace(/C:\\fakepath\\/i, '');
   uploadIcon.style.visibility = "hidden";
   fileReturn.classList.add('show');
});
