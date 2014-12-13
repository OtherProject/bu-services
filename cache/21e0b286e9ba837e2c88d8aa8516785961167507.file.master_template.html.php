<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 08:41:25
         compiled from "app/view/master_template.html" */ ?>
<?php /*%%SmartyHeaderCode:1393858364544772d9d3aa38-32011618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21e0b286e9ba837e2c88d8aa8516785961167507' => 
    array (
      0 => 'app/view/master_template.html',
      1 => 1416102082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1393858364544772d9d3aa38-32011618',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_544772d9d52763_95413832',
  'variables' => 
  array (
    'basedomain' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544772d9d52763_95413832')) {function content_544772d9d52763_95413832($_smarty_tpl) {?>   <?php echo $_smarty_tpl->getSubTemplate ("meta.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	

	<!-- RUNNING GLOBAL VAR -->
	<script>
		var basedomain = "<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
";
	</script>
	<!-- HEADER -->
	
		<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		
	<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	
	<?php }} ?>
