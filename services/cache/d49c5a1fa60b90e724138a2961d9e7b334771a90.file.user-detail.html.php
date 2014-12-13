<?php /* Smarty version Smarty-3.1.15, created on 2014-11-04 18:22:24
         compiled from "view/user-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:191899985854477f62e7e9e0-35464398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd49c5a1fa60b90e724138a2961d9e7b334771a90' => 
    array (
      0 => 'view/user-detail.html',
      1 => 1415096541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191899985854477f62e7e9e0-35464398',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54477f62f29731_96618906',
  'variables' => 
  array (
    'status' => 0,
    'basedomain' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54477f62f29731_96618906')) {function content_54477f62f29731_96618906($_smarty_tpl) {?><script>
$(function () {
	$('#postdate1').datepicker ();
	$('#expiredate1').datepicker ();
	
	$("#isi").jqte();
	

})
</script>

<div id="content-header">
	<h1>Detail User</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<?php if ($_smarty_tpl->tpl_vars['status']->value) {?>
		<div class="alert alert-success" role="alert">Akun berhasil dibuat</div>
		<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
user"><button type="submit" class="btn btn-alert" id="btn-dis">Kembali</button></a>
	<?php } else { ?>
	<form id="validate-enhanced" class="form parsley-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
user/add" enctype="multipart/form-data">
		
		<div class="row">
			<div class="col-md-12">
				<div class="portlet">
				
					<div class="portlet-header">

						<h3>
							<i class="fa fa-file"></i>
							Detail User
						</h3>

					</div> <!-- /.portlet-header -->
				
					<div class="portlet-content">
						<div class="col-sm-12">
							<div class="form-group">
							<label for="text-input">Nama Perusahaan</label>
									<input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['perusahaan']['namaIndustri'];?>
" data-required="true" />
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="text-input">Nama Depan</label>
									<input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" data-required="true" />
							</div>
						</div>	
						<div class="col-sm-6">
							<div class="form-group">
							<label for="text-input">Nama Belakang</label>
									<input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['last_name'];?>
" data-required="true" />
							</div>
						</div>	
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Email</label>
									<input type="text" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
" />
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Jabatan</label>
									<input type="text" name="description" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Alamat</label>
									<input type="text" name="StreetName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['StreetName'];?>
" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">No Telpon</label>
									<input type="text" name="phone_number" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['phone_number'];?>
" />
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		
		
			
		</div>
	
	</form>
	<?php }?>
</div><?php }} ?>
