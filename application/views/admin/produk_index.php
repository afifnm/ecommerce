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
            <th>Keterangan</th>
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
              <td>
                <?php if ($user['active']==0) { ?>
                  <span class="badge rounded-pill bg-danger">tidak tampil</span>
                <?php } else { ?>
                  <span class="badge rounded-pill bg-success">tampil</span>
                <?php }  ?>
              </td>
              <td align="center">
                <a href="<?php echo site_url('admin/produk/delete_data/'.$user['id_kategori'].'/'.$user['kode_produk']);?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"><span class="tf-icons bx bx-trash-alt"></span></a>
                <a href="<?php echo site_url('admin/produk/editdata/'.$user['id_kategori'].'/'.$user['kode_produk']);?>" class="btn btn-sm btn-warning" ><span class="tf-icons bx bx-edit-alt"></span></a>     
                <a href="<?php echo site_url('admin/produk/foto/'.$user['id_kategori'].'/'.$user['kode_produk']);?>" class="btn btn-sm btn-primary" ><span class="tf-icons bx bx-image-add"></span></a>      
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
        <span class="tf-icons bx bx-message-add"></span>&nbsp; Tambah Produk
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Nama Produk</label>
          <input type="text"class="form-control" placeholder="Nama Produk" name="nama" required>
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Kategori Produk</label>
          <select name="kategori" class="form-control">
            <?php foreach ($kategori as $show) {?>
                <option value="<?php echo $show['id_kategori'] ?>"><?php echo $show['kategori'] ?></option>   
            <?php }?>
          </select>
        </div>
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Harga</label>
          <input type="number" class="form-control" placeholder="Harga Produk" name="harga" required>
        </div>
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Stok</label>
          <input type="number" class="form-control" placeholder="Stok Produk" name="stok" required>
        </div>
      </div>
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Deskripsi</label>
          <textarea class="deskripsi" name="deskripsi"></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
</div>