<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url('assets');?>/vendor/sneat/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>Login | <?php echo $site['nama_website']?></title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets');?>/vendor/sneat/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/vendor/sneat/assets/css/demo.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/css/pages/page-auth.css" />
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/js/helpers.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <h4 class="mb-2"><?php echo $site['nama_website']?> 👋</h4>
              <p class="mb-4">Masuk Dengan Username/NIS & Password Anda</p>

              <form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
                <div class="mb-3">
                  <label for="email" class="form-label">Username/NIS</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Enter your username"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="submit" value="login">Masuk</button>
                </div>
              </form>

              <p class="text-center">
                <span>Belum punya akun?</span><br>
                <a href="register">
                  <span>Klik disini untuk membuat akun</span>
                </a>
              </p>
              <div id="myalert">
					<?php echo $this->session->flashdata('alert', true)?>
				</div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/vendor/js/menu.js"></script>
    <script src="<?php echo base_url('assets');?>/vendor/sneat/assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(6500).slideUp(600);
	</script>
  </body>
</html>
