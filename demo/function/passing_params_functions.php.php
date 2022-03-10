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
function greeting($message){
  echo $message;
}

greeting('Hello Student');

function addNumber($num1, $num2){
  $sum= $num1 + $num2;

  echo '<h1>'.$sum. '</h1>';
}

addNumber(345,48);

?>
</body>

</html>