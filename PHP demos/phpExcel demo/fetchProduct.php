<?php
$domObj=  new DOMDocument();
$domObj->load('C:\Program Files\wamp\www\trial\products.xml');
$xpath = new DOMXPath($domObj);

if(isset($_POST['cat'])){
$cat= urldecode($_POST['cat']);
$cat = str_replace("&","&amp;", $cat);
		
	$cnt=0;
	$result=$xpath->query('/items/item[category="'. $cat .'"]');
						
	foreach ($result as $entry) {
		if($cnt==5){ break;}
		
		$image_array = $entry->getElementsByTagName('image');
		$image = $image_array->item(0)->nodeValue;
		
		$name_array = $entry->getElementsByTagName('nameEN');
		$title = $name_array->item(0)->nodeValue;
		
		$price_array = $entry->getElementsByTagName('price');
		$price = $price_array->item(0)->nodeValue;
		
		$data='<div class="product-holder">
					<div class="product">
						<a href="#"><img src="'. $image .'" /></a>
						<p class="product-title"><a href="#">'. $title .' </a></p>
						<p class="product-price">'. $price.'</p>
						<p class="product-stock">In Stock<br /> Save $10 on any Graco Stroller or Travel System</p>
					</div>
				</div>';
		echo $data;
		$cnt++;
	}
}
elseif(isset($_POST['name'])){
	$name= urldecode($_POST['name']);
	
	$nameEN = $domObj->getElementsByTagName('nameEN');
	$name_array = array();
	$key = array();
	$key_unique_array=array();
	
	foreach ($nameEN as $prod_name) {
		$name_array[]=$prod_name->nodeValue;
	}
	
	$pattern = '/.'.$name.'.|'.$name.'.|.'.$name.'|'.$name.'/';
	$pName = preg_grep($pattern,$name_array);
	$pName_unique_array = array_keys(array_count_values($pName));
	$cnt=0;
	
	for($i=0;$i<5;$i++){
		$item= $pName_unique_array[$i];
		$result=$xpath->query('/items/item[nameEN="'. $item .'"]');
		//if ($result->length > 0) {	
		foreach ($result as $entry) {
		if($cnt==5){ break;}
		    $image_array = $entry->getElementsByTagName('image');
			$image = $image_array->item(0)->nodeValue;
	
			$name_array1 = $entry->getElementsByTagName('nameEN');
			$title = $name_array1->item(0)->nodeValue;
		
			$price_array = $entry->getElementsByTagName('price');
			$price = $price_array->item(0)->nodeValue;
		
			$data='<div class="product-holder">
					<div class="product">
						<a href="#"><img src="'. $image .'" /></a>
						<p class="product-title"><a href="#">'. $title .' </a></p>
						<p class="product-price">'. $price.'</p>
						<p class="product-stock">In Stock<br /> Save $10 on any Graco Stroller or Travel System</p>
					</div>
				</div>';
			echo $data;
			$cnt++;
		}
		//}
	//else{ 
		//$data='<h2>No Records Found</h2>';
		//echo $data;
	//}
	}
}
elseif(isset($_POST['brand'])){
	$brand=$_POST['brand'];
	$result=$xpath->query('/items/item[brand="'. $brand .'"]');
			
	foreach ($result as $entry) {
		if($cnt==5){ break;}
		
		$image_array = $entry->getElementsByTagName('image');
		$image = $image_array->item(0)->nodeValue;
		
		$name_array = $entry->getElementsByTagName('nameEN');
		$title = $name_array->item(0)->nodeValue;
		
		$price_array = $entry->getElementsByTagName('price');
		$price = $price_array->item(0)->nodeValue;
		
		$data='<div class="product-holder">
					<div class="product">
						<a href="#"><img src="'. $image .'" /></a>
						<p class="product-title"><a href="#">'. $title .' </a></p>
						<p class="product-price">'. $price.'</p>
						<p class="product-stock">In Stock<br /> Save $10 on any Graco Stroller or Travel System</p>
					</div>
				</div>';
		echo $data;
		$cnt++;
	}
	//}
	//else{ 
	//	$data='<h2>No Records Found</h2>';
	//	echo $data;
	//}
	
		
}

?>
