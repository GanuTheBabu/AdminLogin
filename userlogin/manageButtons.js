document.getElementById('addButton').addEventListener('click', () => {
    const label = prompt('Enter button label:');
    const link = prompt('Enter button link:');
    
    if (label && link) {
        fetch('addButton.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ label, link }),
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                alert('Button added successfully!');
                // Create a new button element
                const newButton = document.createElement('div');
                newButton.className = 'dynamicButton';
                newButton.textContent = label; // Set button label
                // Append the new button to the container
                document.getElementById('buttonContainer').appendChild(newButton);
            } else {
                alert('Failed to add button.');
            }
        });
    }
});

document.getElementById('removeButton').addEventListener('click', () => {
    const label = prompt('Enter the label of the button to remove:');
    
    if (label) {
        fetch('removeButton.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ label }),
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                alert('Button removed successfully!');
                // Remove the button with the specified label
                const buttons = document.getElementsByClassName('dynamicButton');
                for (let i = 0; i < buttons.length; i++) {
                    if (buttons[i].textContent === label) {
                        buttons[i].parentNode.removeChild(buttons[i]);
                        break; // Exit loop after removing the button
                    }
                }
            } else {
                alert('Failed to remove button.');
            }
        });
    }
});
