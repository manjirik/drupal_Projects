<HTML>
<head>
<link rel="stylesheet" type="text/css" href="/trial/css/style.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<?php ?>
<script type="text/javascript">
 (function($) {
     $(document).ready(function() {
		$("#we-recommend-nav li:first").addClass("current");
		$("#we-recommend-nav li").click(function(){
		$("#we-recommend-nav").find(".current").removeClass("current");
		$(this).addClass("current");
				var cat_name = $(this).text();
				$.ajax({
					type:'POST',
					url:'fetchProduct.php',
					data:'cat='+encodeURIComponent(cat_name),
					success:function(results){
					//alert(results);
						$("#product-feed").html(results);
					},
					error:function(){
						alert("error");
					}
				});
				return false;
		});
		
		
		
		
		
		$("#searchsubmit").click(function(){
			var name = document.getElementById('s').value;
			$("#we-recommend-nav").find(".current").removeClass("current");
			if(name!=''){
			$.ajax({
					type:'POST',
					url:'fetchProduct.php',
					data:'name='+encodeURIComponent(name),
					success:function(results){
						if(results!='')
						{
							$("#product-feed").html(results);
						}
						else
						{
							$("#we-recommend-nav li:first").addClass("current");
							return false;
						}
					},
					error:function(){
						alert("error");
					}
				});
			}
			else{ return false; }
		});
		
		if(brandVal = $("#brand").val())
			{
				$.ajax({
					type:'POST',
					url:'fetchProduct.php',
					data:'brand='+encodeURIComponent(brandVal),
					success:function(results){
					
					if(results!='')
					{
						var li = $("<li><a href='#'>"+brandVal+"</a></li>");
						$("#we-recommend-nav").find(".current").removeClass("current");
						li.insertBefore($("#we-recommend-nav ul li:first"));
						$(li).addClass("current");
						$("#product-feed").html(results);
					}
					else{ return false; }
					
					},
					error:function(){
						alert("error");
					}
				});
		}
		else { return false; }
		
	 });
 })(jQuery)
</script>
</head>
<?php 
	$brand=$_GET['brand'];
	if(isset($brand)){
?>
<input type="hidden" id="brand" value="<?php echo $brand; ?>" />
<?php } ?>
<div class="we-recommend">
	<div class="wrap">
        <div class="we-recommend-holder">
			<div class="we-recommend-top">
            
            	<h1>Shop <img style="position: relative; top: 8px; left: 5px;" src="http://www.canspanclients.com/dev/bru/wp-content/themes/allaboutbaby_v2/images/bru-purple.jpg"></h1>

            	<!-- Price tag -->
                						 <a target="_blank" href="http://www.babiesrus.ca/shop/index.jsp?categoryId=11770205&amp;overrideStore=TRUSCA&amp;locale=en_CA&amp;camp=BRU_AAB_Carrousel_PriceMatch"><img class="price-tag" src="http://www.canspanclients.com/dev/bru/wp-content/themes/allaboutbaby_v2/images/price-tag.png"></a>
				                				
                <!-- Free shipping -->
                						 <a target="_blank" class="free-shipping" href="http://www.toysrus.ca/helpdesk/panel/index.jsp?display=ship&amp;subdisplay=methods#methods&amp;overrideStore=TRUSCA&amp;locale=en_CA&amp;camp=BRU_AAB_Carrousel_FreeShipping"></a>	
				                      
                    <div class="we-recommend-search">
                     <form action="/" id="searchform" class="top-search" method="get" role="search">
                        <div>
                            <input type="text" id="s" name="s" value="search Babies &quot;R&quot; Us" onblur="if(this.value == ''){this.value = 'search Babies &quot;R&quot; Us';}" onfocus="if(this.value == 'search Babies &quot;R&quot; Us'){this.value = '';}">
                            <input type="button" value=" " class="search-btn" id="searchsubmit">
                        </div>
                    </form>
                 </div>
 			</div>
		
            <div class="we-recommend-nav" id="we-recommend-nav">
                <ul>
						<?php 
						
						
						
						$domObj=  new DOMDocument();
						$domObj->load('C:\Program Files\wamp\www\trial\products.xml');
						$xpath = new DOMXPath($domObj);
													
						$cat = $domObj->getElementsByTagName('category');
						$cat_array = array();

						foreach ($cat as $category) {
							$cat_array[]=$category->nodeValue;
						}					
						
						$cat_unique_array=array();
						$cat_unique_array = array_keys(array_count_values($cat_array));
						$count= count(array_unique($cat_array));
						for($i=0;$i<$count;$i++)
						{
							$category_name = $cat_unique_array[$i];
						?>
					<li  value="<?php echo $category_name;?>"><a href="#"><?php echo $category_name;?></a></li>
						<?php } ?>
                </ul>
            </div>
                
                <div class="product-feed" id="product-feed">
				
				<?php
					$cnt=0;
					$result=$xpath->query('/items/item[category="Infant &amp; preschool toys "]');
	
						foreach ($result as $entry) {
						if($cnt==5){ break;}
							
							$image_array = $entry->getElementsByTagName('image');
							$image = $image_array->item(0)->nodeValue;

							$name_array = $entry->getElementsByTagName('nameEN');
						    $title = $name_array->item(0)->nodeValue;
		
							$price_array = $entry->getElementsByTagName('price');
							$price = $price_array->item(0)->nodeValue;
							?>
						
							<div class="product-holder">
							<div class="product">
								<a href="#"><img src="<?php echo $image ?>" /></a>
								<p class="product-title"><a href="#"><?php echo $title;?> </a></p>
								<p class="product-price"><?php echo $price;?></p>
								<p class="product-price"><?php echo $prod_category;?></p>
								<p class="product-stock">In Stock<br /> Save $10 on any Graco Stroller or Travel System</p>
							</div>
							</div>
						<?php
						$cnt++;
						}
						?>
                
             </div>  
		
    </div>
	<div class="btn-right">NEXT</div>	
</div>
</div>

