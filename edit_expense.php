<?php

include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
check_user();

$edit_expense_id=null;
$db_expenseItem= null;
$db_expenseDescription= null;
$db_expenseAmount= null;
$db_expenseDate= null;
$db_paymentMethod= null;

// fetching data from database table-expense info
if(isset($_REQUEST['edit_expense_id'])){

    $edit_expense_id= $_REQUEST['edit_expense_id'];

    $fetch_query= "SELECT * FROM expense_info WHERE expenseId = $edit_expense_id";

    $run_fetch_query= mysqli_query($conn,$fetch_query);

    $row= mysqli_fetch_assoc($run_fetch_query);

    $db_expenseItem= $row['expenseItem'];
    $db_expenseDescription= $row['expenseDescription'];
    $db_expenseAmount= $row['expenseAmount'];
    $db_expenseDate= $row['expenseDate'];
    $db_paymentMethod= $row['paymentMethod'];
}

// updating expense_info table column values
if(isset($_POST['update-item'])){
    $update_expenseItem= $_POST['update_expenseItem'];
    $update_expenseDescription= $_POST['update_expenseDescription'];
    $update_expenseAmount= $_POST['update_expenseAmount'];
    $update_expenseDate= $_POST['update_expenseDate'];
    $update_paymentMethod= $_POST['update_paymentMethod'];
    
    $update_query= "UPDATE `expense_info` SET `expenseItem`='$update_expenseItem',`expenseDescription`='$update_expenseDescription',`expenseAmount`='$update_expenseAmount',`expenseDate`='$update_expenseDate',`paymentMethod`='$update_paymentMethod' WHERE expenseId= $edit_expense_id ";
    $run_update_query= mysqli_query($conn,$update_query);

    if($run_update_query){
        my_alert("success","Expense updated successfully");
    }
    else{
        echo "Error while updating the expense";
    }
}
mysqli_close($conn);
?>


  <div class="container mt-5">
    <h2>Update Expense</h2>
    <form method="POST">
      
      <!-- Expense Category -->
      <div class="mb-3">
        <label for="expenseItem" class="form-label">Expense Item</label>
        <input type="text" class="form-control" id="expenseItem" name="update_expenseItem" value="<?php echo $db_expenseItem ?>" required>
      </div>

      <!-- Expense Description -->
      <div class="mb-3">
        <label for="expenseDescription" class="form-label">Expense Description</label>
        <input type="text" class="form-control" id="expenseDescription" name="update_expenseDescription" value="<?php echo $db_expenseDescription ?>" required>
      </div>

      <!-- Amount -->
      <div class="mb-3">
        <label for="expenseAmount" class="form-label">Amount ($)</label>
        <input type="number" class="form-control" id="expenseAmount" name="update_expenseAmount" step="0.01" value="<?php echo $db_expenseAmount ?>" required>
      </div>

      <!-- Date -->
      <div class="mb-3">
        <label for="expenseDate" class="form-label">Date</label>
        <input type="date" class="form-control" id="expenseDate" name="update_expenseDate" value="<?php echo $db_expenseDate ?>" required>
      </div>

      <!-- Payment Method -->
      <div class="mb-3">
        <label for="paymentMethod" class="form-label">Payment Method</label>
        <select class="form-select" id="paymentMethod" name="update_paymentMethod" value="<?php echo $db_paymentMethod ?>"required>
          <option value="" disabled selected>Select payment method</option>
          <option value="Cash">Cash</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Debit Card">Debit Card</option>
          <option value="Bank Transfer">Bank Transfer</option>
          <option value="PhonePe">PhonePe</option>
          <option value="Gpay">Gpay</option>
          <option value="Paytm">Paytm</option>
          <option value="Net Banking">Net Banking</option>
        </select>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary" name="update-item">Update Expense</button>
    </form>
  </div>










<?php
include("./includes/footer.php")
?>