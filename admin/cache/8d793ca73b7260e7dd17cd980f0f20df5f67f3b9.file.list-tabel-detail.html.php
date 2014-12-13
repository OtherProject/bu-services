<?php /* Smarty version Smarty-3.1.15, created on 2014-12-09 21:48:58
         compiled from "view/tabel/list-tabel-detail.html" */ ?>
<?php /*%%SmartyHeaderCode:57473248454870bda4ce0f0-80946914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d793ca73b7260e7dd17cd980f0f20df5f67f3b9' => 
    array (
      0 => 'view/tabel/list-tabel-detail.html',
      1 => 1418088755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57473248454870bda4ce0f0-80946914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabel' => 0,
    'alias' => 0,
    'data' => 0,
    'var' => 0,
    'active' => 0,
    'db' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_54870bda8db429_50328257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54870bda8db429_50328257')) {function content_54870bda8db429_50328257($_smarty_tpl) {?>
<script type="text/javascript">

  

    $(document).on('change', '.pilihprov', function(){


      var id = $(this).val();

      $.post(basedomain+'account/ajax',{kode_wilayah:id}, function(data){

        var html = "";

        if (data.status==true){
          $.each(data.res, function(i,val){

            html += "<option value='"+val.kode_wilayah+"'>"+val.nama_wilayah+"</option>";

          })

          $('.pilihkab').html(html);
        } 
        
      }, "JSON")  

    })
  
</script>

<br>

<section>
    <div class="container">  
      <div class="center">
        <h2>Daftar Field <?php echo $_smarty_tpl->tpl_vars['tabel']->value;?>
</h2>
        <p class="lead">&nbsp;</p>
      </div>

        <form method="post" action="">

          <div class="content-container">

            <div class="row" style="margin-top:10px;">
              <div class="col-md-5">
                <div class="form-group">
                <label for="text-input">Tabel Alias : </label>
                    <input type="text" name="alias" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['alias']->value['alias'];?>
" />
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                <label for="text-input">Field Primary : </label>
                    <input type="text" name="fieldPrimary" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['alias']->value['fieldPrimary'];?>
" />
                </div>
              </div>
              <div class="col-md-10">
                <div class="span6" style="border:1px solid #bbb;border-radius:10px;padding:10px 20px 10px 20px;">
                  <table class="table">
                      
                    <thead>
                    <tr>
                      <th align="center">Field</th>
                      <th align="center">Aktifkan</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
                    <tr>
                      
                      <td><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</td>
                      <td>
                        <input type="checkbox" name="field[]" class="form-control " value="<?php echo $_smarty_tpl->tpl_vars['var']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['active']->value) {?><?php if (in_array($_smarty_tpl->tpl_vars['var']->value,$_smarty_tpl->tpl_vars['active']->value)) {?> checked="checked" <?php }?><?php }?>/>
                      </td>
                      
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            
            <br>
            <a href="javascript:void(0)" onclick="history.back()">
            <button id="btn-dis" class="btn btn-warning" type="button">
            <i class="fa fa-save"></i>
            Kembali
            </button>
            </a>
            <input type="hidden" name="idDatabase" value="<?php echo $_smarty_tpl->tpl_vars['db']->value;?>
">
            <input type="hidden" name="tabel" value="<?php echo $_smarty_tpl->tpl_vars['tabel']->value;?>
">
            <button id="btn-dis" class="btn btn-info" type="submit" name="simpan">
            <i class="fa fa-save"></i>
            Simpan Perubahan
            </button></a>
                
                
          </div>

        </form>
    </div>
</section><?php }} ?>
