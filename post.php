<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

<?php
$insert = "false";
$servername = "localhost";
$username = "root";
$password = "";
$database = "inotes";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
  echo "sorry to be failed!!". mysqli_connect_error();
}
// else {
//   echo "success!!";
// }

if (isset($_POST['submit'])){
    $notes = $_POST['title'];
    $des = $_POST['des'];

    

    $sql = "INSERT INTO `notes` ( `note`, `des`) VALUES ('$notes', '$des')";

    $result = mysqli_query($conn,$sql);    


    if($result){
        $insert = true;
        // echo 
        $status = "successfully inserted";
        header("Location:http://localhost/crud/index.php");
        exit;
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else{
        echo "error: $sql <br> $conn->error ";
    }
    // echo $sql;
    $conn->close();
    
}else
{
  echo "<script>alert('Something Went Wrong. Please try again');</script>";
}

    // $btn = $_POST['button'];
    // echo var_dump($btn);

// if($conn->query($sql) == true){
    //     // echo 
//     $insert = true;
//     $status = "successfully inserted";
//     header("Location:http://localhost/crud/index.php");
// }
// else{
//     echo "error: $sql <br> $conn->error ";
// }
// // echo $sql;
// $conn->close();
  
// ?>  <?php   $conn->close(); ?>