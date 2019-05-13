<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1>

    <div class="row">
        <div class="table-responsive col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>

            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTambahLaporanModal">Tambah Laporan</a>

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No Akta</th>
                        <th scope="col">Tgl Akta</th>
                        <th scope="col">Bentuk Perbuatan Hukum</th>
                        <th scope="col">Pihak Pertama</th>
                        <th scope="col">Pihak Kedua</th>
                        <th scope="col">Jenis dan Nomor Hak</th>
                        <th scope="col">Letak Tanah dan Bangunan</th>
                        <th scope="col">Luas Tanah(M2)</th>
                        <th scope="col">Luas Bangunan(M2)</th>
                        <th scope="col">Nilai Harga Transaksi(Rp.)</th>
                        <th scope="col">NOP</th>
                        <th scope="col">NJOP(Rp.)</th>
                        <th scope="col">Tgl SSP</th>
                        <th scope="col">Nominal SSP(Rp.)</th>
                        <th scope="col">Tgl SSB</th>
                        <th scope="col">Nominal SSB(Rp.)</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $l['no_akta']; ?></td>
                            <td><?= $l['tgl_akta']; ?></td>
                            <td><?= $l['bph']; ?></td>
                            <td><?= 'NIK: ' . $l['nik_p1'] . '<br/>',
                                    'Nama: ' . '<br/>' . $l['nama_p1'] . '<br/>',
                                    'Alamat: ' . '<br/>' . $l['alamat_p1'] . '<br/>',
                                    'NPWP: ' . '<br/>' . $l['npwp_p1']; ?></td>
                            <td><?= 'NIK: ' . $l['nik_p2'] . '<br/>',
                                    'Nama: ' . '<br/>' . $l['nama_p2'] . '<br/>',
                                    'Alamat: ' . '<br/>' . $l['alamat_p2'] . '<br/>',
                                    'NPWP: ' . '<br/>' . $l['npwp_p2']; ?></td>
                            <td><?= $l['jnh']; ?></td>
                            <td><?= $l['ltb']; ?></td>
                            <td><?= $l['lt']; ?></td>
                            <td><?= $l['lb']; ?></td>
                            <td><?= $l['nht']; ?></td>
                            <td><?= $l['nop']; ?></td>
                            <td><?= $l['njop']; ?></td>
                            <td><?= $l['tgl_ssp']; ?></td>
                            <td><?= $l['nom_ssp']; ?></td>
                            <td><?= $l['tgl_ssb']; ?></td>
                            <td><?= $l['nom_ssb']; ?></td>
                            <td><?= $l['keterangan']; ?></td>

                            <td>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(); ?>laporan/hapus/<?= $l['id']; ?>" class="badge badge-danger" onclick="return confirm ('Yakin hapus data?');">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newTambahLaporanModal" tabindex="-1" role="dialog" aria-labelledby="newTambahLaporanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTambahLaporanModalLabel">Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addForm" action="<?= base_url('laporan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_akta" name="no_akta" placeholder="No Akta">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tgl_akta" name="tgl_akta" placeholder="Tgl Akta">
                    </div>
                    <div class="form-group">
                        <select name="bph" id="bph" class="form-control">
                            <option value="">Bentuk Perbuatan Hukum</option>
                            <?php foreach ($bph as $b) : ?>
                                <option value="<?= $b['bentuk_hukum']; ?>"><?= $b['bentuk_hukum']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik_p1" name="nik_p1" placeholder="NIK Pihak Pertama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_p1" name="nama_p1" placeholder="Nama Pihak Pertama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat_p1" name="alamat_p1" placeholder="Alamat Pihak Pertama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="npwp_p1" name="npwp_p1" placeholder="NPWP Pihak Pertama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik_p2" name="nik_p2" placeholder="NIK Pihak Kedua">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_p2" name="nama_p2" placeholder="Nama Pihak Kedua">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat_p2" name="alamat_p2" placeholder="Alamat Pihak Kedua">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="npwp_p2" name="npwp_p2" placeholder="NPWP Pihak Kedua">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jnh" name="jnh" placeholder="Jenis dan Nomor Hak">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ltb" name="ltb" placeholder="Letak Tanah dan Bangunan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lt" name="lt" placeholder="Luas Tanah">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lb" name="lb" placeholder="Luas Bangunan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nht" name="nht" placeholder="Nilat Harga Transaksi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nop" name="nop" placeholder="SPPT PBB (NOP)">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="njop" name="njop" placeholder="SPPT PBB (NJOP)">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tgl_ssp" name="tgl_ssp" placeholder="Tanggal SSP">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nom_ssp" name="nom_ssp" placeholder="Nominal SSP">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tgl_ssb" name="tgl_ssb" placeholder="Tanggal SSB">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nom_ssb" name="nom_ssb" placeholder="Nominal SSB">
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>