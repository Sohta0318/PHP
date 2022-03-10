<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

<section class="content">

  <aside class="col-xs-4">

    <?php Navigation();?>

  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php  

if(isset($_POST['submit'])){
	// echo 'SUBMIT';
	echo $_POST['test'];
}
/*  Step1: Make a form that submits one value to POST super global


 */

	
?>
    <form action="6.php" method="post">
      <input type="text" name="test" placeholder="Type anything">
      <input type="submit" name="submit">
    </form>


  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php" ?>