<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>FirstName</th>
      <th>LastName</th>
      <th>Email</th>
      <th>Role</th>

    </tr>
  </thead>
  <tbody>


    <?php 
              $query = 'SELECT * FROM users ';
              $select_all_users = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_all_users)){
$user_id = $row['user_id'];
$user_password = $row['user_password'];
$username = $row['username'];
$user_email = $row['user_email'];
$user_firstname = $row['user_firstname'];
$user_lastname = $row['user_lastname'];
$user_role = $row['user_role'];
$user_image = $row['user_image'];


?>
    <tr>
      <td><?php echo $user_id;?></td>
      <td><?php echo $username;?></td>
      <td><?php echo $user_firstname;?></td>

      <td><?php 

      
    //   $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
    // $select_all_categories_id = mysqli_query($connection,$query);
    // while($row = mysqli_fetch_assoc($select_all_categories_id)){
    // $cat_id = $row['cat_id'];
    // $cat_title = $row['cat_title'];
    // echo $cat_title;
    // }
echo $user_lastname;
      ?></td>
      <td><?php echo $user_email;?></td>

      <?php 
// $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
// $select_post_id_query = mysqli_query($connection, $query);
// confirmQuery($select_post_id_query);
// while($row = mysqli_fetch_assoc($select_post_id_query)){
//   $post_id = $row['post_id'];
//   $post_title = $row['post_title'];
//   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
// }
?>

      <td><?php echo $user_role;?></td>
      <td><a href="users.php?change_to_admin=<?php echo $user_id;?>">Admin</a></td>
      <td><a href="users.php?change_to_subscriber=<?php echo $user_id;?>">Subscriber</a></td>
      <td><a href="users.php?source=edit_user&edit_id=<?php echo $user_id;?>">Edit</a></td>
      <td><a href="users.php?delete=<?php echo $user_id;?>">Delete</a></td>
    </tr>
    <?php
}
              
              ?>


  </tbody>
</table>

<?php 
if(isset($_GET['change_to_admin'])){
  $user_id = $_GET['change_to_admin'];

  $query= "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
  $change_user_role_query = mysqli_query($connection,$query);
  header('Location: users.php');
  
  confirmQuery($change_user_role_query);
}

if(isset($_GET['change_to_subscriber'])){
  $user_id = $_GET['change_to_subscriber'];

  $query= "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
  $change_user_role_query = mysqli_query($connection,$query);
  header('Location: users.php');
  
  confirmQuery($change_user_role_query);
}


if(isset($_GET['delete'])){
  if(isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin'){
  $user_id = $_GET['delete'];

  $query= "DELETE FROM users WHERE user_id = $user_id";
  $delete_query = mysqli_query($connection,$query);
  header('Location: users.php');
  
  confirmQuery($delete_query);
  }
}
?>