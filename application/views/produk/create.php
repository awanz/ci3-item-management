<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Buat Produk
                </h2>
            </div>
            <div class="body">
                <?php if (validation_errors()) { ?>
                <div class="alert alert-warning">
                   <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
                
                <?php if ($this->session->flashdata('alert_status') == "success") { ?>
                <div class="alert alert-success">
                   <?php echo $this->session->flashdata('alert_message'); ?>
                </div>
                <?php } ?>

                <?php if ($this->session->flashdata('alert_status') == "error") { ?>
                <div class="alert alert-danger">
                   <?php echo $this->session->flashdata('alert_message'); ?>
                </div>
                <?php } ?>
               
                <form method="POST" action="" enctype="multipart/form-data">
                    <label for="namaProduk">Nama Produk</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="namaProduk" class="form-control" placeholder="Masukan Nama Produk">
                        </div>
                        <?php 
                            if (form_error('namaProduk')) {
                                echo "<small style='color: red;'>" . form_error('namaProduk') . "</small>";
                            } 
                        ?>
                    </div>
                    
                    <label for="harga">Harga Produk</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="harga" class="form-control" placeholder="Masukan Harga">
                        </div>
                        <?php 
                            if (form_error('harga')) {
                                echo "<small style='color: red;'>" . form_error('harga') . "</small>";
                            } 
                        ?>
                    </div>
                    
                    <label for="stok">Stok Produk</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="stok" class="form-control" placeholder="Masukan Stok">
                        </div>
                        <?php 
                            if (form_error('stok')) {
                                echo "<small style='color: red;'>" . form_error('stok') . "</small>";
                            } 
                        ?>
                    </div>

                    <label for="foto">Foto Produk</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <?php 
                            if (form_error('foto')) {
                                echo "<small style='color: red;'>" . form_error('foto') . "</small>";
                            } 
                        ?>
                    </div>
                    
                    <label for="deskripsi">Deskripsi</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="4" name="deskripsi" class="form-control no-resize" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>

                    <label for="idKategori">Kategori</label>
                    <div class="clearfix">
                        <select class="form-control show-tick" name="idKategori">
                            <option value="">-- Please select --</option>
                            <?php 
                                foreach ($kategori as $value) {
                                    echo '<option value="'.$value->idKategori.'">'.$value->namaKategori.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php 
                        if (form_error('idKategori')) {
                            echo "<small style='color: red;'>" . form_error('idKategori') . "</small>";
                        } 
                    ?>
                    <br>
                    
                    <label for="idMerek ">Merek</label>
                    <div class="clearfix">
                        <select class="form-control show-tick" name="idMerek">
                            <option value="">-- Please select --</option>
                            <?php 
                                foreach ($merek as $value) {
                                    echo '<option value="'.$value->idMerek.'">'.$value->namaMerek.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php 
                        if (form_error('idMerek')) {
                            echo "<small style='color: red;'>" . form_error('idMerek') . "</small>";
                        } 
                    ?>
                    <br>

                    <label for="namaKategori">Status</label>
                    <div class="clearfix">
                        <input name="status" type="radio" id="baru" value="Baru" checked />
                        <label for="baru">Baru</label>
                        <input name="status" type="radio" id="bekas" value="Bekas" />
                        <label for="bekas">Bekas</label>
                    </div>
                    <?php 
                        if (form_error('status')) {
                            echo "<small style='color: red;'>" . form_error('status') . "</small>";
                        } 
                    ?>
                    <br>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Buat</button>
                </form>
            </div>
        </div>
    </div>
</div>