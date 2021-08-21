<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header js-sweetalert">
                <h2>
                    Produk
                </h2>
            </div>
            <div class="body">
                <?php if ($this->session->flashdata('alert_status')) { ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('alert_message'); ?>
                    </div>
                <?php } ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1; foreach ($data as $value) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td> <img src="<?= base_url("assets/images/produk/".$value->foto) ?>" width="100px"/> </td>
                                <td><?= $value->namaProduk ?></td>
                                <td><?= $value->harga ?></td>
                                <td><?= $value->stok ?></td>
                                <td><a href="<?= base_url("produk/".$value->idProduk."/edit") ?>" class="btn bg-cyan waves-effect">Edit</a> <a href="<?= base_url("produk/".$value->idProduk."/delete") ?>" class="btn bg-red waves-effect">Delete</a></td>
                            </tr>
                            <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->