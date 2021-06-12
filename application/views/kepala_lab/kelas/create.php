<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-user">
        <div class="card-header">
          <div class="toolbar">
            <a href="<?=base_url()?>index.php/admin/kelas"><button class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> &nbsp; Kembali ke Data Kelas</button></a>
          </div>
          <h5 class="card-title">Tambah Kelas</h5>
        </div>
        <div class="card-body">
          <form class="form-horizontal" action="<?=base_url()?>index.php/admin/kelas/insert_kelas" method="post" enctype="multipart/form-data">
            <div class="row">
              <label class="col-sm-2 col-form-label">Pilih Kelas</label>
              <div class="col-sm-2  ">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="kom" required>
                    <option></option>
                    <?php foreach ($kelas_kom as $key): ?>
                      <option value="<?=$key->kelas_kom.$key->angkatan?>"><?=$key->kelas_kom.' '.$key->angkatan?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <button type="button" class="btn btn-round" style="margin-top: -1px" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus"></i> &nbsp; Tambah Kelas
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Mata Kuliah</label>
              <div class="col-sm-4">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="kode_matkul" required>
                    <option></option>
                    <?php foreach ($matkul as $matkul): ?>
                      <option value="<?=$matkul->kode_matkul?>"><?=$matkul->nama_matkul?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <button type="button" class="btn btn-round" style="margin-top: -1px" data-toggle="modal" data-target="#myModal2">
                    <i class="fa fa-plus"></i> &nbsp; Tambah Mata Kuliah
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Aslab</label>
              <div class="col-sm-4">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="id_aslab" required>
                    <option></option>
                    <?php foreach ($aslab as $key): ?>
                      <option value="<?=$key->id_aslab?>"><?=$key->nim . ' ' . $key->nama?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <button type="button" class="btn btn-round" style="margin-top: -1px" data-toggle="modal" data-target="#myModal3">
                    <i class="fa fa-plus"></i> &nbsp; Tambah Aslab
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Dosen</label>
              <div class="col-sm-4">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="nidn" required>
                    <option></option>
                    <?php foreach ($dosen as $key): ?>
                      <option value="<?=$key->nidn?>"><?=$key->nama?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <button type="button" class="btn btn-round" style="margin-top: -1px" data-toggle="modal" data-target="#myModal4">
                    <i class="fa fa-plus"></i> &nbsp; Tambah Dosen
                  </button>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Hari</label>
              <div class="col-sm-2">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="hari" required>
                    <option></option>
                      <option>Senin</option>
                      <option>Selasa</option>
                      <option>Rabu</option>
                      <option>Kamis</option>
                      <option>Jumat</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Pukul</label>
              <div class="col-sm-2">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="jam_masuk" required>
                    <option></option>
                      <option>08.00</option>
                      <option>09.20</option>
                      <option>11.20</option>
                      <option>13.00</option>
                      <option>14.40</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-sm-2 col-form-label">Ruang</label>
              <div class="col-sm-2">
                <div class="form-group">
                  <select class="form-control" id="kategori" name="id_lab" required>
                    <option></option>
                    <?php foreach ($lab as $key): ?>
                      <option value="<?=$key->id_lab?>"><?=$key->nama_lab?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-success btn-round"> &nbsp; Simpan &nbsp; </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/admin/kelas/insert_kelas_kom" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Kelas</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">Kode Kelas</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="kelas_kom" placeholder="contoh: C1" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">Angkatan</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="number" class="form-control" name="angkatan" placeholder="contoh: 2017" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <input type="submit" class="btn btn-default btn-link" value="submit">
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Classic Modal4 -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/admin/kelas/insert_dosen" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Dosen</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">nidn</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="nidn" placeholder="contoh: 0031087905" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">nama</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">email</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">kontak</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="kontak" placeholder="boleh no WA atau LINE atau keduanya" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <input type="submit" class="btn btn-default btn-link" value="submit">
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Classic Modal2 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/admin/kelas/insert_matkul" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Mata Kuliah</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">Kode</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="kode_matkul" placeholder="contoh: TIF2305" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">Nama</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="nama_matkul" placeholder="contoh: Web Semantik" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <input type="submit" class="btn btn-default btn-link" value="submit">
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Classic Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="<?=base_url()?>index.php/admin/kelas/insert_aslab" method="post">
        <div class="modal-header justify-content-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="nc-icon nc-simple-remove"></i>
          </button>
          <h6 class="title title-up">Tambah Aslab</h6>
        </div>
        <div class="modal-body">
          <div class="row">
            <label class="col-md-3 col-form-label">NIM</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="number" class="form-control" name="nim" placeholder="" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">Email</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <label class="col-md-3 col-form-label">Kontak</label>
            <div class="col-md-9">
              <div class="form-group">
                <input type="text" class="form-control" name="kontak" placeholder="boleh no WA atau LINE atau keduanya" required="">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="left-side">
            <input type="submit" class="btn btn-default btn-link" value="submit">
          </div>
          <div class="divider"></div>
          <div class="right-side">
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!--  End Modal -->
<script src="<?=base_url()?>assets/js/plugins/ckeditor/ckeditor.js"></script>

  <script type="text/javascript">
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
    })
  </script>
 <script src="<?=base_url()?>assets/js/plugins/jasny-bootstrap.min.js"></script>