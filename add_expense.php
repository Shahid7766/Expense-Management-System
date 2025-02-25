<?php

include("./includes/header.php");
include("./includes/functions.php");
check_user();

if(isset($_POST['add-item'])){

    // include files of db_conn.php
    include("./includes/db_conn.php");

    // getting input values from html form
    $expenseItem = $_POST['expenseItem'];
    $expenseDescription = $_POST['expenseDescription'];
    $expenseAmount = $_POST['expenseAmount'];
    $expenseDate = $_POST['expenseDate'];
    $paymentMethod = $_POST['paymentMethod'];

 
 
     // Inserting data into database
     $sql= "INSERT INTO expense_info(expenseItem,expenseDescription,expenseAmount,expenseDate,paymentMethod) VALUES('$expenseItem','$expenseDescription','$expenseAmount','$expenseDate','$paymentMethod')";
 
     if(mysqli_query($conn,$sql)){
         my_alert("success","Expenses added successfully");
     }
     else{
         my_alert("danger","Expenses didn't add");
     }
     mysqli_close($conn);
}

?>


  <div class="container mt-5">
    <h2>Add Expense</h2>
    <form method="POST">
      
      <!-- Expense Category -->
      <div class="mb-3">
        <label for="expenseItem" class="form-label">Expense Item</label>
        <input type="text" class="form-control" id="expenseItem" name="expenseItem" required>
      </div>

      <!-- Expense Description -->
      <div class="mb-3">
        <label for="expenseDescription" class="form-label">Expense Description</label>
        <input type="text" class="form-control" id="expenseDescription" name="expenseDescription" required>
      </div>

      <!-- Amount -->
      <div class="mb-3">
        <label for="expenseAmount" class="form-label">Amount ($)</label>
        <input type="number" class="form-control" id="expenseAmount" name="expenseAmount" step="0.01" required>
      </div>

      <!-- Date -->
      <div class="mb-3">
        <label for="expenseDate" class="form-label">Date</label>
        <input type="date" class="form-control" id="expenseDate" name="expenseDate" value="<?php echo date("Y-m-d"); ?>" required>
      </div>

      <!-- Payment Method -->
      <div class="mb-3">
        <label for="paymentMethod" class="form-label">Payment Method</label>
        <select class="form-select" id="paymentMethod" name="paymentMethod" required>
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
      <button type="submit" class="btn btn-primary" name="add-item">Add Expense</button>
    </form>
  </div>










<?php
include("./includes/footer.php")
?>