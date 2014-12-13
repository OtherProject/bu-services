<?php /* Smarty version Smarty-3.1.15, created on 2014-11-04 18:04:55
         compiled from "view/user.html" */ ?>
<?php /*%%SmartyHeaderCode:628964995544881946b0eb3-00536251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b34e0bcfe270268ba91860f4ca6b98e836ece5d' => 
    array (
      0 => 'view/user.html',
      1 => 1415095493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '628964995544881946b0eb3-00536251',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_544881947eadf9_45563552',
  'variables' => 
  array (
    'status' => 0,
    'basedomain' => 0,
    'data' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544881947eadf9_45563552')) {function content_544881947eadf9_45563552($_smarty_tpl) {?><script type="text/javascript">
	function AreAnyCheckboxesChecked () {
	  if ($("#Form2 input:checkbox:checked").length > 0)
		{
		    $("#btn-dis").removeAttr("disabled");
		}
		else
		{
		   $('#btn-dis').attr("disabled","disabled");
		}
	}
</script>
<div id="content-header">
	<h1>User Management</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<div class="row">

		<div class="col-md-12">

			<div class="portlet">

				<div class="portlet-header">

					<h3>
						<i class="fa fa-table"></i>
						Daftar User
					</h3>

				</div> <!-- /.portlet-header -->

				<div class="portlet-content">						
					<?php if ($_smarty_tpl->tpl_vars['status']->value) {?>
						<div class="alert alert-success" role="alert">Akun berhasil diupdate</div>
					<?php }?>	

					<div class="table-responsive">

					<form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
user" method=POST name="checks" ID="Form2" >

					<select class="btn btn-default btn-sm" style="text-align:left" name="status">

						<option value="">-- Pilih Status --</option>
						<option value="0">Pending</option>
						<option value="2">Approved</option>
						<option value="3">Reject</option>

					</select>

					<button type="submit" class="btn btn-info btn-sm" id="btn-dis" disabled><i class="fa fa-check"></i> Update User</button>
					<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
user" ><button type="button" class="btn btn-warning" id="btn-dis"><i class="fa fa-refresh"></i> Reload</button></a>
					<table 
						class="table table-striped table-bordered table-hover table-highlight table-checkable" 
						data-provide="datatable" 
						data-display-rows="10"
						data-info="true"
						data-paginate="true"
					>
							<thead>
								<tr>
									<th class="checkbox-column">
										<input type="checkbox" class="icheck-input" onchange="return AreAnyCheckboxesChecked();">
									</th>
									<th data-filterable="true" data-sortable="true" >Nama</th>
									<th data-filterable="true" data-sortable="true" >Instansi</th>
									<th data-filterable="true" data-sortable="true">Email</th>
									<th data-filterable="true" data-sortable="true">Status</th>
									
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="icheck-input" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" onchange="return AreAnyCheckboxesChecked();">
									</td>
									<td><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
user/edit/?id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" data-toggle="tooltip" data-placement="right" title="Edit or view <?php echo $_smarty_tpl->tpl_vars['var']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['name'];?>
</a></td>
									<td style="color:<?php echo $_smarty_tpl->tpl_vars['var']->value['status_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['description'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['email'];?>
</td>
									<td>
										<?php if ($_smarty_tpl->tpl_vars['var']->value['n_status']==0) {?>Pending<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['var']->value['n_status']==1) {?>Approved<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['var']->value['n_status']==2) {?>Rejected<?php }?>
									</td>
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
					</div> <!-- /.table-responsive -->
					

				</div> <!-- /.portlet-content -->

			</div> <!-- /.portlet -->

		

		</div> <!-- /.col -->

	</div> <!-- /.row -->

</div><?php }} ?>
