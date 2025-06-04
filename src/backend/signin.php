<?php
include('config\database.php');

$email = $_POST['e_mail'];
$passw = $_POST['p_assw'];

$hashed_password = password_hash($passw, PASSWORD_DEFAULT);
//$hashed_password = password_hash($passw, PASSWORD_DEFAULT);
$hashed_password = $passw; 
$sql="
select
   id,
   count(id) as total
   FROM
     USER U
   WHERE
      email = '$email' and 
      password = '$hashed_passw'
      group by id
";

$res = pg_query($conn, $sql);
if($res){
    $row = pg_fetch($res);
    if($row['total']> 0){
        header('Refresh:0,URL=http://localhost/pet-store/src/signin.html')
    }else{
        echo "login failed";
    }
}
?>