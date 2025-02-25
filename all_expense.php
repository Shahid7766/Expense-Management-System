<?php

include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
check_user();

?>


<?php 
   // $user_query = "SELECT username from expense_registration";
   // $run_user_query = mysqli_query($conn,$user_query);
   // echo mysqli_num_rows($run_user_query); 
?>

<div class="container">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-body {
            padding: 2rem;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.25rem;
        }
        .card {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
<h2 class="text-center mt-4 display-4 fw-bold">Date Wise Expense </h2>
<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Total Expenses Card -->
        <a href="today_expense.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Today's Expenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php 
                            $today_date = date("Y-m-d");
                            $fetch_today_expense = "SELECT * FROM expense_info WHERE expenseDate= '$today_date'";
                            $run_fetch_today_expense = mysqli_query($conn,$fetch_today_expense);
                            echo mysqli_num_rows($run_fetch_today_expense);
                        ?>
                    </h5>
                    <p class="card-text">Total expenses for today.</p>
                </div>
            </div>
        </div>
    </a>

        <!-- Total Income Card -->
        <a href="yesterday_expense.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Yesterday's Expense
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <?php 
                        $today_date = date("Y-m-d");
                        $yesterday_date = date('Y-m-d',strtotime("-1 days"));
                        $fetch_yesterday_expense = "SELECT * FROM expense_info WHERE expenseDate= '$yesterday_date'";
                        $run_fetch_yesterday_expense = mysqli_query($conn,$fetch_yesterday_expense);
                        echo mysqli_num_rows($run_fetch_yesterday_expense);
                    ?>
                    </h5>
                    <p class="card-text">Total expenses for the yesterday.</p>
                </div>
            </div>
        </div> 
    </a>
        
        <!-- Remaining Budget Card-->
        <a href="seven_days_expense.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Last week Expenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <?php 
                        $today_date = date("Y-m-d");
                        $previous_seven_days_date = date("Y-m-d",strtotime($today_date . "-1 week"));
                        $fetch_seven_day_expense = "SELECT * FROM expense_info WHERE expenseDate BETWEEN '$previous_seven_days_date' AND '$today_date'";
                        $run_fetch_seven_day_expense = mysqli_query($conn,$fetch_seven_day_expense);
                        echo mysqli_num_rows($run_fetch_seven_day_expense);
                    ?>
                    </h5>
                    <p class="card-text">Total expenses for the current weak.</p>
                </div>
            </div>
        </div>
    </a>

        <!-- Remaining Budget Card-->
        <a href="month_expense.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Last month Expenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <?php 
                        $today_date = date("Y-m-d");
                        $previous_seven_days_date = date("Y-m-d",strtotime($today_date . "-1 month"));
                        $fetch_month_expense = "SELECT * FROM expense_info WHERE expenseDate BETWEEN '$previous_seven_days_date' AND '$today_date'";
                        $run_fetch_month_expense = mysqli_query($conn,$fetch_month_expense);
                        echo mysqli_num_rows($run_fetch_month_expense)
                    ?>
                    </h5>
                    <p class="card-text">Total expenses for the current month.</p>
                </div>
            </div>
        </div>
    </a>


    <a href="year_expense.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Last Year Expenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <?php 
                        $today_date = date("Y-m-d");
                        $previous_year = date("Y-m-d",strtotime("-1 year"));
                        $fetch_year_expense = "SELECT * FROM expense_info WHERE expenseDate BETWEEN '$previous_year' AND '$today_date'";
                        $run_fetch_year_expense = mysqli_query($conn,$fetch_year_expense);
                        echo mysqli_num_rows($run_fetch_year_expense);
                    ?>
                    </h5>
                    <p class="card-text">Total expenses for the current year.</p>
                </div>
            </div>
        </div>
    </div>
    </a>

    <!--<div class="row row-cols-1 row-cols-md-2 g-4 mt-4"> -->
        <!-- Latest Transactions Card -->
        <!-- <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Latest Transactions
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Groceries</span>
                            <span>$150.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Rent</span>
                            <span>$800.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Utilities</span>
                            <span>$100.00</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  -->
</div>

</body>
</html>

</div>



<?php
include("./includes/footer.php")
?>