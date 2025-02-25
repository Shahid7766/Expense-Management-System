<?php
// include files of header.php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");

$update_pass_id=null;
$db_user_name= null;

// fetching data from database
if(isset($_REQUEST['update_pass_id'])){

    $update_pass_id= $_REQUEST['update_pass_id'];

    $fetch_query= "SELECT username FROM expense_registration WHERE reg_id = $update_pass_id";

    $run_fetch_query= mysqli_query($conn,$fetch_query);

    $row= mysqli_fetch_assoc($run_fetch_query);

    $db_user_name= $row['username'];
    

}

// updating password from database
if(isset($_POST['update_pass'])){
    $update_user_pass= $_POST['update_user_pass'];
    $enc_password = password_hash($update_user_pass, PASSWORD_BCRYPT);
    $update_query= "UPDATE expense_registration SET password='$enc_password' WHERE reg_id=$update_pass_id";
    $run_update_query= mysqli_query($conn,$update_query);

    if($run_update_query){
        my_alert("success","Password updated successfully");
    }
    else{
        echo "Something went wrong";
    }
}
mysqli_close($conn);
?>

<div class="container">
    <div class="container">
        <h1 class="text-center mt-5">Expense Management System</h1>
    </div>
    <div class="card myCard">
        <div class="card-header bg-primary text-white">
            Set new password
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <form method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control"name="username" value="<?php echo $db_user_name ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" placeholder="Enter password" class="form-control" name="update_user_pass" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="update_pass">Update Password</button>
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