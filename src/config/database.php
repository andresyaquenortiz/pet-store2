<?php 

$host = "aws-0-us-east-1.pooler.supabase.com";
$port = "6543";
$dbname = "postgres";
$user = "postgres.ngislruakgwcoqagnxwb";
$password = "unicesmag@@";

$data_connection="
   host=$host
   port=$port
   dbname=$dbname
   user=$user
   password=$password
";

$conn = pg_connect($data_connection);
if(!$conn){
    echo"conection error";
}else { echo"success !!!";}
//pg_close($conn)
?>