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
            } else {
                alert('Failed to add button.');
            }
        });
    }
});
