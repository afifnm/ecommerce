<div class="container-xxl flex-grow-1 container-p-y">
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Selamat Datang <?php echo $this->session->userdata('nama'); ?> 🎉</h5>
            <p class="mb-4">Tambahkan produk ke tokomu. Gunakan menu affiliasi untuk memulai menjual produk.</p>
            <a href="<?php echo site_url('affiliate/store/'.$this->session->userdata('username')) ?>" class="btn btn-sm btn-primary" target="_blank">Kunjungi Toko Affiliate</a>
            <a href="javascript:;" class="btn btn-sm btn-outline-primary">Copy Link Affiliate</a>
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="<?php echo site_url('assets/vendor/sneat');?>/assets/img/illustrations/man-with-laptop-light.png" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" height="140">
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-4 order-1">
    <div class="row">
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
              <img src="<?php echo site_url('assets/vendor/sneat');?>/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Profit</span>
            <h3 class="card-title mb-2">$12,628</h3>
            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
              <img src="<?php echo site_url('assets/vendor/sneat');?>/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                  <a class="dropdown-item" href="javascript:void(0);">View More</a>
                  <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                </div>
              </div>
            </div>
            <span>Sales</span>
            <h3 class="card-title text-nowrap mb-1">$4,679</h3>
            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>