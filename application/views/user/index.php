<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profil/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['name']; ?></h5>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text">NIK: <?= $user['nik']; ?></p>
                    <p class="card-text">No. SK : <?= $user['no_sk']; ?></p>
                    <p class="card-text">Tgl. SK : <?= $user['tgl_sk']; ?></p>
                    <p class="card-text">Tempat Lahir: <?= $user['t_lhr']; ?></p>
                    <p class="card-text">Tgl. lahir: <?= $user['tgl_lhr']; ?></p>
                    <p class="card-text">No. HP: <?= $user['no_hp']; ?></p>
                    <p class="card-text">Alamat: <?= $user['alamat']; ?></p>
                    <p class="card-text">Wilayah Kerja: <?= $user['wilker_id']; ?>
                    </p>
                    <p class="card-text"><small class="text-muted">Bergabung <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->