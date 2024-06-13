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
                location.reload();
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
                location.reload();
            } else {
                alert('Failed to remove button.');
            }
        });
    }
});
