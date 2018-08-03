<?php
//fetch.php

 $con = mysqli_connect("localhost","root","admin@123","old_shoppe");
 $output = '';
 $sql="select * from product where cid='".$_POST["c_id"]."'";
  $result = mysqli_query($con, $sql);
  $output='<option value=""></option>';
  
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["pid"].'">'.$row["pname"].'</option>';
  }
  echo $output;
  ?>
  
  
