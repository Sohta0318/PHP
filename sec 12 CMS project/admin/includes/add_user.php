<?php 
if(isset($_POST['create_user'])){
  $user_firstname = mysqli_real_escape_string($connection,$_POST['user_firstname']);
  $user_lastname = mysqli_real_escape_string($connection,$_POST['user_lastname']);
  $user_role = $_POST['user_role'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  // move_uploaded_file($post_image_temp,"./image/$post_image");

  $query = "SELECT randSalt FROM users";
     $select_randSalt_query = mysqli_query($connection,$query);
     confirmQuery($select_randSalt_query);

     $row = mysqli_fetch_array($select_randSalt_query);
         $salt = $row['randSalt'];

         $user_password = crypt($user_password,$salt);

            $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
            $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') "; 

            $add_query=mysqli_query($connection,$query);

            confirmQuery($add_query);
            
            echo "User Created: ". "". "<a href='users.php'>View Users</a>";
            
}

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Fist Name</label>
    <input type="text" class="form-control" name="user_firstname" />
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" />
  </div>

  <div class="form-group">
    <label for="post_category">Role</label>
    <select name="user_role" id="post_category">
      <option value="subscriber">Select Options</option>
      <option value="admin">Admin</option>
      <option value="subscriber">Subscriber</option>
    </select>
  </div>

  <!-- <div class="form-group">
    <label for="title">User Image</label>
    <input type="file" class="form-control" name="user_image" />
  </div> -->

  <div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" name="username" />
  </div>

  <div class="form-group">
    <label for="post_image">Email</label>
    <input type="text" name="user_email" />
  </div>

  <div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" class="form-control" name="user_password" />
  </div>


  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
  </div>
</form>