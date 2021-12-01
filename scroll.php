<style> 
#MyDiv {
    display:none;
}
@media screen and (min-width: 1024px){
	#MyDiv {
		display:block;
	}
}
/*position:fixed ; bottom:50px;*/
</style>
<section id="MyDiv" class="categories-cards" >
   <div class="container" > <marquee onmouseover="this.stop()" onmouseout="this.start()" >
<div class="row"  style="width:1100px;border:1px solid #f1f1f1;margin-left:2px;padding:3px;background:#fff;z-index:999;">
		<div class="button_close" style="width:20px;height:20px;text-align:center;font-size:10px;border:1px solid #999;padding:0 4;">x</div>人気ランキング
           <div class="row" style="width:1200px;padding-left:50px;">
			<?php
			$sql = "select * from yx_books order by borrow desc limit 6";
			$books = $conn->query($sql);
			?>  
			<?php
                while ($rows = $books->fetch()) {
                    ?>             
			   <div style="width:150px;height:200px;margin-left:18px;">
                    <div class="category-single category--img" style="padding:5px;">
                        <figure class="category--img4">
                           <?php
                            echo '<img src="admin/uploads/' . $rows['images'] . '"  width="140" height="180">';
                            ?>
                         <figcaption class="overlay-bg">
                                <a href="" class="cat-box">
                                    <div>
                                        <h4 class="cat-name"><?php echo $rows['name']; ?></h4>
                                    </div>
                                </a>
                            </figcaption>   
                        </figure>
						
                    </div><!-- ends: .category-single -->
				
                </div><!-- ends: .col -->
				 <?php
                }
                ?>
            </div>
        </div> </marquee> 
	</div>
</section><!-- ends: .categories-cards -->
<script>
$(document).ready(function(){
	
	  $(".button_close").click(function(){
		$("#MyDiv").remove();
	  });
});
</script>