<div id="myalert"> 
  <?php echo $this->session->flashdata('alert', true)?>
</div> 
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#backDropModal">
          <span class="tf-icons bx bx-message-add"></span>&nbsp; Tambah Kategori Produk
        </button>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
          <tr>
            <th>No</th>
            <th>Kategori Produk</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach ($data2 as $user) {?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $user['kategori']; ?></td>
              <td align="center">
                <a href="<?php echo site_url('admin/kategori/delete_data/'.$user['id_kategori']);?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"><span class="tf-icons bx bx-trash-alt"></span></a>
                <a href="<?php echo site_url('admin/kategori/editdata/'.$user['id_kategori']);?>" class="btn btn-sm btn-warning" ><span class="tf-icons bx bx-edit-alt"></span></a>         
              </td>
            </tr>
            <?php $no++; } ?>
          </tbody>
        </table>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>
<div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
<div class="modal-dialog modal-sm">
  <form class="modal-content" method="post" action="<?php echo site_url('admin/kategori/simpan');?>">
    <div class="modal-header">
      <h5 class="modal-title" id="backDropModalTitle">
        <span class="tf-icons bx bx-message-add"></span>&nbsp; Tambah Kategori Produk
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col mb-3">
          <label for="nameBackdrop" class="form-label">Kategori Produk</label>
          <input type="text"class="form-control" placeholder="Kategori Produk" name="kategori" required>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
        Close
      </button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
</div>