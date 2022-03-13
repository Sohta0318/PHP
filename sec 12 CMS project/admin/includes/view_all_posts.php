<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
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
      <td><?php echo $post_id;?></td>
      <td><?php echo $post_author;?></td>
      <td><?php echo $post_title;?></td>
      <td><?php echo $post_category_id;?></td>
      <td><?php echo $post_status;?></td>
      <td><img width="100" src="../images/<?php echo $post_image;?>"></td>
      <td><?php echo $post_tags;?></td>
      <td><?php echo $post_comment_count;?></td>
      <td><?php echo $post_date;?></td>
    </tr>
    <?php
}
              
              ?>


  </tbody>
</table>