<div id="myalert"> 
  <?php echo $this->session->flashdata('alert', true)?>
</div> 
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
          <span class="tf-icons bx bx-message-add"></span>&nbsp; Tambah Produk
        </button>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th style="text-align: center;" width=20%>Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($data2 as $user) {?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $user['nama']; ?></td>
              <td><?php echo $user['kategori']; ?></td>
              <td><?php echo number_format($user['harga'],0,",","."); ?></td>
              <td><?php echo $user['stok']; ?></td>
              <td align="center">
                <a href="<?php echo site_url('siswa/produk/hapus/'.$user['id_kategori'].'/'.$user['kode_produk']);?>" class="btn btn-sm btn-danger"
                  onClick="return confirm('Apakah anda yakin menghapus produk ini?')">
                  Hapus
                </a>
                <a href="<?php echo site_url('home/product/'.$user['kode_produk']);?>" class="btn btn-sm btn-warning" target="_blank">
                  Lihat Produk
                </a>      
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <form class="modal-content" method="post" action="<?php echo site_url('admin/produk/simpan');?>">
      <div class="modal-header">
        <h5 class="modal-title" id="backDropModalTitle">
          <span class="tf-icons bx bx-message-add"></span>&nbsp; Pilih produk untuk affiliasi tokomu.
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table id="example2" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Stok</th>
              <th style="text-align: center;" width=20%>Aksi</th>
            </tr>
          </thead>
          <tbody>
              <?php $no = 1;
              foreach ($produk as $user) {?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $user['nama']; ?></td>
                <td><?php echo number_format($user['harga'],0,",","."); ?></td>
                <td><?php echo $user['stok']; ?></td>
                <td align="center">
                  <a href="<?php echo site_url('siswa/produk/pilih/'.$user['kode_produk'].'/'.$user['id_kategori']);?>" class="btn btn-sm btn-primary">
                    Pilih Produk
                  </a>
                  <a href="<?php echo site_url('home/product/'.$user['kode_produk']);?>" class="btn btn-sm btn-warning" target="_blank">
                    Lihat Produk
                  </a>      
                </td>
              </tr>
              <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
      </div>
    </form>
  </div>
</div>