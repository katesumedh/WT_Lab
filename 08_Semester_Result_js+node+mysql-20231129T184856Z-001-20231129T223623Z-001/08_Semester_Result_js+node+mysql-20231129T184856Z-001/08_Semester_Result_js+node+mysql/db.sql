-- Create a database (if not exists)
CREATE DATABASE IF NOT EXISTS your_database;
USE your_database;

-- Create a table for student results
CREATE TABLE IF NOT EXISTS student_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    subject1 INT NOT NULL,
    subject2 INT NOT NULL,
    subject3 INT NOT NULL
);

-- Insert some sample data (optional)
INSERT INTO student_results (name, subject1, subject2, subject3) VALUES
('Rohit Sharma', 85, 90, 78),
('Virat Kohli', 92, 88, 95),
('AB DE Vilers', 78, 65, 80);
