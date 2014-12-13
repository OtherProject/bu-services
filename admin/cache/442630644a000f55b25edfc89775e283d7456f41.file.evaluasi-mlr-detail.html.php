<?php /* Smarty version Smarty-3.1.15, created on 2014-11-07 10:24:35
         compiled from "view/evaluasi/evaluasi-mlr-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1974375674545c2b85b71f21-32407752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '442630644a000f55b25edfc89775e283d7456f41' => 
    array (
      0 => 'view/evaluasi/evaluasi-mlr-detail.html',
      1 => 1415327073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1974375674545c2b85b71f21-32407752',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_545c2b85c9c334_94430996',
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
<?php if ($_valid && !is_callable('content_545c2b85c9c334_94430996')) {function content_545c2b85c9c334_94430996($_smarty_tpl) {?>
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
	<h1>Detail Evaluasi MLR</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<?php if ($_smarty_tpl->tpl_vars['status']->value) {?>
		<div class="alert alert-success" role="alert">Data berhasil disimpan</div>
	<?php }?>
	<form id="validate-enhanced" class="form parsley-form" method="post" action="" enctype="multipart/form-data">
		
		<?php if (!$_smarty_tpl->tpl_vars['addnew']->value) {?>
		<button type="submit" class="btn btn-info" id="btn-dis"><i class="fa fa-save"></i> Update Data</button>

		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi/detail/?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&act=2" ><button type="button" class="btn btn-success" id="btn-dis"><i class="fa fa-check"></i> Approved</button></a>
		
		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi/detail/?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&act=3" ><button type="button" class="btn btn-danger" id="btn-dis"><i class="fa fa-multiply"></i> Rejected</button></a>

		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi/detail/?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" ><button type="button" class="btn btn-warning" id="btn-dis"><i class="fa fa-refresh"></i> Reload</button></a>
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
				
						<div class="col-sm-12">
							<div class="form-group">
							<label for="text-input">Nama Merek Rokok</label>
								<select class="form-control pilihmerek">
									<option>-Pilih Merek-</option>
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
						
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Nama Produsen / Importir</label>
								
									<input type="text" name="produsen" class="form-control namaprodusen" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['produsen'];?>
" disabled/>
							</div>
						</div>

						<div class="col-md-7">
							<div class="form-group">
							<label for="text-input">Tanggal Pembelian</label>
								<div id="tanggalBeli" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
									<input class="form-control" type="text" name="tanggalBeli" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggalBeli'];?>
" data-required="true">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>

						
						<div class="col-sm-12">
							<div class="form-group">
							<label for="textarea-input">Lokasi Pembelian</label>
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
							Materi Iklan Lainnya
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Penandaan 18+</label>
									<input type="text" name="kadarNikotin" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarNikotin'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tidak Menggunakan Bentuk Rokok/ asosiasi lainnya</label>
									<input type="text" name="kadarTar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tidak Merangsang</label>
									<input type="text" name="kadarPenulisan_sisi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarPenulisan_sisi'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tidak ditujukan untuk anak, remaja, wanita hamil</label>
									<input type="text" name="kadarTulisan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTulisan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tidak bertentangan dengan norma</label>
									<input type="text" name="kadarTulisan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kadarTulisan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Evaluasi</label>
									<input type="text" name="evaluasiPeringatan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiPeringatan'];?>
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
						<div class="col-md-3">
							<div class="form-group">
							<label for="text-input">Jenis Gambar</label>
									<input type="text" name="jenisGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenisGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
							<label for="text-input">Tulisan Peringatan Kesehatan</label>
									<input type="text" name="tulisanGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tulisanGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Gambar Jelas dan Mencolok sesuai dengan ketentuan</label>
									<input type="text" name="luasPeringatan_depan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_depan'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Luas</label>
									<input type="text" name="luasPeringatan_belakang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_belakang'];?>
" />
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Evaluasi Kesehatan</label>
									<input type="text" name="evaluasiPeringatan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiPeringatan'];?>
" />
							</div>
						</div>
						
						
					</div>
				</div>
				
				

				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Ketentuan Khusus di Media Luar Ruang
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Tidak Ditetakkan di KTR</label>
									<input type="text" name="pernyataanUtama" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanUtama'];?>
" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Tidak Diletakkan Di Jalan Utama atau Protokol</label>
									<input type="text" name="kodeProduksi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kodeProduksi'];?>
" />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							<label for="text-input">Harus diletakkan sejajar dengan bahu jalan dan tidak memotong jalan</label>
								
								<input class="form-control" type="text" name="tanggalProduksi" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggalProduksi'];?>
" data-required="true">
								

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tidak Melebihi Ukuran 72M2</label>
									<input type="text" name="alamat" class="form-control alamatprodusen" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['alamat'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Evaluasi</label>
									<input type="text" name="pernyataanBatas_aman" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['pernyataanBatas_aman'];?>
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
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Keterangan</label>
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
