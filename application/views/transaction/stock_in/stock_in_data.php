<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h2 class="page-title">Barang Masuk</h2>
			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active" aria-current="page"> <b>Barang Masuk</b></li>
					</ol>
				</nav>
			</div>
		</d7v>
	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <?php $this->view('messages') ?>
    <div class="card" style="padding: 15px">
        <div class="card-body">
            <h3 class="card-title float-left">Data Barang Masuk</h3>
            <div class="float-right">
                <a href="<?=site_url('stock/in/add')?>" class="btn btn-info"><i class="mdi mdi-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="table-responsive-md">
            <table class="table table-bordered table-striped" id="data_table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Produk Item</th>
                        <th>Qty</th>
                        <th>Tanggal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row as $key => $data) { ?>
                        <tr>
                            <td style="width: 5%"><?=$no++ ?></td>
                            <td><?=$data->barcode ?></td>
                            <td><?=$data->item_name ?></td>
                            <td class="text-center"><?=$data->qty ?></td>
                            <td class="text-center"><?=indo_date($data->date) ?></td>
                            <td class="text-center" width="160px">
                                <a id="set-detail" class="btn btn-outline-secondary btn-xs" data-toggle="modal" data-target="#modal-detail"
                                    data-barcode="<?=$data->barcode?>"
                                    data-itemname="<?=$data->item_name?>"
                                    data-detail="<?=$data->detail?>"
                                    data-qty="<?=$data->qty?>"
                                    data-date="<?=indo_date($data->date) ?>">
                                    <i class="mdi mdi-eye"></i> Detail
                                </a>
                                <a href="<?=site_url('stock/in/del'.'/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('Yakin hapus data ?')" class="btn btn-danger btn-xs">
                                    <i class="mdi mdi-delete"></i> Delete
                                </a>
                            </td>
                        </tr>
                            
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<center>
	Copyright © 2019 Sans-Mart
</center>
<footer class="footer text-center">
</footer>

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-xs" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Barang Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 35%"><b>Barcode</b></th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th><b>Name Item</b></th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th><b>Detail</b></th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th><b>Qty</b></th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th><b>Date</b></th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/assets/libs/jquery/dist/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#set-detail', function(){
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname');
            var detail = $(this).data('detail');
            var unit_name = $(this).data('unit');
            var qty = $(this).data('qty');
            var date = $(this).data('date');

            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#detail').text(detail);
            $('#qty').text(qty);
            $('#date').text(date);

        });
    });
</script>