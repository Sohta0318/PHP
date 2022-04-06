<?php 

function redirect($location){
  return header("Location: $location");
}

function escape($string){
  global $connection;
  mysqli_real_escape_string($connection, trim($string));
}


function users_online(){

  if(isset($_GET['onlineusers'])){
    
  
  global $connection;

  if(!$connection){
    session_start();
    include '../includes/db.php';
  
  $session = session_id();
$time = time();
$time_out_in_seconds=60;
$time_out=$time -$time_out_in_seconds;

$query="SELECT * FROM users_online WHERE session = '$session'";
$send_query = mysqli_query($connection,$query);
$count = mysqli_num_rows($send_query);

if($count==NULL){
  mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', $time) ");
}else{
  mysqli_query($connection, "UPDATE users_online SET time = $time WHERE session = '$session'" );
}

$users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > $time_out" );

echo $count_user = mysqli_num_rows($users_online_query);
  }
  } //get request isset()
}

users_online();


function confirmQuery($query){
  global $connection;
  if(!$query){
    die('QUERY FAILED'. mysqli_error($connection));
  }
}

function insertCategories() {
  global $connection;
  if(isset($_POST['submit'])){
      $cat_title = $_POST['cat_title'];
      if(strlen($cat_title)==0 ||empty($cat_title)){
        echo "This field should not be empty";
      }else{
        $stmt = mysqli_prepare($connection,"INSERT INTO categories(cat_title) VALUES (?) ");
  
        mysqli_stmt_bind_param($stmt, 's', $cat_title);
        mysqli_stmt_execute($stmt);
        // $create_category_query = mysqli_query($connection, $query);
        
  
        if(!$stmt){
          die('QUERY FAILED'.mysqli_error($connection));
        }
      }
      mysqli_stmt_close($stmt);
    }
}

function findAllCategories(){
  global $connection;
  $query = 'SELECT * FROM categories ';
                $select_all_categories = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_all_categories)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
  ?>
<tr>
  <td><?php echo $cat_id; ?></td>
  <td><?php echo $cat_title; ?></td>
  <td><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
  <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></td>
</tr>

<!-- // echo "<tr>";
  // echo "<td>{$cat_id}</td>";
  // echo "<td>{$cat_title}</td>";
  // echo "</tr>"; -->
<?php
                }

}

function deleteCategories(){
  global $connection;
  if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";

    $delete_query= mysqli_query($connection,$query);
    
    if(!$delete_query){
      die('QUERY FAILED'.mysqli_error($connection));
    }else{
      header("Location: categories.php");
    }
  }
}

function recordCount($table){
  global $connection;
  $query = "SELECT * FROM $table";
  $select_all_comments = mysqli_query($connection,$query);
  return mysqli_num_rows($select_all_comments);
}

function checkStatus($table, $column,$status){
  global $connection;
  $query = "SELECT * FROM $table WHERE $column = '$status'";
      $result = mysqli_query($connection,$query);
       return mysqli_num_rows($result);
  
}


function is_admin($username){
  global $connection;
  $query = "SELECT user_role FROM users WHERE username = '$username'";

  $result = mysqli_query($connection,$query);
  confirmQuery($result);

  $row = mysqli_fetch_assoc($result);
  if($row['user_role'] == 'admin'){
    return true;
  }else{
    return false;
  }
}


function username_exists($username){
  global $connection;
  $query = "SELECT username FROM users WHERE username = '$username'";
  $result = mysqli_query($connection,$query);
  confirmQuery($result);

  
  if(mysqli_num_rows($result) >0){
    return true;
  }else{
    return false;
  }
}


function email_exists($email){
  global $connection;
  $query = "SELECT user_email FROM users WHERE user_email = '$email'";
  $result = mysqli_query($connection,$query);
  confirmQuery($result);

  
  if(mysqli_num_rows($result) >0){
    return true;
  }else{
    return false;
  }
}

function register_user($username,$email,$password){
  global $connection;


      $password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));

    //  $query = "SELECT randSalt FROM users";
    //  $select_randSalt_query = mysqli_query($connection,$query);
    //  confirmQuery($select_randSalt_query);

    //  $row = mysqli_fetch_array($select_randSalt_query);
    //      $salt = $row['randSalt'];

    //      $password = crypt($password,$salt);

         $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
         $query .= "VALUES ('$username', '$email', '$password', 'subscriber')";

         $register_user_query = mysqli_query($connection,$query);
         confirmQuery($register_user_query);

         $message = "Registration successfully has been submitted";
     

}

function login_user($username,$password){
  global $connection;
  
  $username = mysqli_real_escape_string($connection,$username);
  $password = mysqli_real_escape_string($connection,$password);


  $query = "SELECT * FROM users WHERE username = '$username' ";

  $select_user_query = mysqli_query($connection,$query);
  confirmQuery($select_user_query);

  while($row = mysqli_fetch_assoc($select_user_query)){
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
  }

  // $password = crypt($password,$db_user_password);
  
  if(password_verify($password, $db_user_password)){
    $_SESSION['username'] = $db_username;
    $_SESSION['user_firstname'] = $db_user_firstname;
    $_SESSION['user_lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;

    redirect('/sec 12 CMS project/admin');
    
  }else{
    redirect('/sec 12 CMS project/index.php');
  }
}

?>