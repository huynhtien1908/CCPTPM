<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
     
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['catid']; // L?y catid trên host
    }
    // g?i class category
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // L?Y D? LI?U T? PHUONG TH?C ? FORM POST
    //     $catName = $_POST['catName'];
    //     $updateCat = $cat -> update_category($catName,$id); // hàm check catName khi submit lên
    // }
    
  ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
	      	$name_cat = $cat->get_name_by_cat($id);
	      	if ($name_cat) {
	      		while ($result_name = $name_cat->fetch_assoc()) {
	      		
	      	 ?>
    		<div class="heading">
    		<h3>Danh mục: <?php echo $result_name['catName'] ; ?></h3>
    		</div>
    		<?php 
				}
	      	}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">

	      	<?php 
	      	$productbycat = $cat->get_product_by_cat($id);
	      	if ($productbycat) {
	      		while ($result = $productbycat->fetch_assoc()) {
	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>" ><img href="details.php?proid=<?php echo $result['productId']; ?>" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50) ?></p>
					 <p><span class="price"><?php echo $result['price'].' VND' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
	      	}else {
	      		echo '<span style="color:red; font-size:30px;">Sản phẩm này chưa có hàng !!!</span>';
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
 	/*.images_1_of_2 {
    width: 28.2%;
    padding: 1.5%;
    border: 2px solid #9fbef3;
}*/
 </style>