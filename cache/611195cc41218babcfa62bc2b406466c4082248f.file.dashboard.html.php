<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 18:32:50
         compiled from "view/dashboard.html" */ ?>
<?php /*%%SmartyHeaderCode:140205920754688b62f1ae87-36370406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '611195cc41218babcfa62bc2b406466c4082248f' => 
    array (
      0 => 'view/dashboard.html',
      1 => 1404288420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140205920754688b62f1ae87-36370406',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usertype' => 0,
    'datachart' => 0,
    'userlist' => 0,
    'k' => 0,
    'val' => 0,
    'v' => 0,
    'unreview' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54688b63309be4_09425711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54688b63309be4_09425711')) {function content_54688b63309be4_09425711($_smarty_tpl) {?>
<?php if (($_smarty_tpl->tpl_vars['usertype']->value==1)) {?>
<script language='javascript' type='text/javascript'>

var total_review = <?php echo $_smarty_tpl->tpl_vars['datachart']->value['total'];?>
;
var sudah_review = <?php echo $_smarty_tpl->tpl_vars['datachart']->value['total_review'];?>
;
var belum_review = <?php echo $_smarty_tpl->tpl_vars['datachart']->value['total_belum_review'];?>
;




	$(function () {
	    $('#container').highcharts({
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: null,
	            plotShadow: false
	        },
	        title: {
	            text: 'Perbandingan jumlah hasil review ('+total_review+' Peserta)'
	        },
	        tooltip: {
	    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    color: '#000000',
	                    connectorColor: '#000000',
	                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
	                }
	            }
	        },
	        series: [{
	            type: 'pie',
	            name: 'Review share',
	            data: [
	                
	                ['Belum Direview',       belum_review],
	                {
	                    name: 'Sudah Direview',
	                    y: sudah_review,
	                    sliced: true,
	                    selected: true
	                }
	            ]
	        }]
	    });
	});


</script>
<?php }?>
<script language='javascript' type='text/javascript'>

$(document).on('click','.deleteData', function(){
    var userid = $(this).attr('attr');
    
    var conf = confirm('Delete member ?');
    if (!conf) return false;

    $.post(basedomain+'member/deleteMember', {userid:userid}, function(data){

        if (data.status){
            window.location.href=basedomain+'member';
        }

    },"JSON");
})


</script>


			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Tables</a>
					</li>
				</ul>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['usertype']->value==1) {?>
			<div class="box ">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>	
				</div>
			<?php }?>
			<div class="row-fluid sortable">	
				
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-bullhorn"></i> Data Review Peserta</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  
							  <tr>
								  <th>No</th>
								  <th>Nama Peserta</th>
								 	<th>Reviewer</th>
								 	<th>Jumlah Reviewer</th>
								 	<th>Total Review</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['userlist']->value) {?>
						  	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['userlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
								<td class="center"><?php echo $_smarty_tpl->tpl_vars['val']->value['nama'];?>
</td>
								<td class="center">
									
									<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value['reviewer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
										&raquo; <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

										
									<?php } ?>
								</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['jumlah_reviewer'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['total_review']['rekap_total_score'];?>
</td>
							</tr>
							<?php } ?>
							<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
				

			</div><!--/row-->

			
			<?php if (($_smarty_tpl->tpl_vars['usertype']->value!=1)) {?>
			<div class="row-fluid sortable">	
				
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-bullhorn"></i> Data yang belum direview</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  
							  <tr>
								  <th>No</th>
								  <th>Nama Peserta</th>
								 	<th>Status</th>
								 	
							  </tr>
						  </thead>   
						  <tbody>
							<?php if ($_smarty_tpl->tpl_vars['unreview']->value) {?>
						  	<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['unreview']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
								<td class="center"><?php echo $_smarty_tpl->tpl_vars['val']->value['nama'];?>
</td>
								<td class="center">Pending</td>
								
							</tr>
							<?php } ?>
							<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
				
				
			</div><!--/row-->
			<?php }?>
					<!-- content ends -->
			</div><!--/#content.span10--><?php }} ?>
