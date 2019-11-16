<section>
    <div class="container">
        <div class="col-md-6">
            <?php
            if ($this->session->flashdata('notif')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data <strong><?= $this->session->flashdata('notif') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
        } elseif ($this->session->flashdata('notif_success')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong><?= $this->session->flashdata('notif_success') ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
        }
        ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nama Mobil</label>
                    <input type="text" name="mobil" class="form-control" id="formGroupExampleInput" value="<?= $mobil['nama'] ?>" placeholder="Masukkan Nama">
                    <small class="text-danger"><?= form_error('mobil') ?></small>
                </div>

                <div class="form-group">
                    <label for="inputState">Merek</label>
                    <select id="inputState" name="merek" class="form-control">
                        <option selected>Pilih Merek</option>
                        <?php
                        foreach ($merek as $row) {
                            echo '<option value=" ' . $row["id_merek"] . ' ">' . $row['merek'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Tahun</label>
                    <input type="date" name="tahun" class="form-control" id="formGroupExampleInput2" value="<?= $mobil['tahun'] ?>" placeholder="Masukkan tahun">
                    <small class="text-danger"><?= form_error('tahun') ?></small>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Harga</label>
                    <input type="text" name="harga" class="form-control" id="formGroupExampleInput2" value="<?= $mobil['harga'] ?>" placeholder="Masukkan harga">
                    <small class="text-danger"><?= form_error('harga') ?></small>
                </div>
                <button name="submit" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</section>