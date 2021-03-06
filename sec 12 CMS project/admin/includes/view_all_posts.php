<?php 
include "delete_modal.php";


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
     case 'clone':
      $query = "SELECT * FROM posts WHERE post_id = $value";
      $clone_post = mysqli_query($connection,$query);
      while($row=mysqli_fetch_assoc($clone_post)){
        $post_title=$row['post_title'];
        $post_date=$row['post_date'];
        $post_category_id=$row['post_category_id'];
        $post_author=$row['post_author'];
        $post_user=$row['post_user'];
        $post_status=$row['post_status'];
        $post_image=$row['post_image'];
        $post_tags=$row['post_tags'];
        $post_content=$row['post_content'];

        if(empty($post_tags)){
          $post_tags = 'No tags';
        }
      }

      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_user, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
            $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}', 0, '{$post_status}') "; 
            $create_clone_post = mysqli_query($connection,$query);
      confirmQuery($create_clone_post);
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
        <option value="clone">Clone</option>
      </select></div>
    <div class="col-xs-4"><input type="submit" value="Apply" name="submit" class="btn btn-success"
        style="margin-right: 6px;"><a href="posts.php?source=add_post" class="btn btn-primary">Add New</a></div>
    <thead>
      <tr>
        <th><input type="checkbox" name="" id="selectAllBoxes"></th>
        <th>Id</th>
        <th>Users</th>
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
        <th>View Count</th>
      </tr>
    </thead>
    <tbody>


      <?php 
              // $query = 'SELECT * FROM posts ORDER BY post_id DESC';
              
              $query = 'SELECT posts.post_id, posts.post_author,posts.post_user, posts.post_title,posts.post_category_id, posts.post_status,posts.post_image, ';
              $query .= 'posts.post_tags, posts.post_comment_count,posts.post_date, posts.post_views_count, categories.cat_id, categories.cat_title ';
            $query .='FROM posts ';
            $query .='LEFT JOIN categories ON posts.post_category_id = categories.cat_id ORDER BY posts.post_id DESC';

              $select_all_posts = mysqli_query($connection,$query);
              confirmQuery($select_all_posts);
while($row = mysqli_fetch_assoc($select_all_posts)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_user = $row['post_user'];
$post_title = $row['post_title'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
$post_category_id = $row['post_category_id'];
$post_tags = $row['post_tags'];
$post_views_count = $row['post_views_count'];
$category_title = $row['cat_title'];
$category_id = $row['cat_id'];
?>
      <tr>
        <td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $post_id;?>"></td>
        <td><?php echo $post_id;?></td>


        <?php 

if(isset($post_author) || !empty($post_author)){
  echo "<td>$post_author</td>";
}elseif(isset($post_user) || !empty($post_user)){
  echo "<td>$post_user</td>";
}
?>

        <td><?php echo $post_title;?></td>

        <td><?php 

      
    //   $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
    // $select_all_categories_id = mysqli_query($connection,$query);
    // while($row = mysqli_fetch_assoc($select_all_categories_id)){
    // $cat_id = $row['cat_id'];
    // $cat_title = $row['cat_title'];
    echo $category_title;
    // }
      ?></td>
        <td><?php echo $post_status;?></td>
        <td><img width="100" src="../images/<?php echo $post_image;?>"></td>
        <td><?php echo $post_tags;?></td>

        <?php 
$query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
$send_comment_query = mysqli_query($connection,$query);


$row = mysqli_fetch_array($send_comment_query);
if(!empty($row)){
  $comment_id = $row['comment_id'];
  } 
  $count_comments = mysqli_num_rows($send_comment_query);



?>

        <td><a href="post_comments.php?id=<?php echo $post_id;?>"><?php echo $count_comments;?></a></td>



        <td><?php echo $post_date;?></td>
        <td><a href="../post.php?p_id=<?php echo $post_id;?>" class="btn btn-primary">View Post</a></td>
        <td><a href=" posts.php?source=edit_post&p_id=<?php echo $post_id;?>" class="btn btn-success">Edit</a></td>
        <!-- <td><a onclick="javascript: return confirm('Are you sure?')"
            href="posts.php?delete=<?php //echo $post_id;?>">Delete</a></td> -->

        <form action="post"><input type="hidden" value="<?php echo $post_id;?>" name="post_id">
          <td><input type="submit" name="delete" value="Delete" class="btn btn-danger"></td>
        </form>



        <!-- <td><a rel="<?php //echo $post_id;?>" href="javascript:void(0)" class="delete_link">Delete</a></td> -->


        <td><a href="posts.php?reset=<?php echo $post_id;?>"><?php echo $post_views_count;?></a></td>
      </tr>
      <?php
}
              
              ?>


    </tbody>
  </table>

  <?php 
// if(isset($_GET['delete'])){
if(isset($_POST['delete'])){
  // $post_id = $_GET['delete'];
  $post_id = $_POST['post_id'];

  $query= "DELETE FROM posts WHERE post_id = $post_id";
  $delete_query = mysqli_query($connection,$query);
  header('Location: posts.php');
  
  confirmQuery($delete_query);
}
?>

  <?php 
if(isset($_GET['reset'])){
  $post_id = $_GET['reset'];

  $query= "UPDATE posts SET post_views_count = 0 WHERE post_id = $post_id";
  $reset_query = mysqli_query($connection,$query);
  header('Location: posts.php');
  
  confirmQuery($reset_query);
}
?>
</form>