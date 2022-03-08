<?php include "db.php";?>
<?php ;

function createRows(){
  global $connection;
  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
  
  $query = "INSERT INTO users(username,password) ";
  $query.= "VALUES ('$username', '$password')";
  
  $result = mysqli_query($connection, $query);
  
  if(!$result){
    die("QUERY FAILED". mysqli_error($connection));
  }else{
    echo 'Record Created';
  }
  }
}

function showAllData(){
  global $connection;
$query = "SELECT * FROM users";

$result = mysqli_query($connection, $query);

if(!$result){
  die("QUERY FAILED". mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($result)){
  $id = $row['id'];
  echo "<option value='$id'>$id</option>";
}

}
function showAllUsers(){
  global $connection;
$query = "SELECT * FROM users";

$result = mysqli_query($connection, $query);

if(!$result){
  die("QUERY FAILED". mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($result)){
  $username = $row['username'];
  $password = $row['password'];
  echo "<div class='form-group'><label for='username'>Username</label><input id='username' name='username' type='text'
  class='form-control' value='$username'></div>";

  echo " <div class='form-group'><label for='password'>Password</label><input id='password' name='password
  type='password class='form-control' value='$password'></div>";
  
}
}


function updateTable(){
global $connection;
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $id = $_POST['id'];
  $query = "UPDATE users SET ";
  $query .= "username = '$username', ";
  $query .= "password = '$password' ";
  $query .= "WHERE id = '$id' ";

  $result = mysqli_query($connection, $query);

  if(!$result){
    die('QUERY FAILED'.mysqli_error($connection));
  }else{
    echo 'Record Updated';
  }
}
}


function deleteRows(){
  global $connection;
  if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $query = "DELETE FROM users ";
  $query .= "WHERE id = '$id' ";

  $result = mysqli_query($connection, $query);

  if(!$result){
    die('QUERY FAILED'.mysqli_error($connection));
  }else{
    echo 'Record Deleted';
  }
}
}
?>