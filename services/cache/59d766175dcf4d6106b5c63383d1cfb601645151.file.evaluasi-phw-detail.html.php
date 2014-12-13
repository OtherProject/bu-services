<?php /* Smarty version Smarty-3.1.15, created on 2014-11-07 10:44:06
         compiled from "view/evaluasi/evaluasi-phw-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1029930563545c30d599f961-43550038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59d766175dcf4d6106b5c63383d1cfb601645151' => 
    array (
      0 => 'view/evaluasi/evaluasi-phw-detail.html',
      1 => 1415328244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1029930563545c30d599f961-43550038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_545c30d5a2ce23_37043339',
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
<?php if ($_valid && !is_callable('content_545c30d5a2ce23_37043339')) {function content_545c30d5a2ce23_37043339($_smarty_tpl) {?>
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
	<h1>Detail Evaluasi</h1>
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
							<label for="text-input">Nama Pabrik</label>
								
									<input type="text" name="produsen" class="form-control namaprodusen" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['produsen'];?>
" disabled/>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Isi</label>
									<input type="text" name="jenis" class="form-control jenisrokok" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenis'];?>
" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label for="text-input">Jenis</label>
									<input type="text" name="jenis" class="form-control jenisrokok" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenis'];?>
" />
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label for="text-input">Tahun Cukai</label>
									<input type="text" name="jenis" class="form-control jenisrokok" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenis'];?>
" />
							</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">
							<label for="text-input">Tanggal Monitoring</label>
								<div id="tanggalBeli" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
									<input class="form-control" type="text" name="tanggalBeli" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tanggalBeli'];?>
" data-required="true">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>

						
						<div class="col-sm-12">
							<div class="form-group">
							<label for="textarea-input">Tempat Monitoring</label>
									<textarea name="lokasiBeli" id="isi"  cols="10" rows="20" class="form-control"><?php echo $_smarty_tpl->tpl_vars['data']->value['lokasiBeli'];?>
</textarea>
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
							Peringatan Kesehatan
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Tulisan (PP 19/2003)</label>
									<input type="text" name="jenisGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenisGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Gambar dan Tulisan (PP 109/2012)</label>
									<input type="text" name="tulisanGambar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tulisanGambar'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Keterangan</label>
									<input type="text" name="luasPeringatan_depan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['luasPeringatan_depan'];?>
" />
							</div>
						</div>
						
						
					</div>
				</div>
				
				
			</div>
		</div>
	
	</form>
</div><?php }} ?>
