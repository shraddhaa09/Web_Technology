CREATE DATABASE IF NOT EXISTS electricity_billing;

USE electricity_billing;

CREATE TABLE customer
(
    customerId INT AUTO_INCREMENT PRIMARY KEY,
    customerName VARCHAR(100) NOT NULL,
    address VARCHAR(200) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    email VARCHAR(100),
    customerType VARCHAR(20) NOT NULL,
    meterNumber VARCHAR(20) UNIQUE NOT NULL,
    connectionDate DATE,
    status VARCHAR(20)
);

CREATE TABLE meterreading
(
    readingId INT AUTO_INCREMENT PRIMARY KEY,
    customerId INT NOT NULL,
    previousReading INT NOT NULL,
    currentReading INT NOT NULL,
    unitsConsumed INT NOT NULL,
    readingDate DATE,
    FOREIGN KEY(customerId)
    REFERENCES customer(customerId)
);

CREATE TABLE bill
(
    billId INT AUTO_INCREMENT PRIMARY KEY,
    customerId INT NOT NULL,
    previousReading INT,
    currentReading INT,
    unitsConsumed INT,
    totalBill DECIMAL(10,2),
    billDate DATE,
    FOREIGN KEY(customerId)
    REFERENCES customer(customerId)
);