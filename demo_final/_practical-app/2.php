<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

<section class="content">

  <aside class="col-xs-4">

    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">



    <?php

		$num1 = 10;
		$num2 = 20;
		echo $num1 + $num2. '<br>';

		$list = array(23,24);
		$list_associative = array('num'=>22);

		echo $list[1].'<br>';
		echo $list_associative['num'].'<br>';

		/* Step 1: Make 2 variables called number1 and number2 and set 1 to value 10 and the other 20:

		  Step 2: Add the two variables and display the sum with echo:


		  Step3: Make 2 Arrays with the same values, one regular and the other associative

		  Step4: Make a constant and set it to the value of PHP. and use an echo to print it out


			

			 */

		


		?>



  </article>
  <!--MAIN CONTENT-->

  <?php include "includes/footer.php" ?>