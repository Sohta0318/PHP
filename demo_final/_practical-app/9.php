<?php include "functions.php" ?>
<?php include "includes/header.php" ?>



<section class="content">

  <aside class="col-xs-4">

    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">



    <?php 
print_r($_GET);
	/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it

		Step 2 - Set a cookie that expires in one week

		Step 3 - Start a session and set it to value, any value you want.
	*/
	$name = 'Sohta';
	$button = 'CLICK HERE';

	$expiration = time()+ (60*60*24*7);

	setcookie($name,$button,$expiration);

	if(isset($_COOKIE['Sohta'])){
		echo $_COOKIE['Sohta']. '<br>';
	}else{
		echo 'Something went wrong';
	}

	session_start();
	$_SESSION['Test'] = 'This is the test';

	echo $_SESSION['Test']. '<br>';
	
	?>

    <a href="9.php?name=<?php echo $name;?>"><?php echo $button;?></a>



  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php" ?>