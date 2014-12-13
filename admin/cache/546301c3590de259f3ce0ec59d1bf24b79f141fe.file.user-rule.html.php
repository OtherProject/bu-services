<?php /* Smarty version Smarty-3.1.15, created on 2014-12-08 19:20:20
         compiled from "view/user-rule.html" */ ?>
<?php /*%%SmartyHeaderCode:174990811654858a5b8cc4c2-42295574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '546301c3590de259f3ce0ec59d1bf24b79f141fe' => 
    array (
      0 => 'view/user-rule.html',
      1 => 1418041218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174990811654858a5b8cc4c2-42295574',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54858a5b9e27f4_65728477',
  'variables' => 
  array (
    'userid' => 0,
    'data' => 0,
    'val' => 0,
    'var' => 0,
    'aksesVerified' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54858a5b9e27f4_65728477')) {function content_54858a5b9e27f4_65728477($_smarty_tpl) {?><script type="text/javascript">
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
	<h1>Article</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<div class="row">

		<div class="col-md-12">

			<div class="portlet">

				<div class="portlet-header">

					<h3>
						<i class="fa fa-table"></i>
						User Rule
					</h3>

				</div> <!-- /.portlet-header -->

				<div class="portlet-content">						

					<div class="table-responsive">

					<form action="" method=POST name="checks" ID="Form2" onsubmit="return confirm('save data?');">

					
					<input type="hidden" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
">
					<button type="submit" class="btn btn-info btn-sm" id="btn-dis" name="simpan"><i class="fa fa-trash-o" ></i> Save Rule</button>
					
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
									<th data-filterable="true" data-sortable="true" >Database</th>
									<th data-filterable="true" data-sortable="true" >Tabel</th>
									<th data-filterable="true" data-sortable="true" >Status</th>
									
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['val']->value) {?>
								<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="icheck-input" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" onchange="return AreAnyCheckboxesChecked();" <?php if (in_array($_smarty_tpl->tpl_vars['var']->value['id'],$_smarty_tpl->tpl_vars['aksesVerified']->value)) {?>checked="checked"<?php }?>>
									</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['namaDatabase'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['tabel'];?>
</td>
									<td style="color:<?php echo $_smarty_tpl->tpl_vars['var']->value['status_color'];?>
"></td>
									
								</tr>
								<?php } ?>
								<?php }?>
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
