<?php 
//gets the text between two specific words
 function between($src,$start,$end){
    $txt=explode($start,$src);
    $txt2=explode($end,$txt[1]);
    return trim($txt2[0]);
  }

?>