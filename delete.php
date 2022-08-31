<?php


$localhost = "localhost";
$user = "root";
$password = "";
$database = "kpkims";
$db = new mysqli($localhost, $user, $password, $database);


if(isset($_GET['delete'])){
    $id = $_GET['delete'];



$sel = "DELETE FROM `education` WHERE id=$id ";
$cmd = mysqli_query($db,$sel);
if($cmd){
    echo '<script>window.location="education.php"</script>';
}else{
    echo 'Record Not Found';
}
}

?>