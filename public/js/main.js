const target = document.getElementById("menu");
target.addEventListener('click', () => {
target.classList.toggle('open');
const nav = document.getElementById("nav");
nav.classList.toggle('in');
});

// function inputCheckDate() {
//   var inputValue = document.getElementById( "inputFormDate" ).data.value;
//   document.getElementById( "checkDate" ).innerHTML = 'aaa' + inputValue;
// }
// function inputCheckTime() {
//   var inputValue = document.getElementById( "inputFormTime" ).time.value;
//   document.getElementById( "checkTime" ).innerHTML = inputValue;
// }
// function inputCheckNum() {
//   var inputValue = document.getElementById( "inputFormNum" ).number.value;
//   document.getElementById( "checkNum" ).innerHTML = inputValue;
// }