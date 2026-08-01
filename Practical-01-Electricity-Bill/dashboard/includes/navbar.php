<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="../index.php">
            <i class="bi bi-lightning-charge-fill"></i>
            Electricity Billing
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown"
                       href="#">
                        Customer
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="../customer/addCustomer.php">
                               Add Customer
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="../customer/viewCustomer.php">
                               View Customers
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown"
                       href="#">
                        Meter Reading
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="../meterReading/addReading.php">
                                Add Reading
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="../meterReading/viewReading.php">
                                View Readings
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle"
                       data-bs-toggle="dropdown"
                       href="#">
                        Billing
                    </a>

                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                               href="../billing/generateBill.php">
                               Generate Bill
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="../billing/viewBill.php">
                               View Bills
                            </a>
                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>
</nav>