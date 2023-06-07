<?php 

	function totalQty($cart){
		$sum = 0;
		foreach ($cart as $key => $value) {
			$sum += $value['quantity']; 
		}
		return $sum;
	}	
 ?>
	
