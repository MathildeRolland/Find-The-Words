/**
 * HANDLE BURGER MENU CLICK
 */

const burger = document.querySelector('.burger');
burger.addEventListener("click", handleBurgerClick);

function handleBurgerClick() {
    const nav = document.querySelector('.header__nav');
    if(nav.style.display !== "block") {
        nav.style.display = "block";
    } else {
        nav.style.display = "none";
    }
}



/**
 * GENERATE RANDOM NUMBER AND PASS IT IN THE URL SO THAT PHP CAN USE IT
 */

const generateBtn = document.querySelector('.generate');

if(generateBtn !== null) {
    generateBtn.addEventListener("click", handleClick);
}


function handleClick() {
    // I retrieve the number of extracts via the counter
    let extractsNumber = document.querySelector('.counter').textContent;

    // I use that total number to calculate a random one that will be the id of the extract to display
    let randomId = Math.ceil(Math.random() * extractsNumber);

    // I send it via the URL so that PHP can use it
    window.location.href = randomId;
    
}





/**
 * HANDLE SELECT CHANGE
 */

const select = document.querySelector('#themes');
select.addEventListener("change", handleSelectChange);

function handleSelectChange() {
    let optionChosen = select.value;
    window.location.href = optionChosen;
    let url = window.location.href;
}