<?php foreach ($kategori as $u) { ?>
<div class="row">
<form class="form-horizontal" method="post" action="<?php echo site_url('admin/kategori/updatedata');?>">
  <div class="col-md-6">
    <div class="card mb-4">
      <div class="card-body">
        <div>
          <label for="defaultFormControlInput" class="form-label">Kategori</label>
          <input type="text" class="form-control" name="kategori" value="<?php echo $u->kategori; ?>" required>
          <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_kategori; ?>" readonly>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<?php } ?>