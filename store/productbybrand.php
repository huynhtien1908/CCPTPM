<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
     
    if(!isset($_GET['brandid']) || $_GET['brandid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['brandid']; // Lấy brandid trên host
    }
    // gọi class category
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    //     $catName = $_POST['catName'];
    //     $updateCat = $cat -> update_category($catName,$id); // hàm check catName khi submit lên
    // }
    
  ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
	      	$name_bra = $bra->get_name_by_brand($id);
	      	if ($name_bra) {
	      		while ($result_name = $name_bra->fetch_assoc()) {
	      			# code...
	      		
	      	 ?>
    		<div class="heading">
    		<h3>Thương hiệu: <?php echo $result_name['brandName'] ; ?></h3>
    		</div>
    		<?php 
				}
	      	}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$productbybra = $bra->get_product_by_bra($id);
	      	if ($productbybra) {
	      		while ($result = $productbybra->fetch_assoc()) {
	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
					 <p><span class="price"><?php echo $result['price'].' VND' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
	      	}else {
	      		echo '<span style="color:red; font-size:30px;">Sản phẩm này hiện chưa có hàng !!!</span>';
	      	}
			?>
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

 	/*.images_1_of_2 {
    width: 28.2%;
    padding: 1.5%;
    border: 2px solid #9fbef3;
}*/
 </style>