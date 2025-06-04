<?php

include('../config\database.php');

$fname = $_POST['f_name'];
$lname = $_POST['l_name'];
$email = $_POST['l_name'];
$passw = $_POST['p_assw'];

$sql_validate_email = "
        select 
            count(id) as total
        from
            users
        where
            email = '$email' and
        status = true
    ";

$ans = pg_query($conn, $sql_validate_email);
if ($ans) {
    $row = pg_fetch_assoc($ans);
    if ($row['total'] > 0) {
        echo "User already exits !!!";
    } else {
        $sql = "INSERT INTO users (firstname, lastname, email, password)
        VALUES('$fname','$lname','$email', '$hashed_password')
        ";
        $ans = pg_query($conn, $sql);

        if ($ans) {
            //echo "User has been created successfully";
            echo "<script>alert('User has been created, Go to login!')</script>";
            header('Refresh:0,URL=http://localhost/pet-store2/src/login.php');
        } else {
            echo "Error";
        }
    }
} else {
    echo "Query Error";
}

?>