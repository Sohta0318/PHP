<?php 
if(isset($_POST['checkBoxArray'])){
  foreach ($_POST['checkBoxArray'] as $key => $value) {
   $bulk_options = $_POST['bulk_options'];

   switch ($bulk_options) {
     case 'published':
       $query = "UPDATE posts SET post_status = 'published' WHERE post_id = $value";
       $update_to_publish = mysqli_query($connection,$query);
       confirmQuery($update_to_publish);
       break;
     case 'draft':
      $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $value";
      $update_to_draft = mysqli_query($connection,$query);
      confirmQuery($update_to_draft);
       break;
     case 'delete':
      $query = "DELETE FROM posts WHERE post_id = $value";
      $delete_post = mysqli_query($connection,$query);
      confirmQuery($delete_post);
       break;
     
     default:
       # code...
       break;
   }
  }
}

?>

<form action="" method='post'>
  <table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4"><select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
        <option value="delete">Delete</option>
      </select></div>
    <div class="col-xs-4"><input type="submit" value="Apply" name="submit" class="btn btn-success"
        style="margin-right: 6px;"><a href="posts.php?source=add_post" class="btn btn-primary">Add New</a></div>
    <thead>
      <tr>
        <th><input type="checkbox" name="" id="selectAllBoxes"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
        <th>View Post</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>


      <?php 
              $query = 'SELECT * FROM posts ';
              $select_all_posts = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_all_posts)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
$post_category_id = $row['post_category_id'];
$post_tags = $row['post_tags'];
?>
      <tr>
        <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id;?>"></td>
        <td><?php echo $post_id;?></td>
        <td><?php echo $post_author;?></td>
        <td><?php echo $post_title;?></td>

        <td><?php 

      
      $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
    $select_all_categories_id = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_all_categories_id)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo $cat_title;
    }
      ?></td>
        <td><?php echo $post_status;?></td>
        <td><img width="100" src="../images/<?php echo $post_image;?>"></td>
        <td><?php echo $post_tags;?></td>
        <td><?php echo $post_comment_count;?></td>
        <td><?php echo $post_date;?></td>
        <td><a href="../post.php?p_id=<?php echo $post_id;?>">View Post</a></td>
        <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id;?>">Edit</a></td>
        <td><a onclick="javascript: return confirm('Are you sure?')"
            href="posts.php?delete=<?php echo $post_id;?>">Delete</a></td>
      </tr>
      <?php
}
              
              ?>


    </tbody>
  </table>

  <?php 
if(isset($_GET['delete'])){
  $post_id = $_GET['delete'];

  $query= "DELETE FROM posts WHERE post_id = $post_id";
  $delete_query = mysqli_query($connection,$query);
  header('Location: posts.php');
  
  confirmQuery($delete_query);
}
?>
</form>