<?php /* Smarty version Smarty-3.1.15, created on 2014-10-26 21:55:38
         compiled from "view/profil.html" */ ?>
<?php /*%%SmartyHeaderCode:417412261544cfd5ae36df7-99413093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ce98e332d592a77a1535405b94d8978b5e22b59' => 
    array (
      0 => 'view/profil.html',
      1 => 1413963573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '417412261544cfd5ae36df7-99413093',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedomain' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_544cfd5b3fb345_52629422',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544cfd5b3fb345_52629422')) {function content_544cfd5b3fb345_52629422($_smarty_tpl) {?><script>
$(function () {
	$('#postdate').datepicker ();
	$('#expiredate').datepicker ();
	
	$("#isi").jqte();
	
	$('input:checkbox, input:radio').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue',
		inheritClass: true
	})
})
</script>

<div id="content-header">
	<h1>Profile</h1>
</div> <!-- #content-header -->	

<div id="content-container">
	<form id="validate-enhanced" class="form parsley-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
article/profil" enctype="multipart/form-data">

		<div class="row">
			<div class="col-md-9">
				<div class="portlet">
				
					<div class="portlet-header">

						<h3>
							<i class="fa fa-tasks"></i>
							Form Article
						</h3>

					</div> <!-- /.portlet-header -->
				
					<div class="portlet-content">
				
						<div class="col-sm-12">
							<div class="form-group">
							<label for="text-input">Title</label>
									<input type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
" data-required="true"/>
							</div>
						</div>	
						
						<div class="col-md-6">
							<div class="form-group">
							<label for="text-input">Brief</label>
									<input type="text" name="brief" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['brief'];?>
" />
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
							<label for="textarea-input">Deskripsi</label>
									<textarea name="content" id="isi"  cols="10" rows="20" class="form-control"><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</textarea>
							</div>
							
							
									<!-- hidden -->
									<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" />
									
							
						</div>
					</div>
				</div>
				
			</div>
		
		
			<div class="col-md-3">
				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-calendar"></i>
							Publish Date
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="form-group">
							<label for="select-input">Postdate</label>
							<div id="postdate" class="input-group date" data-auto-close="true" data-date-format="dd-mm-yyyy" data-date-autoclose="true">
								<input class="form-control" type="text" name="postdate" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['posted_date'];?>
" data-required="true">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							
						</div>
						
						<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="n_status" class="" <?php echo $_smarty_tpl->tpl_vars['data']->value['n_status'];?>
 >
										Publish
									</label>
								</div>
						</div>
						
						<input type="submit" class="btn btn-primary" value="Submit" id="submit" />
					</div>
				</div>
				
				<div class="portlet">
					<div class="portlet-header">

						<h3>
							<i class="fa fa-picture-o"></i>
							Cover Image
						</h3>

					</div> <!-- /.portlet-header -->
					<div class="portlet-content">
						<div class="fileupload fileupload-new" data-provides="fileupload">
						  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['file'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['image'];?>
" /></div>
						  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
						  <div>
							<span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="file_image"/></span>
							<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
						  </div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	
	</form>
</div><?php }} ?>
