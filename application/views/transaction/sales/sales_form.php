<div class="page-breadcrumb">
	<div class="row">
		<div class="col-12 d-flex no-block align-items-center">
			<h2 class="page-title">Penjualan
			</h2>

			<div class="ml-auto text-right">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page"> <b>Penjualan</b></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div >
	<div class="card-deck">
		<div class="card col-4">
			<div class="row">
				<div class="ml-3 mt-3">
					<div class="form-group row">
						<label for="date" class="col-sm-3 text-left control-label col-form-label ml-3">Tanggal</label>
						<div class="col-sm-8">
							<input type="text" value="<?=$date=date('Y-m-d H:i:s')?>" name="date" class="form-control" id="date"
								required disabled>
						</div>
					</div>
					<div class="form-group row">
						<label for="kasir" class="col-sm-3 text-left control-label col-form-label ml-3">Kasir</label>
						<div class="col-sm-8">
							<input type="text" name="kasir" value="<?php echo $this->fungsi->user_login()->name; ?>"
								class="form-control" id="kasir" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="invoice" class="col-sm-3 text-left control-label col-form-label ml-3">Invoice</label>
						<div class="col-sm-8">
							<input type="text" name="invoice" value="<?=strtoupper(uniqid())?>"
								class="form-control" id="invoice" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card col-4">
			<div class="row">
				<div class="ml-3 mt-3">
                    <form action="<?=site_url('sales/add_sales')?>" method="post">
                        <div class="form-group row">
                            <label for="barcode"
                                class="col-sm-3 text-left control-label col-form-label ml-3">Barcode</label>
                            <div class="col-sm-8 input-group">
								<input type="hidden" name="date" id="date" value="<?$date?>">
								<input type="hidden" name="item_id" id="item_id">
								<input type="hidden" name="invoice" id="invoice" value="">
								<input type="hidden" name="product_name" id="product_name">
								<input type="hidden" name="price" id="price">
                                <input type="text" name="barcode" class="form-control" id="barcode" required autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn" data-toggle="modal"
                                        data-target="#modal-item">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="qty" class="col-sm-3 text-left control-label col-form-label ml-3">Qty</label>
                            <div class="col-sm-8">
                                <input type="number" name="qty" class="form-control" id="qty">
                            </div>
                        </div>
                        <div class="form-group row">
							<button href=" type="submit" name="pilih" id="pilih" class="btn btn-secondary btn-xs ml-4">
                                <i class="mdi mdi-arrow-right"></i> Pilih
                            </button>
                        </div>
                    </form>
				</div>
			</div>
        </div>
        <div class="card col-4">
            <h1 class="text-right mt-5 mr-3" style="font-size: 50px">0</h1>
        </div>
		
    </div>
    <div class="card mt-3" style="padding: 15px">
        <div class="table-responsive-md">
            <table class="table table-striped" id="table_transaksi">
                <thead>
                    <tr>
                        <th style="width: 50px"><b>#</b></th>
                        <th style="width: 150px"><b>Barcode</b></th>
                        <th style="width: 200px"><b>Produk Name</b></th>
                        <th style="width: 190px"><b>Harga</b></th>
                        <th class="text-center" style="width: 100px"><b>Qty</b></th>
                        <th class="text-center" style="width: 200px"><b>Total</b></th>
                        <th class="text-center"><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
					
					<?php $no= 1;
					$koneksi = mysqli_connect("localhost", "root", "", "kasir");
					if(mysqli_connect_errno()){
						echo "Koneksi database gagal : ".mysqli_connect_error();
					}
					// $sql = $koneksi->query("select * from transaction_sales, product_item where transaction_sales.barcode=product_item.barcode AND invoice='$invoice2'");
					// $this->db->query("select * from transaction_sales, product_item where transaction_sales.barcode=product_item.barcode AND invoice='$invoice'"); 
					?>
					<tr>
						<td><?=$no++ ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
                </tbody>
            </table>
        </div>
		</div>
    </div>
    <br>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<center>
	Copyright © 2019 Sans-Mart
</center>
<footer class="footer text-center">
</footer>

<div class="modal fade" id="modal-item">
	<div class="modal-dialog" style="min-width: 700px; max-height: 80%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Pilih Produk Item</h4>
				<button type="button" class="close" data-dismiss="modal" arial-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table_select_item">
					<thead>
						<tr>
							<th>Barcode</th>
							<th>Name</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stok</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($item as $i => $data) {?>
						<tr>
							<td><?=$data->barcode?></td>
							<td><?=$data->name?></td>
							<td><?=$data->unit_name?></td>
							<td class="text-right"><?=indo_currency($data->price)?></td>
							<td class="text-right"><?=$data->stock?></td>
							<td class="text-right">
								<button class="btn btn-xs btn-info" id="select" data-id="<?=$data->item_id?>"
									data-barcode="<?=$data->barcode?>" data-name="<?=$data->name?>"
									data-unit="<?=$data->unit_name?>" data-stock="<?=$data->stock?>" 
									data-price="<?=$data->price?>">
									<i class="mdi mdi-check"></i>Select
								</button>
							</td>

						</tr>
						<?php } ?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url() ?>assets/assets/libs/jquery/dist/jquery-3.4.1.min.js"></script>

<script>
	// $(document).ready(function(){
	// 	for(var b = 0; b<1; b++){
	// 		barisbaru();
	// 	}

	// 	$('#pilih').click(function(){
	// 		barisbaru();
	// 	});
	// })

	// function barisbaru(){
	// 	var nomor = $('#table_transaksi tbody tr').length + 1;
	// 	var baris = "<tr>";
	// 			baris += "<td>"+nomor+"</td>";
	// 			baris += "<td><div class='input-group'><input type='text' class='form-control' id='barcode1'><button type='button' class='btn btn-info btn-xs' data-toggle='modal'data-target='#modal-item'><i class='fas fa-search'></i></button></div></td>";
	// 			baris += "<td>asd</td>";
	// 			baris += "<td>ads</td>";
	// 			baris += '<td><input class="form-control" type="number"></td>';
	// 			baris += "<td>asd</td>";
	// 			baris += "<td class='text-center'><button class='btn btn-danger' id='delete_row'><i class='mdi mdi-delete'></i>Delete</button></td>";
	// 		baris += "</tr>";
		
		
	// 	$('#table_transaksi tbody').append(baris);
	// 	// $('table_transaksi tbody tr').each(function(){
	// 	// 	$(this).find('td:nth-child(5) input').focus();
	// 	// });

	// }

	$(document).ready(function () {

		$(document).on('click', '#select', function () {
			var barcode = $(this).data('barcode');
			var name = $(this).data('name');
			var price = $(this).data('price');
			var stock = 1;

			$('#barcode').val(barcode);
			$('#qty').val(stock);
			$('#product_name').val(name);
			$('#price').val(price);

			$('#modal-item').modal('hide');
		});
	});

	$(document).ready(function(){
		$('#invoice').val();
	})

	$(document).ready(function(){
		$('#table_select_item').DataTable()
	});	
</script>


