<?php 
	$a = false;
	foreach($teks as $t){
		if($t=='') continue;
		if($a==false){
			echo '<div class=kiri>'.$t.'<br></div>';
			$a=true;
		} else {
			echo '<div class=kanan>'.$t.'<br></div>';
			$a=false;
		}
	}
?>
