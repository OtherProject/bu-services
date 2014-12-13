<?php /* Smarty version Smarty-3.1.15, created on 2014-11-07 11:29:02
         compiled from "view/evaluasi/evaluasi-phw.html" */ ?>
<?php /*%%SmartyHeaderCode:798089341545c29ef440de6-68511068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fb078f5a66e2779415fa2a05b5f6c204fcac6d8' => 
    array (
      0 => 'view/evaluasi/evaluasi-phw.html',
      1 => 1415330940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '798089341545c29ef440de6-68511068',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_545c29ef57ecb5_91778344',
  'variables' => 
  array (
    'basedomain' => 0,
    'data' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545c29ef57ecb5_91778344')) {function content_545c29ef57ecb5_91778344($_smarty_tpl) {?><script type="text/javascript">
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
	<h1>Evaluasi PHW</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<div class="row">

		<div class="col-md-12">

			<div class="portlet">

				<div class="portlet-header">

					<h3>
						<i class="fa fa-table"></i>
						Daftar Evaluasi
					</h3>

				</div> <!-- /.portlet-header -->

				<div class="portlet-content">						

					<div class="table-responsive">

					<form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi" method=POST name="checks" ID="Form2" >

					<select class="btn btn-default btn-sm" style="text-align:left" name="status">

						<option value="1">-- Pilih Status --</option>
						
						<option value="2">Approved</option>
						<option value="3">Reject</option>

					</select>

					<button type="submit" class="btn btn-info btn-sm" id="btn-dis" disabled><i class="fa fa-check"></i> Konfirmasi</button>
					
					<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
evaluasi/detail"><button type="button" class="btn btn-success btn-sm" id="btn-dis"><i class="fa fa-plus"></i> Tambah Data</button></a>

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
									<th data-filterable="true" data-sortable="true" >Merek</th>
									<th data-filterable="true" data-sortable="true" >Nama Pabrik</th>
									<th data-filterable="true" data-sortable="true">Tanggal Monitoring</th>
									<th data-filterable="true" data-sortable="true">Tempat Monitoring</th>
									
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
evaluasi/iklanphw_detail/?id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" data-toggle="tooltip" data-placement="right" title="Edit or view <?php echo $_smarty_tpl->tpl_vars['var']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['merek'];?>
</a></td>
									<td style="color:<?php echo $_smarty_tpl->tpl_vars['var']->value['status_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['produsen'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['tanggalBeli'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['lokasiBeli'];?>
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
