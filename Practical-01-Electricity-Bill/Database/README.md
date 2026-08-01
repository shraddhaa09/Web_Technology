# Electricity Bill Calculator using PHP & MySQL

## Description
This project is a simple **Electricity Bill Calculator** developed using **PHP, MySQL, HTML, and CSS**. It calculates the electricity bill based on meter readings using predefined slab rates and stores the customer and billing details in a MySQL database.

## Technologies Used
- PHP
- MySQL
- HTML5
- CSS3
- XAMPP (Apache & MySQL)

## Features
- Customer ID
- Customer Name
- Customer Address
- Customer Type (Domestic / Commercial)
- Bill Date
- Previous Meter Reading
- Current Meter Reading
- Automatic Unit Consumption Calculation
- Electricity Bill Calculation
- Stores Customer Details in MySQL Database
- Displays Total Bill Amount

## Electricity Tariff Slabs

| Units Consumed | Rate (₹/Unit) |
|---------------:|--------------:|
| 0 – 50 | ₹3.50 |
| 51 – 150 | ₹4.00 |
| 151 – 250 | ₹5.20 |
| Above 250 | ₹6.50 |

## Formula Used

```text
Units Consumed = Current Meter Reading − Previous Meter Reading
```

The total bill is calculated according to the applicable electricity tariff slabs.

## Database

**Database Name**

```text
electricity_bill
```

**Table Name**

```text
bill
```

## Project Structure

```text
Database/
│── index.php
│── db.php
│── style.css
│── README.md
└── screenshots/
    ├── form.png
    ├── output.png
    └── database.png
```

## How to Run

1. Install XAMPP.
2. Start **Apache** and **MySQL** from the XAMPP Control Panel.
3. Create a database named `electricity_bill`.
4. Create the `bill` table in phpMyAdmin.
5. Copy the project folder into the `htdocs` directory.
6. Open your browser and visit:

```text
http://localhost/web_technology/web-technology-lab/Practical-01-Electricity-Bill/Database/index.php
```

## Screenshots

### Input Form

![Input Form](screenshots/form.png)

### Bill Details

![Bill Details](screenshots/output.png)

### Database Records

![Database](screenshots/database.png)

## Sample Input

| Field | Value |
|-------|-------|
| Customer ID | 101 |
| Customer Name | Shraddha |
| Address | Pune |
| Customer Type | Domestic |
| Previous Reading | 1200 |
| Current Reading | 1380 |

## Sample Output

```text
Units Consumed : 180

Total Bill : ₹731.00
```

## Author

**Shraddha Prakash Khetmalis**