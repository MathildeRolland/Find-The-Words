const generateBtn = document.querySelector('.buttons__generate');
generateBtn.addEventListener('click', handleClick);

function handleClick() {
    // I retrieve the number of extracts via the counter
    let extractsNumber = document.querySelector('.counter').textContent;

    // I use that total number to calculate a random one that will be the id of the extract to display
    let randomId = Math.floor(Math.random() * extractsNumber);

    // I send it via the URL so that PHP can use it
    window.location.href="index.php?rdmNb=" + randomId;
}

