<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                </div>
            </div>
            <div class=" form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form action="<?= base_url('user/edit'); ?>" method="post">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" name="nik">
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">No SK</div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_sk" name="no_sk">
                        <?= form_error('no_sk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-2">Tgl SK</div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tgl_sk" name="tgl_sk">
                        <?= form_error('tgl_sk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Tempat Lahir</div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="t_lhr" name="t_lhr">
                        <?= form_error('t_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-2">Tanggal Lahir</div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" id="tgl_lhr" name="tgl_lhr">
                        <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">No. HP</div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-2">Wilayah Kerja</div>
                    <div class="col-sm-4">
                        <select name="wilker_id" id="wilker_id" class="form-control">
                            <option value=""></option>
                            <?php foreach ($wilker as $w) : ?>
                                <option value="<?= $w['nama_wilker']; ?>"><?= $w['nama_wilker']; ?></option>
                            <?php endforeach; ?>
                            <?= form_error('wilker_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </select>
                    </div>
                    <!--         
                        <input type="text" class="form-control" id="wilker" name="wilker">
                    </div> -->
                </div>
        </div>
    </div>



    <div class="form-group row justify-content-end">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->