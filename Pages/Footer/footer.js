async function loadFooter() {
    const response = await fetch('../Footer/footer.html');
    const template = await response.text();
    document.getElementById('footer-container').innerHTML = template;
}

loadFooter();
