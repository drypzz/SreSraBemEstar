const svgElement = document.querySelector('#oathhhhs');

if (svgElement) {
    svgElement.setAttribute('fill', '#f4f4f4');
}

// dark-mode btn

const buttonDarkMode = document.querySelector('#darkmode');

// dark-mode function

const toggleDarkMode = function () {
    var body = document.body;
    body.classList.toggle('dark-mode');

    if (svgElement) {
        var get = svgElement.getAttribute('fill');

        if (get === '#f4f4f4') {
            svgElement.setAttribute('fill', '#161616');
        } else {
            svgElement.setAttribute('fill', '#f4f4f4');
        }
    } else {
        console.log('SVG de (ID: #oathhhhs) não encontrado.');
    }

    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
};

buttonDarkMode.addEventListener('click', () => {
    buttonDarkMode.classList.toggle('active');
    toggleDarkMode();
});

// Verificando dark mode no localStorage 

window.addEventListener('load', () => {
    const darkModeStatus = localStorage.getItem('darkMode');

    if (darkModeStatus === 'enabled') {
        document.body.classList.add('dark-mode');
        buttonDarkMode.classList.add('active');
        if (svgElement) {
            svgElement.setAttribute('fill', '#161616');
        }
    } else {
        document.body.classList.remove('dark-mode');
        buttonDarkMode.classList.remove('active');
        if (svgElement) {
            svgElement.setAttribute('fill', '#f4f4f4');
        }
    }
});
