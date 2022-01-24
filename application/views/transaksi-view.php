<?php 

$this->load->view('parts/header');

 ?>
 <form action="" method="post" role="form">
 	<div class="form-group">
 		<label for="nama">Barang</label>
 		<input type="text" class="form-control" name="barang" id="barang">
 	</div>
 	<div class="form-group">
 		<label for="nama">Jumlah</label>
 		<input type="text" class="form-contorl" name="jumlah" id="jumlah">
 	</div>
 	<div class="form-group">
 		<label for="nama">Harga</label>
 		<input type="text" class="form-contorl" name="harga" id="harga">
 	</div>
 	<div class="form-group">
 		<input type="button" value="Tambahkan" name="tambahkan" id="tambahkan" class="btn btn-primary">
 	</div>
 </form>
 <table id="dt-transact" class="table table-border" style="background: #fff">
 	<thead>
 		<tr>
 			<th>No.</th>
 			<th>Barang</th>
 			<th>Jumlah</th>
 			<th>Total Harga</th>
 			<th>Tools</th>
 		</tr>
 	</thead> 
 	<tbody>
 		
 	</tbody>
 	<tfoot>
 		<tr>
 		<th colspan="3">Jumlah</tr>
 		<th id="jHarga"></th>
 		<th></th>
 		</tr>
 	</tfoot>
 </table>
 <?php 
$this->load->view('parts/footer');
  ?>
<script type="text/javascript">
var totalHarga  = 0;
$('#tambahkan').click(function(event){
	addBarang();
});

$('#dt-transact').on('click','.hapus',function(){
	removeBarang(this);
});

function resetForm(){
	$('#barang').val('');
	$('#jumlah').val('');
	$('#harga').val('');
	$('#barang').focus();
}

function addBarang(){
	var barang = $('#barang').val();
	var jumlah = $('#jumlah').val();
	var jharga = $('#harga').val() * jumlah;

	var barang = "<input type='text' name='Kode'"

	var row = "<tr>";
	row += "<td></td>";
	row += "<td>"+barang+"</td>";
	row += "<td>"+jumlah+"</td>";
	row += "<td>"+jharga+"</td>";
	row += "<td></td>";
	row += "<td><a class='hapus' style='cursor: pointer'>Hapus</td>";
	row += "</tr>";
	$('#dt-transact tbody').append(row);
	resetForm();
	totalHarga += jharga;
	$('#jHarga').text(totalHarga);
}

function removeBarang(row){
	count--;
	$('#count').val(count;)
	var currentRow = $(row).closest('tr');
	var	currentHarga = currentRow.find("td:eq(3)").text();
	totalHarga -= currentHarga;
	currentRow.remove();
	$('#jHarga').text(totalHarga);
}
 </script>

