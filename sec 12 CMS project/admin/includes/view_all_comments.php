<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response To</th>
      <th>Date</th>
      <th>Approved</th>
      <th>Unapproved</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>


    <?php 
              $query = 'SELECT * FROM comments ';
              $select_all_comments = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_all_comments)){
$comment_id = $row['comment_id'];
$comment_post_id = $row['comment_post_id'];
$comment_author = $row['comment_author'];
$comment_email = $row['comment_email'];
$comment_status = $row['comment_status'];
$comment_content = $row['comment_content'];
$comment_date = $row['comment_date'];

?>
    <tr>
      <td><?php echo $comment_id;?></td>
      <td><?php echo $comment_author;?></td>
      <td><?php echo $comment_content;?></td>

      <td><?php 

      
    //   $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
    // $select_all_categories_id = mysqli_query($connection,$query);
    // while($row = mysqli_fetch_assoc($select_all_categories_id)){
    // $cat_id = $row['cat_id'];
    // $cat_title = $row['cat_title'];
    // echo $cat_title;
    // }
echo $comment_email;
      ?></td>
      <td><?php echo $comment_status;?></td>

      <?php 
$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
$select_post_id_query = mysqli_query($connection, $query);
confirmQuery($select_post_id_query);
while($row = mysqli_fetch_assoc($select_post_id_query)){
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
}
?>

      <td><?php echo $comment_date;?></td>

      <td><a href="comments.php?approved=<?php echo $comment_id?>">Approved</a></td>
      <td><a href="comments.php?unapproved=<?php echo $comment_id?>">Unapproved</a></td>
      <td><a href="comments.php?delete=<?php echo $comment_id?>">Delete</a></td>
    </tr>
    <?php
}
              
              ?>


  </tbody>
</table>

<?php 
if(isset($_GET['approved'])){
  $comment_id = $_GET['approved'];

  $query= "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
  $approved_comment_query = mysqli_query($connection,$query);
  header('Location: comments.php');
  
  confirmQuery($delete_query);
}

if(isset($_GET['unapproved'])){
  $comment_id = $_GET['unapproved'];

  $query= "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
  $unapproved_comment_query = mysqli_query($connection,$query);
  header('Location: comments.php');
  
  confirmQuery($delete_query);
}


if(isset($_GET['delete'])){
  $comment_id = $_GET['delete'];

  $query= "DELETE FROM comments WHERE comment_id = $comment_id";
  $delete_query = mysqli_query($connection,$query);
  header('Location: comments.php');
  
  confirmQuery($delete_query);
}
?>