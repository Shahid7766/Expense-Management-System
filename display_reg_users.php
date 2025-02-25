<?php
// include files of header.php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-5 mb-5">Registered Users</h1>
        </div>
        <div class="col-12">
            <a href="./register_user.php" class="btn btn-primary mb-3">Add User</a>
        </div>
    </div>
</div>

<div class="container ">
    <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
        <th scope="col">Operations</th>
        </tr>
    </thead>
    <?php
    $fetch_data="SELECT reg_id,email,username FROM expense_registration";
    $run_fetch_data=mysqli_query($conn,$fetch_data);
    $counter=1;

    // this function is used to count number of rows
    // echo mysqli_num_rows($run_fetch_data);
    if(mysqli_num_rows($run_fetch_data)>0){
        // The mysqli_fetch_assoc() function fetches a result row as an associative array from the database.
        while($row=mysqli_fetch_assoc($run_fetch_data)){
            ?>
            <tbody>
                <tr>
            <th scope="row"><?php echo $counter ?></th>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>
                    <a class="me-3" href="./update_user_pass.php?update_pass_id=<?php echo $row['reg_id']; ?>" > Set new password</a>
                    <a href="./delete_user.php?delete_id=<?php echo $row['reg_id']; ?>" > Delete</a>
                </td>
                </tr>
            </tbody>
            <?php
            $counter++;
        }
    }
    else{
        ?>
            <tr>
                <td colspan="4">
                    <h3 class="text-danger text-center">No Record Found</h3>
                </td>
            </tr>
        <?php
    }
    mysqli_close($conn);
    ?>
    </table>
</div>

<?php
include("./includes/footer.php")
?>