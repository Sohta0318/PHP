<?php 
if(isset($_GET['edit_id'])){
  $user_id = $_GET['edit_id'];
  $query = "SELECT * FROM users WHERE user_id = $user_id";
  $select_user_query = mysqli_query($connection,$query);
  confirmQuery($select_user_query);
  while($row = mysqli_fetch_assoc($select_user_query)){
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
  }
}


if(isset($_POST['edit_user'])){
  $user_firstname = mysqli_real_escape_string($connection,$_POST['user_firstname']);
  $user_lastname = mysqli_real_escape_string($connection,$_POST['user_lastname']);
  $user_role = $_POST['user_role'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  // move_uploaded_file($post_image_temp,"./image/$post_image");

  $query = "UPDATE users SET "; 
  $query .="user_firstname = '{$user_firstname}', ";
  $query .="user_lastname = '{$user_lastname}', "; 
  $query .="user_role = '{$user_role}', ";
  $query .="username = '{$username}', ";
  $query .="user_email = '{$user_email}', ";
  $query .="user_password = '{$user_password}' ";
  $query .="WHERE user_id = {$user_id} ";

            $edit_query=mysqli_query($connection,$query);

            confirmQuery($edit_query);
            
}

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Fist Name</label>
    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>" />
  </div>

  <div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>" />
  </div>

  <div class="form-group">
    <label for="post_category">Role</label>
    <select name="user_role" id="post_category">
      <option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>

      <?php 
      if($user_role === 'admin'){
        echo "<option value='subscriber'>subscriber</option>";
      }else{
        echo "<option value='admin'>admin</option>";
      }
      ?>
    </select>
  </div>

  <!-- <div class="form-group">
    <label for="title">User Image</label>
    <input type="file" class="form-control" name="user_image" />
  </div> -->

  <div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $username;?>" />
  </div>

  <div class="form-group">
    <label for="post_image">Email</label>
    <input type="text" name="user_email" value="<?php echo $user_email;?>" />
  </div>

  <div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>" />
  </div>


  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
  </div>
</form>