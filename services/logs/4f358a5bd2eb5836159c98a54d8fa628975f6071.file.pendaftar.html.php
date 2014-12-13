<?php /* Smarty version Smarty-3.1.15, created on 2014-03-04 17:46:09
         compiled from ".\view\member\pendaftar.html" */ ?>
<?php /*%%SmartyHeaderCode:1133953160351cbb2a5-72545958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f358a5bd2eb5836159c98a54d8fa628975f6071' => 
    array (
      0 => '.\\view\\member\\pendaftar.html',
      1 => 1393951420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1133953160351cbb2a5-72545958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'test' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_53160351da0a51_06012918',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53160351da0a51_06012918')) {function content_53160351da0a51_06012918($_smarty_tpl) {?>			<div id="content" class="span10">
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
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-bullhorn"></i> Info</h2>
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
								  <th colspan="5"><a href="#" class="btn btn-primary" ><i class="icon icon-white icon-add"></i> Add Member</a></th>
							  </tr>
							  <tr>
								  <th>Username</th>
								  <th>Date registered</th>
								  <th>Role</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php echo $_smarty_tpl->tpl_vars['test']->value;?>

							
							<tr>
								<td>nama_lengkap</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-success" href="#">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
					<!-- content ends -->
			</div><!--/#content.span10--><?php }} ?>
