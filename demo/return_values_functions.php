<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  function addNumbers($num1,$num2){
$sum = $num1+$num2;
return $sum;
    
  }

  $result = addNumbers(12,34);
  echo $result;
  echo '<br>';
  $result = addNumbers(12,$result);
  echo $result
  
  ?>
</body>

</html>