<?php /* Smarty version Smarty-3.1.15, created on 2014-12-09 09:00:33
         compiled from "app/view/header.html" */ ?>
<?php /*%%SmartyHeaderCode:885224408546800c5a3dfc2-42790796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e92366fadccd12ed22bfb5c490087f1c092d930b' => 
    array (
      0 => 'app/view/header.html',
      1 => 1418090429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '885224408546800c5a3dfc2-42790796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_546800c5ae2685_34361611',
  'variables' => 
  array (
    'basedomain' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546800c5ae2685_34361611')) {function content_546800c5ae2685_34361611($_smarty_tpl) {?>
<body class="homepage">

    <header id="header">
        <div class="top-bar">
             
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
">
                    	
                    	Services Portal
                    </a>
                </div>
               
				<div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        
                        <!--<li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about_us">About Us</a></li>-->
						
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
home">Home</a></li>
                        
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
news">Dokumentasi</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
contact">Contact Us</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
                        
                        <li class="dropdown"><a href="#"  class="dropdown-toggle" data-toggle="dropdown"> Account <i class="fa fa-angle-down"></i></a>
							 <ul class="dropdown-menu">
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account"><?php echo $_smarty_tpl->tpl_vars['user']->value['default']['namaDepan'];?>
</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
logout.php">Logout</a></li>
                               
                            </ul>
						
						</li>

						 
                        <?php } else { ?>
                        
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
login">Login</a></li>
                        <?php }?>                   
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header--><?php }} ?>
