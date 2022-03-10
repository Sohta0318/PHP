<?php 
$file = 'example.txt';

if($handle = fopen($file,'w')){
fwrite($handle, 'I love PHP This is great');

  fclose($handle);
}else{
echo 'The file could not be written';
}



?>