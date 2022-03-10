<?php 

class Car{
  function moveWheels(){
    echo 'Wheels move';
  }
}

if(method_exists('Car', 'moveWheels')){

  echo 'The method exist';
  
}else{
  echo 'No it does not';
}
?>