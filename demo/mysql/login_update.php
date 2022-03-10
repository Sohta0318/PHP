<?php include "db.php"; ?>

<?php include "functions.php"; ?>

<?php 
if(isset($_POST['submit'])){
  updateTable();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/header.php';?>

<div class="container">
  <div class="col-sm-6">
    <h1 class="text-center">UPDATE</h1>
    <form action="login_update.php" method="post">
      <div class="form-group"><label for="username">Username</label><input id="username" name="username" type="text"
          class="form-control"></div>
      <div class="form-group"><label for="password">Password</label><input id="password" name="password" type="password"
          class="form-control"></div>
      <div class="form-group"><select name="id" id="">
          <?php 
          showAllData();
          ?>
        </select></div>
      <input type="submit" name="submit" value="Update" class="btn btn-primary">
    </form>
  </div>
</div>
<?php include 'includes/footer.php';?>