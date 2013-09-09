<?php 
require_once '../files/config/config.php';

function get_subCategory($category_id){
	$query = "SELECT idsubcategory, namesubcategory FROM subcategory where idcategory='$category_id'";
	$result = mysql_query($query);
	
	$_options	=	'<option value="0" selected>Select your subcatecory...</option>';
	if(mysql_affected_rows()){
		while($datensatz = mysql_fetch_assoc($result)){
			 $_options	.= '<option value="'.$datensatz['idsubcategory'].'">'.$datensatz['namesubcategory'].'</option>';
		}
	}
	
	return $_options;
}

if(isset($_POST['selected_category'])){
	$category_id	=	$_POST['selected_category'];
	$_options	= get_subCategory($category_id);
	echo $_options;
}







?>