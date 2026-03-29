CREATE DATABASE IF NOT EXISTS matrimonial_db;
USE matrimonial_db;

CREATE TABLE IF NOT EXISTS biodata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    dob DATE NOT NULL,
    religion VARCHAR(50) NOT NULL,
    education VARCHAR(100) NOT NULL,
    occupation VARCHAR(100) NOT NULL,
    height_cm INT NOT NULL,
    contact_email VARCHAR(100) NOT NULL,
    contact_phone VARCHAR(20) NOT NULL,
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
