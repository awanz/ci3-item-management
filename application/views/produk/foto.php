<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ganti Foto Produk
                </h2>
            </div>
            <div class="body">                
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
                    <img src="<?= base_url("assets/images/produk/".$data->foto) ?>" height="150px"><br>
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

                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Buat</button>
                </form>
            </div>
        </div>
    </div>
</div>