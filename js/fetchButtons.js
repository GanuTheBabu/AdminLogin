document.addEventListener('DOMContentLoaded', () => {
    fetch('fetchButtons.php')
        .then(response => response.json())
        .then(data => {
            const buttonContainer = document.getElementById('buttonContainer');
            data.forEach(button => {
                const buttonElement = document.createElement('a');
                buttonElement.id = 'a';
                buttonElement.href = button.link;
                buttonElement.innerHTML = `<div class="box">${button.label}</div>`;
                buttonContainer.appendChild(buttonElement);
            });
        });
});
