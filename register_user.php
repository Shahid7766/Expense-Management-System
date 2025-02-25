<?php
// include files of header.php
include("./includes/header.php");
include("./includes/functions.php");
if(isset($_POST['register'])){

    // getting input values from html form
    $email=$_POST['email'];
    $reg_username=$_POST['username'];
    $pass=$_POST['password'];

    // Encrypted Password
    $enc_pass= password_hash($pass,PASSWORD_BCRYPT);

    // include files of db_conn.php
    include("./includes/db_conn.php");

    // Inserting data into database
    $sql= "INSERT INTO expense_registration(email,username,password) VALUES('$email','$reg_username','$enc_pass')";

    if(mysqli_query($conn,$sql)){
        my_alert("success","Registration completed successfully");
    }
    else{
        my_alert("danger","Registration was not completed");
    }
    mysqli_close($conn);
}
?>


<div class="container">
    <div class="container">
        <h1 class="text-center mt-5">Expense Management System</h1>
    </div>
    <div class="card myCard">
        <div class="card-header bg-primary text-white">
            Register User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" placeholder="Enter your email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" placeholder="Enter username" class="form-control"name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" placeholder="Enter password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>









<?php
include("./includes/footer.php")
?>