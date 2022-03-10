<?php include "functions.php" ?>
<?php include "includes/header.php" ?>

<section class="content">

  <aside class="col-xs-4">

    <?php Navigation();?>

  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">

    <?php  

if(false){
	echo 'It is not right';
}elseif(false){
	echo 'It is not right';
}else{
	echo 'I love PHP';
}

for ($num = 0; $num <10; $num++){
	echo $num. '<br>';
}

$test = 3;
switch($test){
	case 4:
		echo 'it is four';
		break;
	case 5:
		echo 'it is five';
		break;
	case 3:
		echo 'it is three';
		break;
	case 2:
		echo 'it is two';
		break;
		default:
		echo 'it is default';
}
/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */

	
?>






  </article>
  <!--MAIN CONTENT-->

  <?php include "includes/footer.php" ?>