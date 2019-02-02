
<?php error_reporting(0); ?>
<?php include "config/db.conf.php" ?>
<?php include "connection/connection.php" ?>

<?php
$perpage = 15;

if (isset($_GET['page'])) {
  $page = $_GET['page'];

} else {
  $page = 1;

}


$start = ($page - 1) * $perpage;
$sql = "SELECT * FROM article WHERE type = 1 limit {$start} , {$perpage} ";


$result = $con->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Samira</title>
<?php include "template/header.php" ?>
<link rel="stylesheet" type="text/css" href="assets/styles/news.css">
<link rel="stylesheet" type="text/css" href="assets/styles/news_responsive.css">
</head>
<body>
<style media="screen">
	.blog_post{
		display:inline-block;
	}
</style>
<div class="super_container">

	<!-- Header -->

	<?php include "template/header-html.php"  ?>

	<!-- Menu -->

		<?php include "template/menu.php"  ?>


	<!-- Home -->

	<div class="home">
		<!-- Image credit: https://unsplash.com/@christoph -->
		<div  style="background-image: url(assets/images/news.jpg)" class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/news.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="home_subtitle">แนะนำ</div>
			<div class="home_title"><?php echo __NAME__ ?></div>
		</div>
	</div>

	<!-- Search Bar -->


	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="blog_post_container">
						<?php while ($results = $result->fetch_object()) { ?>
						<!-- Blog Post - Image Top -->
						<div class="blog_post blog_image_top magic_up">
							<div class="blog_image"><img src="backoffice/<?php echo $results->thumbnail ?>" alt=""></div>
							<div class="blog_post_content">
								<div class="blog_post_title"><a href="article-detail.php?id=<?php echo $results->id ?>"><?php echo $results->title ?></a></div>
								<div class="blog_post_text">
									<p><?php echo $results->desc_shrt ?></p>
								</div>
								<a href="article-detail.php?id=<?php echo $results->id ?>" class="button_container blog_button ml-auto"><div class="button text-center"><span>อ่านต่อ</span></div></a>
							</div>
						</div>
						<?php } ?>



					</div>
					<?php
	                 $sql2 = "SELECT * FROM article WHERE type =1  ";
	                 $query2 = mysqli_query($con, $sql2);
	                 $total_record = mysqli_num_rows($query2);
	                 $total_page = ceil($total_record / $perpage);
	                 ?>

	                <ul class="pagination">

	                  <!-- Pagination -->
	                  <?php for($i=1;$i<=$total_page;$i++){ ?>
	                  <li class="paginate_button page-item">
	                    <a href="users.php?page=<?php echo $i; ?>" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link"><?php echo $i; ?></a>
	                  </li>
	                  <?php } ?>
	                  <!-- End Paginate -->

	                </ul>
				</div>
			</div>

		</div>
	</div>

	<!-- Newsletter -->

	<!-- <div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="newsletter_content">
						<div class="section_title_container">
							<div class="section_subtitle">luxury resort</div>
							<div class="section_title"><h2>Our Newsletter</h2></div>
						</div>
						<div class="newsletter_text">
							<p>Praesent fermentum ligula in dui imperdiet, vel tempus nulla ultricies. Phasellus at commodo ligula. Nullam molestie volutp at sapien.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="newsletter_form_container">
						<form action="#" id="newsletter_form" class="newsletter_form">
							<input type="email" class="newsletter_input" placeholder="Your e-mail" required="required">
							<button class="newsletter_button"><span>Subscribe</span></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="newsletter_border_container"><div class="container"><div class="row border_row"><div class="col"><div class="newsetter_border"></div></div></div></div></div>
	</div> -->

	<!-- Footer -->
	<?php include "template/footer.php" ?>
	</body>
	</html>
