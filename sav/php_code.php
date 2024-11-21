<?php 
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'crud');

        // initialize variables
        $name = "";
        $address = "";
        $id = 0;
        $update = false;

        if (isset($_POST['save'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                

                mysqli_query($db, "INSERT INTO info (name, address) VALUES ('$name', '$address')"); 
                $_SESSION['message'] = "Address saved"; 
                header('location: index.php');
        }

        if (isset($_POST['update'])){
                $name = $_POST['name'];
                $address = $_POST['address'];
                $id = $_POST['id'];
                echo $id;
                mysqli_query($db, "UPDATE `info` SET `name` = '$name', `address` = '$address' WHERE `id` = $id");
                $_SESSION['message'] = "Edit successfully";
                header('location: index.php'); 
                        
        }

        if(isset($_GET['del'])){
                $id = $_GET['del'];
                mysqli_query($db, "DELETE FROM `info` WHERE `info`.`id` = $id");
                header("location: index.php");
        }
?>