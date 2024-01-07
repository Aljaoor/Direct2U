const one = document.querySelector(".one");
const two = document.querySelector(".two");
const three = document.querySelector(".three");
const four = document.querySelector(".four");
const five = document.querySelector(".five");

one.onclick = function () {
    one.classList.add("actives");
    two.classList.remove("actives");
    // three.classList.remove("active");
    four.classList.remove("actives");
    five.classList.remove("actives");
};

two.onclick = function () {
    one.classList.add("actives");
    two.classList.add("actives");
    // three.classList.remove("actives");
    four.classList.remove("actives");
    five.classList.remove("actives");
};
// three.onclick = function () {
//     one.classList.add("actives");
//     two.classList.add("actives");
//     three.classList.add("actives");
//     four.classList.remove("actives");
//     five.classList.remove("actives");
// };
four.onclick = function () {
    one.classList.add("actives");
    two.classList.add("actives");
    // three.classList.add("actives");
    four.classList.add("actives");
    five.classList.remove("actives");
};
five.onclick = function () {
    one.classList.add("actives");
    two.classList.add("actives");
    // three.classList.add("actives");
    four.classList.add("actives");
    five.classList.add("actives");
};
