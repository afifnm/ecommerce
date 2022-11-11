<!DOCTYPE html>
<html>
<head>
	<title>
	<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/logo.png"); ?>' rel='shortcut icon' type='image/png' />
	<!-- meta -->
	<?php require_once('_meta.php') ;?>
	<!-- css -->
	<?php require_once('_css.php') ;?>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
</head>
<body>
  	<div class="layout-wrapper layout-content-navbar">
  		<div class="layout-container">
			<!-- header -->
			<?php require_once('_sidebar.php') ;?>
			<div class="layout-page">
				<?php require_once('_nav.php') ;?>
				<div class="content-wrapper">
		            <div class="container-xxl flex-grow-1 container-p-y">
		               <?php echo $contents ;?>
		            </div>
		            <?php require_once('_footer.php') ;?>
            		<div class="content-backdrop fade"></div>
          		</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>
</html>
