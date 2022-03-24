<?php 
if(isset($_POST['create_post'])){
  $post_title= ($_POST['title']);
            $post_user         = escape($_POST['post_user']);
            $post_category_id  = $_POST['post_category_id'];
            $post_status       = $_POST['post_status'];
    
            $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
    
    
            $post_tags         = $_POST['post_tags'];
            $post_content      = $_POST['post_content'];
            // $post_comment_count      = 4;
            $post_date         = date('d-m-y');

            move_uploaded_file($post_image_temp,"../images/$post_image");

            $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
            $query .= "VALUES({$post_category_id},'{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', 0, '{$post_status}') "; 

            $add_query=mysqli_query($connection,$query);

            confirmQuery($add_query);

            $post_id = mysqli_insert_id($connection);

            echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id=$post_id'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";
            
}

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" />
  </div>

  <div class="form-group">
    <label for="post_category">Post Category Id</label>
    <select name="post_category_id" id="post_category">

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
    <label for="author">Users</label>
    <select name="post_user" id="author">

      <?php 
      $query = "SELECT * FROM users";
      $select_users = mysqli_query($connection,$query);
      confirmQuery($select_users);
      while($row = mysqli_fetch_assoc($select_users)){
      $user_id = $row['user_id'];
      $username = $row['username'];
      ?>
      <option value="<?php echo $username?>"><?php echo $username?></option>
      <?php
      }
      ?>
    </select>
  </div>

  <!-- <div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name="author" />
  </div> -->

  <div class="form-group">

    <select name="post_status" id="">
      <option value="draft">Post Status</option>
      <option value="published">Published</option>
      <option value="draft">Draft</option>
    </select>
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image" />
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" />
  </div>

  <div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea class="form-control" name="post_content" id="summernote" rows="10" cols="30"></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
  </div>
</form>