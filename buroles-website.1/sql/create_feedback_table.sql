/* This SQL script creates a database and a table for storing feedback form data.
   The feedback table includes various fields to capture user information and feedback details.
   Upon creating this SQL this also  serves as to ensures that the data is safely inserted into the database while protecting against SQL injection attacks.*/
CREATE DATABASE IF NOT EXISTS buroles_database;

USE buroles_database;

/* Table for Feedback form  */
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NULL,
    date DATE NOT NULL,
    age VARCHAR(50) NOT NULL,
    sex VARCHAR(10) NOT NULL,
    customer_type VARCHAR(50) NOT NULL,
    service_availed VARCHAR(255) NOT NULL,
    region VARCHAR(255) NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    citizen_charter_awareness VARCHAR(10) NULL,
    cc1 VARCHAR(255)  NULL,
    cc2 VARCHAR(255)  NULL,
    cc3 VARCHAR(255)  NULL,
    sqd1 VARCHAR(255) NOT NULL,
    sqd2 VARCHAR(255) NOT NULL,
    sqd3 VARCHAR(255) NOT NULL,
    sqd4 VARCHAR(255) NOT NULL,
    sqd5 VARCHAR(255) NOT NULL,
    sqd6 VARCHAR(255) NOT NULL,
    sqd7 VARCHAR(255) NOT NULL,
    sqd8 VARCHAR(255) NOT NULL,
    remarks TEXT NULL
);

CREATE TABLE IF NOT EXISTS staffs_table (
    firstName VARCHAR(55) NOT NULL,
    lastName VARCHAR(55) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

