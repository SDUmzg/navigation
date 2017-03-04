<?php 
function mysql_insert($insert_word,$dbh){
	 $affected=$dbh->exec($insert_word);
	 $mystuation=($affected==1)?"success":"fail";
	 return $mystuation;
}
function mysql_select($select_word,$dbh){
	$result=$dbh->query($select_word);
	return $result;
}
?>