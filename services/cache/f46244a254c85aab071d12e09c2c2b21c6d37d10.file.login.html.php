<?php /* Smarty version Smarty-3.1.15, created on 2014-12-06 07:13:11
         compiled from "view/login.html" */ ?>
<?php /*%%SmartyHeaderCode:210986377754479e6adcf293-28886810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f46244a254c85aab071d12e09c2c2b21c6d37d10' => 
    array (
      0 => 'view/login.html',
      1 => 1416138701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210986377754479e6adcf293-28886810',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54479e6b0336f3_46616138',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54479e6b0336f3_46616138')) {function content_54479e6b0336f3_46616138($_smarty_tpl) {?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
css/Login.css" type="text/css" />
	<div id="login-container">

	
	<div id="login">
		
		<h3>Administrator</h3>

		<h5>Please sign in to get access.</h5>

		<form id="login-form" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
login/local" class="form" method="post">

			<div class="form-group">
				<label for="login-username">Username</label>
				<input type="text" class="form-control" id="login-username" placeholder="Username" name="username">
			</div>

			<div class="form-group">
				<label for="login-password">Password</label>
				<input type="password" class="form-control" id="login-password" placeholder="Password" name="password">
			</div>

			<div class="form-group">
				<input type="hidden" name="token" value="1">
				<button type="submit" id="login-btn" class="btn btn-primary btn-block">Sign In &nbsp; <i class="fa fa-play-circle"></i></button>

			</div>
		</form>


		<!--<a href="javascript:;" class="btn btn-default">Forgot Password?</a>-->

	</div> <!-- /#login -->

	<!--<a href="#styledModal" data-toggle="modal" id="signup-btn" class="btn btn-lg btn-block">
		Create an Account
	</a>-->


</div> <!-- /#login-container -->

<script>
function checkuser(id){
		var new_user = $('#'+id+'').val();

		$.post(basedomain+"login/checkuser", { new_user: new_user},  
			function(result){ 
				
				var newvar = result.status;
				console.log(result.status);
				//if the result is 1  
				if(newvar != true){ 
					$('#help-email').html('<i class="fa fa-check"></i> Email available');
					$('#help-email').css("color","green");
					$('#button').removeAttr("disabled");
				}else{  
					$('#help-email').html('<i class="fa fa-ban"></i> Email arleady exist');
					$('#help-email').css("color","red");
					$('#button').attr("disabled","disabled");
					
				}  
		}, "JSON");
}
</script>

<div id="styledModal" class="modal modal-styled fade">
  <div class="modal-dialog" style="width:400px">
    <div class="modal-content">
	<form id="validate-enhanced" class="form parsley-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
login/register">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Create Admin Account</h3>
      </div>
      <div class="modal-body ">
		<div class="form-group">
		<label for="text-input">Name</label>
			<input type="text" name="name" class="form-control" data-required="true" />
		</div>
		<div class="form-group">
		<label for="text-input">Email</label>
			<input type="text" name="email" id="email" class="form-control" data-required="true" onchange="return checkuser('email')"/>
			<div id="help-email"></div>
		</div>
		
		<div class="form-group">
		<label for="text-input">Password</label>
			<input type="password" name="password" class="form-control" data-required="true"/>
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="button">Submit</button>
      </div>
    </div><!-- /.modal-content -->
	</form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><?php }} ?>
