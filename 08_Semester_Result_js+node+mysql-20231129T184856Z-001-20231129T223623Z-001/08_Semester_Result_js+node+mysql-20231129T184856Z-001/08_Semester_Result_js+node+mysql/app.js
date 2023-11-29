// run npm init - y
//npm install express mysql2
// then to run server do this - node app.js

const express = require('express');
const path = require('path');
const mysql = require('mysql2');

const app = express();
const port = 3000;

// MySQL database connection
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'your_database'
});

connection.connect((err) => {
  if (err) {
    console.error('Error connecting to MySQL: ', err);
    return;
  }
  console.log('Connected to MySQL database');
});

// Serve static files from the 'public' directory
app.use(express.static('public'));

// Route to fetch and send semester results
app.get('/results', (req, res) => {
  // Fetch data from the database
  const sql = 'SELECT * FROM student_results';
  connection.query(sql, (err, results) => {
    if (err) {
      console.error('Error fetching results: ', err);
      res.status(500).json({ error: 'Internal Server Error' });
      return;
    }

    // Process and send results
    const formattedResults = results.map((result) => {
      const totalMarks = result.subject1 + result.subject2 + result.subject3;
      const percentage = (totalMarks / 300) * 100;

      let grade = 'F'; // Default grade

      if (percentage >= 90) {
        grade = 'A+';
      } else if (percentage >= 80) {
        grade = 'A';
      } else if (percentage >= 70) {
        grade = 'B+';
      } else if (percentage >= 60) {
        grade = 'B';
      } // Add more conditions as needed

      return {
        id: result.id,
        name: result.name,
        totalMarks,
        percentage: percentage.toFixed(2),
        grade
      };
    });

    res.json(formattedResults);
  });
});

// Route for the root path to serve the index.html file
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Start the server
app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
