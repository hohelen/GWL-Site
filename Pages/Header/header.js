async function loadTemplate() {
    const response = await fetch('../Header/general-header.html');
    const template = await response.text();
    document.getElementById('header-container').innerHTML = template;
}

loadTemplate();