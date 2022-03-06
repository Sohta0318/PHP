<?php include "functions.php" ?>
<?php include "includes/header.php" ?>
<section class="content">

  <aside class="col-xs-4">
    <?php Navigation();?>


  </aside>
  <!--SIDEBAR-->


  <article class="main-content col-xs-8">


    <?php 

echo pow(1,6);
echo '<br>';
echo ceil(4.3);
echo '<br>';
echo round(4.5);
echo '<br>';
echo floor(4.5);
echo '<br>';
echo rand(1,100);
echo '<br>';

$string = 'This is the test';
echo strlen($string);
echo '<br>';
echo strtoupper($string);
echo '<br>';
echo strtolower($string);
echo '<br>';

$test_array = [32,1234,535,532,134];
echo max($test_array);
echo '<br>';
echo min($test_array);
echo '<br>';
sort($test_array);
print_r($test_array);
echo '<br>';
$isCheck = in_array(32,$test_array);
if($isCheck){
	echo 'We found one';
}else{
	echo 'We could not found one';
}




/*  Step1: Use a pre-built math function here and echo it


	Step 2:  Use a pre-built string function here and echo it


	Step 3:  Use a pre-built Array function here and echo it

 */

	
?>





  </article>
  <!--MAIN CONTENT-->
  <?php include "includes/footer.php" ?>