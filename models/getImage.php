<?php


$id=addslashes($_GET['id']);
$query="SELECT * FROM `images` WHERE `id`=$id";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
mysqli_close($link);
header("Content-type: image/jpeg");
echo $row['image'];


