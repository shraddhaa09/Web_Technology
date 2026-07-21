CREATE DATABASE IF NOT EXISTS electricity_bill_db;

USE electricity_bill_db;

CREATE TABLE electricity_bills
(
    id INT AUTO_INCREMENT PRIMARY KEY,

    customer_name VARCHAR(100) NOT NULL,

    customer_type ENUM('Domestic','Commercial') NOT NULL,

    units INT NOT NULL,

    total_bill DECIMAL(10,2) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);