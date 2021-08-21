<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Merek
                </h2>
            </div>
            <div class="body">
                <?php if (validation_errors()) { ?>
                <div class="alert alert-warning">
                   <?php echo validation_errors(); ?>
                </div>
                <?php } ?>

                <?php if ($this->session->flashdata('alert_status')) { ?>
                <div class="alert alert-success">
                   <?php echo $this->session->flashdata('alert_message'); ?>
                </div>
                <?php } ?>
               
                <form method="POST" action="">
                    <label for="namaMerek">Nama Merek</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" value="<?= $data->namaMerek ?>" name="namaMerek" class="form-control" placeholder="Masukan Nama Merek">
                        </div>
                        <?php 
                            if (form_error('namaMerek')) {
                                echo "<small style='color: red;'>" . form_error('namaMerek') . "</small>";
                            } 
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>