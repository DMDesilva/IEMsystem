<?php
session_start();
require 'DB/db.php';
require 'masters/masters.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $type = $_POST['type'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $comment = $_POST['comment'];

    // Insert transaction into database
    $stmt = $pdo->prepare("INSERT INTO transactions (userId, type, amount, date, comment) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $type, $amount, $date, $comment]);


}

$types= new MST_Types($pdo);
$resultTypList = $types->Get_MAST_TYpes();
$trans_category=$types->Get_TransCatgory($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Updated FontAwesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="CSS/index.css">
</head>
<body>

  <!-- Sidebar -->
  <div id="sidebar">
    <button id="sidebarToggle"><i class="fas fa-arrow-left"></i></button>
    <h4 class="p-3">Welcome, <br/> <small><?php echo $_SESSION['username']; ?> </small> </h4>
   
    <ul class="nav flex-column">
      <li class="nav-item"><a href="index.php" class="nav-link">Dashboard</a></li>
      <!-- <li class="nav-item"><a href="#" class="nav-link">Profile</a></li> -->
      <li class="nav-item"><a href="report_gen.php" class="nav-link">Reports</a></li>
      <li class="nav-item"> <a href="logout.php" class="nav-link">Logout</a>  </li>
    </ul>
  </div>

  <!-- Main content -->
  <div id="content">
    <div class="bg-light p-5" style="min-width:80%;">
      <form method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
           <label for="inputEmail4">Transaction Type </label>
           <select name="type" class="form-control" required>
            <option value="0">Select Transaction Type </option>
          <?php foreach ($resultTypList as $type): ?>
                  <option value="<?php echo htmlspecialchars($type['Id']); ?>">
                      <?php echo htmlspecialchars($type['typ_name']); ?>
                  </option>
              <?php endforeach; ?>

          </select>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">In/Ex Catergory</label>
            <div class="form-inline">
            <select name="type" class="form-control" required>
            <option value="0">In/Ex Catergory</option>
          <?php foreach ($trans_category as $cat): ?>
                  <option value="<?php echo htmlspecialchars($cat['Id']); ?>">
                      <?php echo htmlspecialchars($cat['cat_name']); ?>
                  </option>
              <?php endforeach; ?>

          </select>
          <button type="button" class="btn btn-primary btn-sm ml-2 btn-inline" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus"></i>
          </button>
          </div>
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Date</label>
            <input type="date" class="form-control " name="date" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Amount </label>
            <input type="number" class="form-control" name="amount" placeholder="Amount" required>
          </div>
      </div>
      <div class="form-group mb-4">
            <label for="inputEmail4">Remark</label>
            <textarea name="comment" class="form-control " placeholder="Remark"></textarea>
      </div>
      <button type="reset" class="btn btn-success">Reset</button>
      <button type="submit" class="btn btn-primary ml-2 ">Save</button>
        
    </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Catergory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="Js/dashboard.js"></script>
</body>
</html>
