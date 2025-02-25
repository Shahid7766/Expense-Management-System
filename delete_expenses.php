<?php
// include files of header.php
include("./includes/header.php");
include("./includes/functions.php");
include("./includes/db_conn.php");


if(isset($_REQUEST['del_expense_id'])){

    $del_expense_id= $_REQUEST['del_expense_id'];

    $del_query= "DELETE FROM expense_info WHERE expenseId = $del_expense_id";

    $run_del_query= mysqli_query($conn,$del_query);

    if($run_del_query){
        my_alert("success","User deleted successfully");
        header("location: ./all_expense.php");
    }
    else{
        my_alert("danger","Something went wrong");
    }
    mysqli_close($conn);
    
}

?>
<?php
include("./includes/footer.php")
?>