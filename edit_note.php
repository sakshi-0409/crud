<?php include "nav.php"; ?>
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<style>
  body{
    margin: 0;
    padding: 0;
    background: url("images/bg.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 80%;
}
</style>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "iNotes";
$insert = false;
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo "sorry to be failed!!" . mysqli_connect_error();
} 
$id = $_REQUEST["id"];
$notes = $_REQUEST["note"];
$des = $_REQUEST["des"];

if (isset($_POST["submit"])) {
    $id = $_REQUEST["id"];
    $notes = $_REQUEST["note"];
    $des = $_REQUEST["des"];
    $sql = "UPDATE `notes` SET `id` = '$id', `note` = '$notes', `des` = '$des' WHERE `id` = '$id';";

    $result = mysqli_query($conn, $sql);
    if($result) {
      header('location: index.php');
    }
}
?>
<div class="container mt-2">
  <form action="edit_note.php" method="post">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
        <div class="mb-3">
          <label for="title"  required title="Edit note" class="form-label">Edit note-</label>
          <input type="hidden" name="id" value="<?= $id ?>">
          <input type="text" required class="form-control input" name="note" id="title" value ="<?php echo $notes; ?>" aria-describedby="title">
        </div>
        <div class="form-floating">
          <div id="des" class="form-text" title="Edit note description" name="des">Edit note description-</div>
            <textarea class="form-control input" required placeholder="Leave a comment here" id="des" name="des"><?php echo $des; ?></textarea>
            <label for="des"></label>
          </div>

          <button type="submit" class="btn mt-2 mb-2 btn-dark btn-lg btn-block" title="Update" name="submit">Update</button>
      </form>

      <?php   $conn->close(); ?>

