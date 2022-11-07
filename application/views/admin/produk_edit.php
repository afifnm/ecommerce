<?php foreach ($produk as $u) { ?>
<div class="row">
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/produk/updatedata');?>">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nameBackdrop" class="form-label">Nama Produk</label>
            <input type="text"class="form-control" name="nama" value="<?php echo $u->nama; ?>">
            <input type="hidden" name="id" value="<?php echo $u->id_produk; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="nameBackdrop" class="form-label">Kategori Produk</label>
            <select name="kategori" class="form-control">
              <?php foreach ($kategori as $show) {?>
                  <option value="<?php echo $show['id_kategori'] ?>"
                    <?php if($show['id_kategori']==$u->id_kategori){ echo "selected";} ?>
                    ><?php echo $show['kategori'] ?></option>   
              <?php }?>
            </select>
          </div>
          <div class="col mb-3">
            <label for="nameBackdrop" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" value="<?php echo $u->harga; ?>">
          </div>
          <div class="col mb-3">
            <label for="nameBackdrop" class="form-label">Stok</label>
            <input type="number" class="form-control" name="stok" value="<?php echo $u->stok; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="nameBackdrop" class="form-label">Deskripsi</label>
            <textarea class="deskripsi" name="deskripsi"><?php echo $u->deskripsi; ?></textarea>
          </div>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
          <a href="<?php echo site_url('admin/produk/kategori/'.$u->id_kategori) ?>" class="btn btn-outline-secondary"> Batal </a>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<?php } ?>