<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 10:30:20
         compiled from "app/view/login.html" */ ?>
<?php /*%%SmartyHeaderCode:883723553546819eaecf5f9-36944294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32e4621e5a164d58af600a450699743a7e5a6ced' => 
    array (
      0 => 'app/view/login.html',
      1 => 1416108618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '883723553546819eaecf5f9-36944294',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_546819eaee12f7_98819915',
  'variables' => 
  array (
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546819eaee12f7_98819915')) {function content_546819eaee12f7_98819915($_smarty_tpl) {?><section id="contact-info">
        <div class="center">                
            <h2>Login Form</h2>
            <p class="lead">&nbsp;</p>
            <!-- FORM BUAT TAMBAH -->   
        <div class="form">
                <div class="form-bg">
                    <div class="form-style-1 form-wrapper" id="form-1">                     
                        <div class="popup-content">
                            <div class="formLogin">
                                
                                <div class="contentLogin" align="center">
                                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
login/doLogin">
                                        <table class="tableForm">
                                            <tr style="margin-bottom:10px;">
                                                <td>Email</td><td>:</td>
                                                <td><input type="text" name="email" value="" size="20" id="username"/> 
                                            </tr>
                                            <tr>
                                                <td>Password</td><td>:</td>
                                                <td><input type="password" name="password" value="" size="20" id="password"/>
                                            </tr>                                
                                            <tr>
                                                <td colspan="3" align="right">   
                                                <button id="btn-dis" class="btn btn-info" type="submit">
                                                    <i class="fa fa-save"></i>
                                                    Login
                                                    </button>   
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
register"><button id="btn-dis" class="btn btn-success" type="button">
                                                    <i class="fa fa-save"></i>
                                                    Register
                                                    </button></a>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
"><button id="btn-dis" class="btn btn-warning" type="submit">
                                                    <i class="fa fa-save"></i>
                                                    Cancel
                                                    </button></a>

                                                </td>
                                            </tr>
                                        </table>
                                     </form>
                                </div>
                            </div>                                              
                        </div>
                    </div>
                    <!--ENDS Popup Type 1-->
                </div>
                <!--ENDS Popup Background-->
        </div>
        </div>
        
    </section>


        <?php }} ?>
