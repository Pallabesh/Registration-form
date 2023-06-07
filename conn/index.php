<?php
/*  Required in every php program for a local database  */
/*  Setting connection variables  */
    $server = "localhost";
    $username = "root";
    $password = "";
/* establishing connection with the db */
/*  mysqli_connect in a predefined function in php which will check for connection with the help of the parameters passed to it */
    $con = mysqli_connect($server, $username, $password);     
    /* checking connection */
    if(!$con){
        /*  mysqli_connect_error() is a function that will return the error responsible for not getting connection! */
        die("connection failed due to the error : ".mysqli_connect_error());
    }
    /* echo "connection is successful!   :)"; */

/* inserting values to database */
/*
    so the way is...
    first html is connected to php...i.e. 
    $variable_name_in_php = $_POST['name and id_in_form'];
    
    and then php is connected with db...i.e.
    here, we have to create a new variable let say sql
    and then paste the insert statement coppied from insertion section in mysql...
    (the insertion part we have already done once while creating the database-test entry)
    and change the values with the variable we have created in php (i.e. $variable_name_in_php)
*/

/*  collecting post variables  */
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['desc'];


    $sql = "INSERT INTO `registration`.`registration` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";

/*  Executing the query  */
    if($con->query($sql) == true){
        echo "Thanks for your response.<br>Your responses are successfully recorded!  :)";
    }
    else{
        echo "Error: $sql <br> $con->error";
    }
/*  Closing the database connection */
    $con -> close();
?>