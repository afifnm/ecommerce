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
    <title>Register | <?php echo $site['nama_website']?></title>
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
              <p class="mb-4">Register</p>
              <form class="form-horizontal" method="post" action="<?php echo site_url('auth/simpan');?>">
                <div class="mb-3">
                  <label class="form-label">Username/NIS</label>
                  <input type="text" class="form-control" name="username" placeholder="username/NIS" required>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Register Sebagai</label>
                  <select class="form-select form-select-lg" name="level" id="level">
                    <option value="Siswa">Siswa</option>
                    <option value="Pembeli">Pembeli</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                </div> 
                <input type="hidden" name="email" value="-">
                <div class="mb-3" id="tempat_lahir">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                </div>
                <div class="mb-3" id="tanggal_lahir">
                  <label class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" >
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="mb-3">
                  <label class="form-label">No. Telp</label>
                  <input type="text" class="form-control" name="no_hp" placeholder="No. HP">
                </div>
                <div class="mb-3" id="kelas">
                  <label class="form-label">Kelas</label>
                  <input type="text" class="form-control" name="kelas" placeholder="Kelas">
                </div>
                <div class="mb-3" id="tahun_ajaran">
                  <label class="form-label">Tahun Ajaran</label>
                  <input type="text" class="form-control" name="tahun_ajaran" placeholder="Tahun ajaran masuk" >
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" name="submit">Register</button>
                </div>
              </form>
              <p class="text-center">
                <span>Sudah punya akun?</span><br>
                <a href="login">
                  <span>Klik disini untuk login</span>
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
    <script>
        const tahun_ajaran = document.getElementById('tahun_ajaran');
        const tempat_lahir = document.getElementById('tempat_lahir');
        const tanggal_lahir = document.getElementById('tanggal_lahir');
        const kelas = document.getElementById('kelas');
        const select = document.getElementById('level');
        select.addEventListener('change', function() {
        console.log(select.value);
        if (select.value=='Pembeli') {
            tahun_ajaran.style.display = 'none';
            tempat_lahir.style.display = 'none';
            tanggal_lahir.style.display = 'none';
            kelas.style.display = 'none';
        } else {
            tahun_ajaran.style.display = 'block';
            tempat_lahir.style.display = 'block';
            tanggal_lahir.style.display = 'block';
            kelas.style.display = 'block';
        }
        })
    </script>
  </body>
</html>