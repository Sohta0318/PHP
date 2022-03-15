<?php 
if(isset($_GET['p_id'])){
  $post_id = $_GET['p_id'];

$query = "SELECT * FROM posts WHERE post_id = $post_id";
  $fetch_post_query=mysqli_query($connection,$query);
  confirmQuery($fetch_post_query);
  while($row = mysqli_fetch_assoc($fetch_post_query)){
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
$post_category_id = $row['post_category_id'];
$post_tags = $row['post_tags'];
$post_content = $row['post_content'];
  }
}

if (isset($_POST['update_post'])){
    
  $post_title = mysqli_real_escape_string($connection, $_POST['post_title']);
$post_author = mysqli_real_escape_string($connection, $_POST['post_author']);
  $post_category_id = $_POST['post_category'];
  $post_status = $_POST['post_status'];
  $post_image = $_FILES['image']['name'];
  $post_image_temp = $_FILES['image']['tmp_name'];
  $post_tags = $_POST['post_tags'];
  $post_content = $_POST['post_content'];
  
 
move_uploaded_file($post_image_temp, "../images/$post_image");
 
 $query = "UPDATE posts SET "; 
 $query .="post_title = '{$post_title}', ";
 $query .="post_category_id = {$post_category_id}, "; 
 $query .="post_date = now(), ";
 $query .="post_author = '{$post_author}', ";
 $query .="post_status = '{$post_status}', ";
 $query .="post_tags = '{$post_tags}', ";
 $query .="post_content = '{$post_content}', ";
 $query .="post_image = '{$post_image}' ";
 $query .="WHERE post_id = {$post_id} ";

 if(empty($post_image)){
  $query2 = "SELECT * FROM posts WHERE post_id = $post_id";
  $select_image = mysqli_query($connection,$query2);
  while($row = mysqli_fetch_assoc($select_image)){
    $post_image = $row['post_image'];
  }
}
 
 $update_post = mysqli_query($connection, $query);

          

          confirmQuery($update_post);

}
?>


<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title" value="<?php echo $post_title?>" />
  </div>

  <div class="form-group">
    <label for="post_category">Post Category Id</label>
    <select name="post_category" id="post_category">

      <?php 
      $query = "SELECT * FROM categories";
      $select_all_categories = mysqli_query($connection,$query);
      confirmQuery($select_all_categories);
      while($row = mysqli_fetch_assoc($select_all_categories)){
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
      ?>
      <option value="<?php echo $cat_id?>"><?php echo $cat_title?></option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>" />
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="post_status" value="<?php echo $post_status?>" />
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <img src="../images/<?php echo $post_image?>" width="100">
    <input type="file" name="image" />
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags?>" />
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea class="form-control" name="post_content" id="" rows="10" cols="30"><?php echo $post_content?></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
  </div>
</form>