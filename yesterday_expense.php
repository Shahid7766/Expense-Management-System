<?php
// include files of header.php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5 mb-5">Yesterday's Expenses</h1>
        </div>
        <div class="col-12">
            <a href="./add_expense.php" class="btn btn-primary mb-3">Add Expense</a>
        </div>
    </div>
</div>

<div class="container ">
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr class="text-center">
        <th scope="col">ID</th>
        <th scope="col">Expense Name</th>
        <th scope="col">Description</th>
        <th scope="col">Amount</th>
        <th scope="col">Date Added</th>
        <th scope="col">Payment Method</th>
        <th scope="col">Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $today_date = date("Y-m-d");
            $yesterday_date = date('Y-m-d',strtotime("-1 days"));
            echo $today_date . " - " . $yesterday_date;
            $fetch_expense = "SELECT * FROM expense_info WHERE expenseDate= '$yesterday_date' ORDER BY expenseDate DESC";
            $run_fetch_expense = mysqli_query($conn,$fetch_expense);
            $expense_counter = 1;
            $total = 0;
            if(mysqli_num_rows($run_fetch_expense) > 0){
                while($row=mysqli_fetch_assoc($run_fetch_expense)){
                    ?>
                    <tr>
                        <td><?php echo $expense_counter; ?></td>
                        <td><?php echo $row['expenseItem']; ?></td>
                        <td><?php echo $row['expenseDescription']; ?></td>
                        <td><?php echo $row['expenseAmount']; ?></td>
                        <td><?php echo $row['expenseDate']; ?></td>
                        <td><?php echo $row['paymentMethod']; ?></td>
                        <td class="d-flex justify-content-evenly">
                        <a href="./delete_expenses.php?del_expense_id=<?php echo $row['expenseId']; ?>" > Delete</a>
                        <a href="./edit_expense.php?edit_expense_id=<?php echo $row['expenseId']; ?>" > Edit</a>
                        </td>
                    </tr>
                    <?php
                    $expense_counter++;
                    $total = $total + $row['expenseAmount'];
                }
                ?>
                <tr>
                    <th colspan="3">Total Amount</th>
                    <th colspan="4"><?php echo $total;?></th>
                </tr>
                <?php
            }
            else{
                ?>
            <tr>
                <td colspan="7">
                    <h3 class="text-danger text-center">No Record Found</h3>
                </td>
            </tr>
        <?php
            }
        ?>
    </tbody>
    </table>
</div>

<?php
include("./includes/footer.php")
?>