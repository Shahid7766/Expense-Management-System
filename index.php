<?php

include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
check_user();

if(isset($_SESSION['message']) && isset($_SESSION['color'])){
    echo my_alert($_SESSION['color'],$_SESSION['message']);
    unset($_SESSION['color'],$_SESSION['message']);
}

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
<h2 class="text-center mt-4 display-4 fw-bold">Expense Management System </h2>
<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Total Expenses Card
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Total Expenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">$1,250.00</h5>
                    <p class="card-text">Total expenses for the current month.</p>
                </div>
            </div>
        </div> -->
        
        <!-- Total Income Card
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Total Income
                </div>
                <div class="card-body">
                    <h5 class="card-title">$3,500.00</h5>
                    <p class="card-text">Total income for the current month.</p>
                </div>
            </div>
        </div> -->

        <!-- Total users display -->
         <a href="display_reg_users.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Total Users
                </div>
                <div class="card-body">
                <strong>
                    <?php 
                        $user_query = "SELECT username from expense_registration";
                        $run_user_query = mysqli_query($conn,$user_query);
                        echo mysqli_num_rows($run_user_query); 
                    ?>
                </strong>
                    <p class="card-text">Total user registered.</p>
                </div>
            </div>
        </div>
    </a>
        
        <!-- Remaining Budget Card-->
        <a href="all_expense.php" style="text-decoration: none;">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Expenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">View Expenses</h5>
                    <p class="card-text">Here, you can see your expenses .</p>
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