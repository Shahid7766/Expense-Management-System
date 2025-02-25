<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- include our own css -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>
<body>


<?php
session_start();
include("./includes/functions.php");
// include files of db_conn.php
include("./includes/db_conn.php");

if(isset($_SESSION['message']) && isset($_SESSION['color'])){
    echo my_alert($_SESSION['color'],$_SESSION['message']);
    unset($_SESSION['color'],$_SESSION['message']);
}

if(isset($_POST['login'])){

    // getting input values from html form
    $reg_username=$_POST['username'];
    $pass=$_POST['password'];

    $login_query= "SELECT * FROM expense_registration WHERE username='$reg_username'";
    $result_login_query= mysqli_query($conn,$login_query);
    
    if(mysqli_num_rows($result_login_query)==1){
        $row= mysqli_fetch_assoc($result_login_query);
        $db_user_name= $row['username'];
        $db_user_pass= $row['password'];
        
        if(password_verify($pass,$db_user_pass)){
            $_SESSION['name']= $db_user_name;
            $_SESSION['is_login']= true;

            //to show notification of success
            $_SESSION['message'] = "Login Successful";
            $_SESSION['color'] = "success";
            header("Location: index.php");
        }
        else{
            my_alert("danger","Incorrect Password");
        }
    }
    else{
        my_alert("danger","user does not exist");
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
            Login
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" placeholder="Enter username" class="form-control"name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" placeholder="Enter password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>









<?php
include("./includes/footer.php")
?>