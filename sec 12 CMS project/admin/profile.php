<?php include 'includes/admin_header.php';?>
<?php 
if(isset($_SESSION['username'])){
  $username =$_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $select_user_profile_query = mysqli_query($connection, $query);
    confirmQuery($select_user_profile_query);
    while($row = mysqli_fetch_assoc($select_user_profile_query)){
      $user_id = $row['user_id'];
$user_password = $row['user_password'];
$username = $row['username'];
$user_email = $row['user_email'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
// $user_role = $row['user_role'];

    }
}

?>


<?php 
if(isset($_POST['edit_user'])){
  $user_firstname = mysqli_real_escape_string($connection,$_POST['user_firstname']);
  $user_lastname = mysqli_real_escape_string($connection,$_POST['user_lastname']);
  // $user_role = $_POST['user_role'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  // move_uploaded_file($post_image_temp,"./image/$post_image");

  $query = "UPDATE users SET "; 
  $query .="user_firstname = '{$user_firstname}', ";
  $query .="user_lastname = '{$user_lastname}', "; 
  // $query .="user_role = '{$user_role}', ";
  $query .="username = '{$username}', ";
  $query .="user_email = '{$user_email}', ";
  $query .="user_password = '{$user_password}' ";
  $query .="WHERE username = '{$username}' ";

            $edit_query=mysqli_query($connection,$query);

            confirmQuery($edit_query);
            
}

?>
<div id="wrapper">

  <!-- Navigation -->
  <?php include 'includes/admin_navigation.php';?>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to admin
            <small>Author</small>
          </h1>

          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Fist Name</label>
              <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname;?>" />
            </div>

            <div class="form-group">
              <label for="title">Last Name</label>
              <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname;?>" />
            </div>

            <!-- <div class="form-group">
              <label for="post_category">Role</label>
              <select name="user_role" id="post_category">
                <option value="<?php //echo $user_role;?>"><?php //echo $user_role;?></option>

                <?php 
      // if($user_role === 'admin'){
      //   echo "<option value='subscriber'>subscriber</option>";
      // }else{
      //   echo "<option value='admin'>admin</option>";
      // }
      ?>
              </select>
            </div> -->

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
              <input type="password" class="form-control" name="user_password" autocomplete="off" />
            </div>


            <div class="form-group">
              <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
            </div>
          </form>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

  <?php include 'includes/admin_footer.php'; ?>