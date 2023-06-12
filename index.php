<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "inotes";
$insert = false;
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  echo "sorry to be failed!!" . mysqli_connect_error();
}
// else {
//   echo "success!!";
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $notes = $_POST['title'];
  $des = $_POST['des'];
  $sql = "INSERT INTO `notes` ( `note`, `des`) VALUES ('$notes', '$des')";
  $result = mysqli_query($conn, $sql);
}
// if($result){
//   $insert = true;
// }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
  <title>Crud</title>
</head>

<body>
  <?php include "nav.php" ?>
  <div class="container mt-2">
    <form action="post.php" method="post">
      <div class="mb-3">
        <label for="title" required title="Add note" class="form-label">Add note-</label>
        <input type="text" required class="form-control input" name="title" id="title" aria-describedby="title">
      </div>
      <div class="form-floating">
        <div id="des" class="form-text" title="Add note description" name="des">Add note description-</div>
        <textarea class="form-control input" required placeholder="Leave a comment here" id="des" name="des"></textarea>
        <label for="des"></label>
      </div>

      <button type="submit" class="btn mt-2 mb-2 btn-dark btn-lg btn-block" title="Add note" name="submit">Add note</button>
    </form>

  </div>
  <div class="container">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.no.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM notes";
        $result = mysqli_query($conn, $sql);
        // $rows = mysqli_fetch_array($result);
        // echo '<pre>';
        // print_r($rows);
        // die;
        while ($row = mysqli_fetch_assoc($result)) {
          // echo '<pre>';
          // print_r($row);
          // die;
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['note'] ?></td>
            <td><?= $row['des'] ?></td>
            <td><a class="btn btn-sm btn-dark my-1" title="edit" href="edit_note.php?id=<?php echo $row['id']; ?>&&note=<?php echo $row['note']; ?>&&des=<?php echo $row['des']; ?>">edit</a>
              <a class="btn btn-sm btn-danger my-1" title="delete" href="delete_note.php?id=<?php echo $row['id']; ?>">delete</a>
            </td>
          </tr>

        <?php  }  ?>

      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    let table = new DataTable('#myTable');
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
<?php $conn->close(); ?>