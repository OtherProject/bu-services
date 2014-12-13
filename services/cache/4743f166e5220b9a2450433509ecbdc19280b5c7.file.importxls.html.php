<?php /* Smarty version Smarty-3.1.15, created on 2014-10-23 00:35:08
         compiled from "view/importxls.html" */ ?>
<?php /*%%SmartyHeaderCode:17753101555447dcbc53b400-61876919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4743f166e5220b9a2450433509ecbdc19280b5c7' => 
    array (
      0 => 'view/importxls.html',
      1 => 1413947084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17753101555447dcbc53b400-61876919',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'preview' => 0,
    'basedomain' => 0,
    'data' => 0,
    'balai' => 0,
    'var' => 0,
    'wilayah' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5447dcbc9a94e2_91817596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5447dcbc9a94e2_91817596')) {function content_5447dcbc9a94e2_91817596($_smarty_tpl) {?><script type="text/javascript">
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
	<h1>Import Data</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<div class="row">

		<div class="col-md-12">

			<div class="portlet">

				<div class="portlet-header">

					<h3>
						<i class="fa fa-table"></i>
						Import Data Excel
					</h3>

				</div> <!-- /.portlet-header -->

				<div class="portlet-content">						

					<div class="table-responsive">
					<?php if (!$_smarty_tpl->tpl_vars['preview']->value) {?>
					<form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
import/parseExcel" method="POST" name="checks" ID="Form2"  enctype="multipart/form-data">

					
					<input type="file" class="btn btn-default btn-sm" name="file">

					<button type="submit" class="btn btn-info" id="btn-dis"><i class="fa fa-save"></i> Simpan</button>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
					<form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
import/simpanData" method="POST" name="checks" ID="Form2"  enctype="multipart/form-data">


					<select class="btn btn-default btn-sm" style="text-align:left" name="balai">

						<option value="0">-- Pilih Balai --</option>
						<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['balai']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['kodeBalai'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['namaBalai'];?>
</option>
						<?php } ?>

					</select>
					<select class="btn btn-default btn-sm" style="text-align:left" name="provinsi">
						<option value="0">-- Pilih Provinsi --</option>
						<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wilayah']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['var']->value['kode_wilayah'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['nama_wilayah'];?>
</option>
						<?php } ?>
					</select>

					<button type="submit" class="btn btn-info" id="btn-dis"><i class="fa fa-save"></i> Submit</button>

					<table 
						class="table table-striped table-bordered table-hover table-highlight table-checkable" 
						data-provide="datatable" 
						data-display-rows="20"
						data-info="true"
						data-paginate="true"
					>
							<thead>
								<tr>
									<th class="checkbox-column">
										<input type="checkbox" class="icheck-input" onchange="return AreAnyCheckboxesChecked();">
									</th>
									<th data-filterable="true" data-sortable="true" >Merek</th>
									<th data-filterable="true" data-sortable="true" >Produsen</th>
									<th data-filterable="true" data-sortable="true">Jenis</th>
									<th data-filterable="true" data-sortable="true">Tanggal Pembelian</th>
									<th data-filterable="true" data-sortable="true">Lokasi</th>
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
article/addarticle/?id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" data-toggle="tooltip" data-placement="right" title="Edit or view <?php echo $_smarty_tpl->tpl_vars['var']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value[2];?>
</a></td>
									<td style="color:<?php echo $_smarty_tpl->tpl_vars['var']->value['status_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value[3];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value[4];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value[5];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value[6];?>
</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['preview']->value) {?>
						<div class="alert alert-info" role="alert">Tidak ada data</div>
						
						<?php }?>
						<?php }?>
					</form>
					</div> <!-- /.table-responsive -->
					

				</div> <!-- /.portlet-content -->

			</div> <!-- /.portlet -->

		

		</div> <!-- /.col -->

	</div> <!-- /.row -->

</div><?php }} ?>
