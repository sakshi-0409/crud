<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<?php 
include 'nav.php';  

$servername = "localhost";
$username = "root";
$password = "";
$database = "iNotes";
$insert = false;
$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
  echo "sorry to be failed!!". mysqli_connect_error();
}  
else {
  echo "success!!";  
}
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM `notes` WHERE `id` = $id";
    $result = mysqli_query($conn,$sql);
}
if(!$result){
    die("query falied".mysqli_error());
}
else{
    header('location:index.php');
}


?>  <?php   $conn->close(); ?>