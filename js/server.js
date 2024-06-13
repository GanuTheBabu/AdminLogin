const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const cors = require('cors'); // Import the cors middleware

const app = express();
const port = 3000;

// Use the cors middleware
app.use(cors());

// Create MySQL connection pool
const pool = mysql.createPool({
  host: 'localhost',
  user: 'your_mysql_user',
  password: 'your_mysql_password',
  database: 'your_database_name'
});

app.use(bodyParser.json());

// Handle POST request to add a button
app.post('/buttons', (req, res) => {
  const buttonName = req.body.name;

  // Insert button name into MySQL database
  pool.query('INSERT INTO buttons (name) VALUES (?)', [buttonName], (error, results) => {
    if (error) {
      console.error('Error adding button:', error);
      res.status(500).json({ error: 'Failed to add button. Please try again later.' });
    } else {
      console.log('Button added successfully');
      res.status(200).json({ message: 'Button added successfully.' });
    }
  });
});

// Start the server
app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
