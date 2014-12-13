<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 18:35:54
         compiled from "view/login.html" */ ?>
<?php /*%%SmartyHeaderCode:58526326454688c1ade04c1-49782684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f46244a254c85aab071d12e09c2c2b21c6d37d10' => 
    array (
      0 => 'view/login.html',
      1 => 1414467631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58526326454688c1ade04c1-49782684',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54688c1adecc75_57727412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54688c1adecc75_57727412')) {function content_54688c1adecc75_57727412($_smarty_tpl) {?><div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Welcome to Beasiswa Unggulan</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Please login with your Username and Password.
					</div>
					<form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
login/registerApp" method="post">
						<fieldset>
							<div class="input-prepend" title="Email" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="email" id="username" type="text" />
							</div>
							<div class="clearfix"></div>
							<div class="input-prepend" title="APP Name" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="appname" id="appname" type="text" />
							</div>
							<div class="clearfix"></div>
							
							<div class="clearfix"></div>
							
							<p class="center span5">							
							<input type="hidden" name="token" value="1" />
							<button type="submit" class="btn btn-primary">Register</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row--><?php }} ?>
