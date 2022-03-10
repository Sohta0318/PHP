<?php include "db.php"; ?>

<?php include "functions.php"; ?>

<?php 

  deleteRows();


?>

<?php include 'includes/header.php';?>

<div class="container">
  <div class="col-sm-6">
    <h1 class="text-center">DELETE</h1>
    <form action="login_delete.php" method="post">
      <?php showAllUsers(); ?>

      <div class="form-group"><select name="id" id="">
          <?php 
          showAllData();
          ?>
        </select></div>
      <input type="submit" name="submit" value="Delete" class="btn btn-primary">
    </form>
  </div>
</div>
<?php include 'includes/footer.php';?>