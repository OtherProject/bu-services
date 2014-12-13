<?php /* Smarty version Smarty-3.1.15, created on 2014-11-07 11:19:40
         compiled from "view/pelaporan-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1936437739545ae33976c620-73805027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b518bc067303d3608ba78444827b697e64fc2f87' => 
    array (
      0 => 'view/pelaporan-detail.html',
      1 => 1415330377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1936437739545ae33976c620-73805027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_545ae33980ba04_64372857',
  'variables' => 
  array (
    'status' => 0,
    'addnew' => 0,
    'basedomain' => 0,
    'id' => 0,
    'data' => 0,
    'getMerek' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545ae33980ba04_64372857')) {function content_545ae33980ba04_64372857($_smarty_tpl) {?>
<script type="text/javascript">

  

  	$(function () {
		$('#postdate1').datepicker ();
		$('#expiredate1').datepicker ();
		
		$("#isi").jqte();
		

	})

    $(document).on('change', '.pilihmerek', function(){


      var id = $(this).val();

      $.post(basedomain+'evaluasi/ajax',{merek:id}, function(data){

        var html = "";

        if (data.status==true){


        	$('.namaprodusen').val(data.res[0].produsen);
        	$('.jenisrokok').val(data.res[0].jenis);
        	$('.alamatprodusen').val(data.res[0].alamat);
        	
          
        } 
        
      }, "JSON")  

    })
  
</script>


<div id="content-header">
	<h1>Detail Pelaporan</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<?php if ($_smarty_tpl->tpl_vars['status']->value) {?>
		<div class="alert alert-success" role="alert">Data berhasil disimpan</div>
	<?php }?>
	<form id="validate-enhanced" class="form parsley-form" method="post" action="" enctype="multipart/form-data">
		
		<?php if (!$_smarty_tpl->tpl_vars['addnew']->value) {?>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi/detail/?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&act=2" ><button type="button" class="btn btn-success" id="btn-dis"><i class="fa fa-check"></i> Approved</button></a>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi/detail/?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&act=3" ><button type="button" class="btn btn-danger" id="btn-dis"><i class="fa fa-multiply"></i> Rejected</button></a>

		
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
		<?php } else { ?>
		<button type="submit" class="btn btn-info" id="btn-dis"><i class="fa fa-save"></i> Simpan Data</button>

		<?php }?>
		<div class="row">
			<div class="col-md-6">
				<div class="portlet">
				
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Form Produk
						</h3>

					</div> <!-- /.portlet-header -->
				
					<div class="portlet-content">
				
						
						
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Nama Produsen / Importir</label>
								
									<select class="form-control pilihmerek">
									<option>-Pilih Produsen-</option>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['getMerek']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['merek'];?>
</option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">No NPPBKC</label>
									<input type="text" name="jenis" class="form-control jenisrokok" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenis'];?>
" />
							</div>
						</div>

						
						
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">No Telp</label>
									<input type="text" name="kataPromotif" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kataPromotif'];?>
" />
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">No Fax</label>
									<input type="text" name="evaluasiInformasi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">KESIMPULAN (MK/TMK)</label>
									<input type="text" name="kesimpulan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kesimpulan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Nama Pemilik/Direktur</label>
									<input type="text" name="tahun" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tahun'];?>
" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="textarea-input">Alamat</label>
									<textarea name="lokasiBeli" id="isi"  cols="10" rows="20" class="form-control"><?php echo $_smarty_tpl->tpl_vars['data']->value['lokasiBeli'];?>
</textarea>
							</div>
						</div>
					</div>
				</div>
				
				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Informasi Produk
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Merek Rokok</label>
									<input type="text" name="jenisGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenisGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Jenis</label>
									<input type="text" name="tulisanGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tulisanGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Luas Depan (%)</label>
									<input type="text" name="luasPeringatan_depan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_depan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Isi/Kemasan</label>
									<input type="text" name="luasPeringatan_belakang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_belakang'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Bentuk Kemasan</label>
									<input type="text" name="warnaGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['warnaGambar'];?>
" />
							</div>
						</div>
						
					</div>
				</div>
				
				
				
				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Kadar Nikotin dan Tar
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Kadar Nikotin (mg)</label>
									<input type="text" name="jenisGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenisGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Kadar Tar (mg)</label>
									<input type="text" name="tulisanGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tulisanGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Penulisan Sisi</label>
									<input type="text" name="luasPeringatan_depan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_depan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tulisan</label>
									<input type="text" name="luasPeringatan_belakang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_belakang'];?>
" />
							</div>
						</div>
						
					</div>
				</div>
			</div>
		
		
			<div class="col-md-6">
				

				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Pencantuman Peringatan Kesehatan
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Jenis Gambar</label>
									<input type="text" name="kadarNikotin" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarNikotin'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tulisan peringatan kesehatan</label>
									<input type="text" name="kadarTar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Luas Depan (%)</label>
									<input type="text" name="kadarPenulisan_sisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarPenulisan_sisi'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Luas Belakang (%)</label>
									<input type="text" name="kadarTulisan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTulisan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">warna dan kejelasan gambar</label>
									<input type="text" name="kadarTulisan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTulisan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Evaluasi</label>
									<input type="text" name="kadarTulisan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTulisan'];?>
" />
							</div>
						</div>
					</div>

				</div>

				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Pencantuman Informasi Kesehatan
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Pernyataan "dilarang menjual atau memberi kepada anak dan  perempuan hamil"</label>
									<input type="text" name="pernyataanUtama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanUtama'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Kode Produksi</label>
									<input type="text" name="kodeProduksi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kodeProduksi'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tgl Produksi</label>
								<div id="tanggalProduksi" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
									<input class="form-control" type="text" name="tanggalProduksi" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggalProduksi'];?>
" data-required="true">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>

							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Nama dan Alamat Produsen</label>
									<input type="text" name="alamat" class="form-control alamatprodusen" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['alamat'];?>
" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Pernyataan "tidak ada batas aman"</label>
									<input type="text" name="pernyataanBatas_aman" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanBatas_aman'];?>
" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Pernyataan "mengandung lebih dari 4000 zat kimia …..."</label>
									<input type="text" name="pernyataanZat_kimia" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanZat_kimia'];?>
" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Kata promotif dan menyesatkan</label>
									<input type="text" name="pernyataanZat_kimia" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanZat_kimia'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Evaluasi</label>
									<input type="text" name="pernyataanZat_kimia" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanZat_kimia'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Kesimpulan</label>
									<input type="text" name="pernyataanZat_kimia" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanZat_kimia'];?>
" />
							</div>
						</div>
					</div>

				</div>
				
			</div>
		</div>
	
	</form>
</div><?php }} ?>
