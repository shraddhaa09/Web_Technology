# Electricity Bill Calculator using Bootstrap

## Description
This project is a simple **Electricity Bill Calculator** developed using **PHP, Bootstrap 5, HTML, and CSS**. It calculates the electricity bill based on the customer's meter readings using predefined slab rates and displays the bill details in a responsive Bootstrap interface.

## Technologies Used
- PHP
- HTML5
- CSS3
- Bootstrap 5

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
- Displays Total Bill Amount
- Responsive Bootstrap User Interface

## Electricity Tariff Slabs

| Units Consumed | Rate (₹/Unit) |
|---------------:|--------------:|
| 0 – 50         | 3.50 |
| 51 – 150       | 4.00 |
| 151 – 250      | 5.20 |
| Above 250      | 6.50 |

## Formula Used

```text
Units Consumed = Current Meter Reading − Previous Meter Reading
```

The total bill is calculated according to the applicable electricity slab rates.

## Project Structure

```text
Bootstrap/
│── index.php
│── style.css
│── README.md
└── screenshots/
    ├── input.png
    └── output.png
```

## How to Run

1. Install XAMPP.
2. Copy the project folder into the `htdocs` directory.
3. Start the Apache server from the XAMPP Control Panel.
4. Open your browser and visit:

```text
http://localhost/web_technology/web-technology-lab/Practical-01-Electricity-Bill/Bootstrap/index.php
```

## Screenshots

### Input Form

![Input Form](screenshots/input.png)

### Bill Details

![Bill Details](screenshots/output.png)

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