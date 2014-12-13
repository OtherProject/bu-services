<?php /* Smarty version Smarty-3.1.15, created on 2014-12-08 17:38:45
         compiled from "app/view/register.html" */ ?>
<?php /*%%SmartyHeaderCode:57728347554484f0b5afd00-47394875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2676ac70db986ec40aa5c8c2f0016f17a3a1db61' => 
    array (
      0 => 'app/view/register.html',
      1 => 1418034169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57728347554484f0b5afd00-47394875',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54484f0b6dd728_95840940',
  'variables' => 
  array (
    'basedomain' => 0,
    'data' => 0,
    'captcha' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54484f0b6dd728_95840940')) {function content_54484f0b6dd728_95840940($_smarty_tpl) {?><br>
<section>
    <div class="container">                
        <h2 align="center">Register Akun</h2>
        <p class="lead">&nbsp;</p>
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
register/save">

<div class="content-container">
<div class="row">

  <div class="col-md-12">
    <div class="col-md-2"></div>
   <div class="col-md-8">
        <div class="portlet">
        
          <div class="portlet-header">

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-6">
              <div class="form-group">
              <label for="text-input">Nama Depan</label>
                  <input type="text" name="namaDepan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['merek'];?>
" data-required="true" />
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
              <label for="text-input">Nama Belakang</label>
                  <input type="text" name="namaBelakang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['merek'];?>
" data-required="true" />
              </div>
            </div>  
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Instansi</label>
                  <input type="text" name="instansi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['produsen'];?>
" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Alamat</label>
                  <input type="text" name="alamat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['jenis'];?>
" />
              </div>
            </div>

            
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">No Telepon</label>
                  <input type="text" name="noTelepon" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kataPromotif'];?>
" />
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Alamat Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Nama Aplikasi</label>
                  <input type="text" name="appName" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
             <?php echo $_smarty_tpl->tpl_vars['captcha']->value;?>

              <br>
              <button id="btn-dis" class="btn btn-info" type="submit">
              <i class="fa fa-save"></i>
              Simpan Data
              </button>
              <button id="btn-dis" class="btn btn-warning" type="submit">
              <i class="fa fa-save"></i>
              Reset
              </button>
              </div>
            </div>
            
          </div>


        </div>
      </div>

      
      
      </div>
    <div class="col-md-2"></div>
  </div>

  
      
</div>

</form>
    </div>
    
</section> 

<?php }} ?>
