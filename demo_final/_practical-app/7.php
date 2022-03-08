<?php include "functions.php" ?>
<?php include "includes/header.php" ?>


<section class="content">

  <aside class="col-xs-4">

    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php  
    $connection =mysqli_connect('localhost','root','','assignment7');
		if(!$connection){
			echo 'Connect failed';
		}

		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = 'INSERT INTO test (username, password) ';
			$query .= "VALUES ('$username', $password)";

			

			$result = mysqli_query($connection,$query);
			
			
			if($result){
				echo 'Successfully submitted!';
			}else{
				die('Something went wrong '. mysqli_error($connection));
			}
		}
		$read = "SELECT * FROM test";
		$result2 = mysqli_query($connection,$read);


	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/
	
	?>
    <form action="7.php" method="post">
      <label for="username">
        <input type="text" name="username" id="username">
      </label>
      <label for="password">
        <input type="password" name="password" id="password">
      </label>
      <input type="submit" value="Submit" name="submit">
    </form>

    <?php 
		global $result2;
		while($row = mysqli_fetch_assoc($result2)){
			foreach ($row as $key => $value) {
			echo "<p>$key: $value</p>";
		}
		}
		?>




  </article>
  <!--MAIN CONTENT-->

  <?php include "includes/footer.php" ?>