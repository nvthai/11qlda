<?php
$file_name=$_FILES['upload']['name'];
$extent_file="gif|jpg|png|docx";
$pattern='#.+\.(gif|jpg|png|docx)$#i';
if(preg_match($pattern,$file_name)==1){
	$file_type=true;
}else{
	$file_type=false;
}
if($file_type==true){
	$source=$_FILES['upload']['tmp_name'];
	$dest='images/'.$_FILES['upload']['name'];
	if(copy($source,$dest)==true){
	$flag=true;
	echo 'Upload thành công';
	}else{
	$flag=false;
	echo 'Upload thất bại';
	}
}
?>