<?php session_start(); ?>

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
    <title>
        <?php 
        $filename = basename($_SERVER['PHP_SELF'],".php"); 
        $page_title = ucfirst(str_replace("_"," ",$filename));

        if($page_title === "Index"){
            echo "Dashboard";
        }
        else{
            echo $page_title;
        }
        ?>
    </title>
</head>
<body>
    <?php 
        if(isset($_SESSION['is_login'])==true){
            include("./includes/gen_nevbar.php");
        }
    ?>