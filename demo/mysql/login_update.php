<?php include "db.php"; ?>

<?php include "functions.php"; ?>

<?php 
if(isset($_POST['submit'])){
  updateTable();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="col-sm-6">
      <form action="login_update.php" method="post">
        <div class="form-group"><label for="username">Username</label><input id="username" name="username" type="text"
            class="form-control"></div>
        <div class="form-group"><label for="password">Password</label><input id="password" name="password"
            type="password" class="form-control"></div>
        <div class="form-group"><select name="id" id="">
            <?php 
          showAllData();
          ?>
          </select></div>
        <input type="submit" name="submit" value="Update" class="btn btn-primary">
      </form>
    </div>
  </div>
</body>

</html>