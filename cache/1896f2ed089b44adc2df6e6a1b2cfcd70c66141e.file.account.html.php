<?php /* Smarty version Smarty-3.1.15, created on 2014-12-09 08:56:26
         compiled from "app/view/account.html" */ ?>
<?php /*%%SmartyHeaderCode:152410488554586c37b3f2a2-85744477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1896f2ed089b44adc2df6e6a1b2cfcd70c66141e' => 
    array (
      0 => 'app/view/account.html',
      1 => 1418090183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152410488554586c37b3f2a2-85744477',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54586c37b6cc61_51358442',
  'variables' => 
  array (
    'basedomain' => 0,
    'user' => 0,
    'rule' => 0,
    'val' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54586c37b6cc61_51358442')) {function content_54586c37b6cc61_51358442($_smarty_tpl) {?><br>


<section>
    <div class="container">  
<div class="content-container">
<div class="row">

  <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account">
  <div class="col-md-6">
        <div class="portlet">
        
          <div class="portlet-header">

            <h3>
              <i class="fa fa-file"></i>
              Penanggung jawab account
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-6">
              <div class="form-group">
              <label for="text-input">Nama Depan</label>
                  <input type="text" name="namaDepan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['namaDepan'];?>
" data-required="true" />
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
              <label for="text-input">Nama Belakang</label>
                  <input type="text" name="namaBelakang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['namaBelakang'];?>
" data-required="true" />
              </div>
            </div>  
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Instansi</label>
                  <input type="text" name="instansi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['instansi'];?>
" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['alamat'];?>
" />
              </div>
            </div>

            
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">No Telepon</label>
                  <input type="text" name="noTelepon" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['noTelepon'];?>
" />
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Alamat Email : </label>
                  <strong><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</strong>
              </div>
            </div>
            <div class='span5'><hr></div>
            <button id="btn-dis" class="btn btn-info" type="submit">
            <i class="fa fa-save"></i>
            Simpan Data
            </button>
          </div>

        </div>
          
        
      </div>
      </form>
    
      <div class="col-md-6">
        <div class="portlet">
        
          <div class="portlet-header">

            <h3>
              <i class="fa fa-file"></i>
              Data Aplikasi
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Nama Aplikasi</label>
                  <input type="text" name="namaIndustri" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['appName'];?>
" disabled />
              </div>
            
            </div>
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Token</label>
              <br>
                  <span><?php echo $_smarty_tpl->tpl_vars['user']->value['token'];?>
 </span>
              </div>
            
            </div>
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Secret Key</label>
              <br>
                  <span><?php echo $_smarty_tpl->tpl_vars['user']->value['secretKey'];?>
 </span>
              </div>
                  
              </div>

            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">API Verified</label>
              <br>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rule']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['val']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
                  <span><?php echo $_smarty_tpl->tpl_vars['var']->value['alias'];?>
 </span><br>
                  <?php } ?>
                  <?php } ?>
              </div>
                  
              </div>

            </div>
        </div>
    </div>  
    
      </div>
      <br>

</div>
</div>
</section>

<?php }} ?>
