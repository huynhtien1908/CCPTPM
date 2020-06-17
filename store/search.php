<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php
			    if($_SERVER['REQUEST_METHOD'] == 'POST'){
			        $tukhoa = $_POST['tukhoa'];
			        $search_product = $product->search_product($tukhoa);
			    }
			    
			?>
			<div class="content_top">
    		<div class="heading">
    		<h3>Từ khóa tìm kiếm: <?php echo $tukhoa ?></h3>
    		</div>
    		
    		<div class="clear"></div>
    		</div>
	      <div class="section group">
	      	<?php 
	      	
	      	if ($search_product) {
	      		while ($result = $search_product->fetch_assoc()) {
	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>" ><img href="details.php?proid=<?php echo $result['productId']; ?>" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],15) ?></p>
					 <p><span class="price"><?php echo $result['price'].' VND' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
	      	}else {
	      		echo '<br><span style="color:red; font-size:30px;">Sản phẩm này hiện chưa có hàng !!!</span>';
	      	}
			?>
			</div>

	
	
    </div>
 </div>
</div>
<?php 
	include 'inc/footer.php';
 ?>
 <style type="text/css">
 	.images_1_of_4 img {
    max-width: 100%;
    width: 90%;
    height: 35%;
}
.images_1_of_4 img {
    max-width: 100%;
    width: 90%;
    height: 35%;
}
.grid_1_of_4.images_1_of_4:hover {
	background:#9fbef3;
}
.details {
  	border: 0 solid;
  	box-shadow: inset 0 0 20px rgb(25, 16, 165);
  	outline: 1px solid;
  	outline-color: rgba(51, 50, 236, .5);
  	outline-offset: 0px;
  	text-shadow: none;
  	transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
} 

.details:hover {
	border: 1px solid;
	border: 1px solid #4D00A0;
	background:#70389C;
	text-decoration:none; 
	box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
	outline-color: rgba(255, 255, 255, 0);
	outline-offset: 30px;
	text-shadow: 1px 1px 2px #427388;
}

 </style>