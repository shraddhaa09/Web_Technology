# Electricity Bill Calculator (Basic)

## Description
A basic Electricity Bill Calculator developed using **PHP, HTML, and CSS**. The application calculates the electricity bill based on meter readings and predefined unit slabs.

## Technologies Used
- HTML
- CSS
- PHP

## Features
- Customer ID
- Customer Name
- Address
- Customer Type (Domestic/Commercial)
- Bill Date
- Previous Meter Reading
- Current Meter Reading
- Units Consumed Calculation
- Electricity Bill Calculation
- Displays Total Bill Amount

## Standard Unit Slabs

| Units | Rate (₹/Unit) |
|-------|--------------:|
| 0 – 50 | 3.50 |
| 51 – 150 | 4.00 |
| 151 – 250 | 5.20 |
| Above 250 | 6.50 |

## Folder Structure

```
Basic/
│── index.php
│── style.css
└── README.md
```

## How to Run

1. Copy the project into the `htdocs` folder of XAMPP.
2. Start the Apache server from the XAMPP Control Panel.
3. Open your browser.
4. Visit:

```
http://localhost/web_technology/web-technology-lab/Practical-01-Electricity-Bill/Basic/index.php
```

## Output
- Accepts customer and meter details.
- Calculates units consumed.
- Computes the bill according to the slab rates.
- Displays the total bill amount.