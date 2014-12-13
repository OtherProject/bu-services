<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 10:47:40
         compiled from "app/view/account-pabrik.html" */ ?>
<?php /*%%SmartyHeaderCode:700327988545885a130f5c3-74345593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b722b3413575f4a519250604b0b7fb4eedf54a79' => 
    array (
      0 => 'app/view/account-pabrik.html',
      1 => 1416109120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '700327988545885a130f5c3-74345593',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_545885a133cf93_08296470',
  'variables' => 
  array (
    'basedomain' => 0,
    'datapabrik' => 0,
    'pabrik' => 0,
    'val' => 0,
    'lokasi' => 0,
    'data' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545885a133cf93_08296470')) {function content_545885a133cf93_08296470($_smarty_tpl) {?><script type="text/javascript">

  

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
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account/pabrik" enctype="multipart/form-data">

<div class="content-container">
<div class="row">

  
  
    
      
      <div class="col-md-6">
        <div class="portlet">
        
          <div class="portlet-header">

            <h3>
              <i class="fa fa-file"></i>
              Daftar Pabrik <?php echo $_smarty_tpl->tpl_vars['datapabrik']->value['namaIndustri'];?>

            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Lokasi Pabrik</label>
                <?php if ($_smarty_tpl->tpl_vars['pabrik']->value) {?>
                  <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pabrik']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account/pabrik/?id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="form-control"><?php echo $_smarty_tpl->tpl_vars['val']->value['alamatPabrik']['nama_wilayah'];?>
</a><br>
                  <?php } ?>
                <?php }?>
                 
              </div>
            </div>  
            
            
          </div>
        </div>
      </div>
      

      <div class="col-md-6">
        <div class="portlet">
        
          <div class="portlet-header">

            <h3>
              <i class="fa fa-file"></i>
              Tambah Alamat Pabrik
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Provinsi</label>
                  <select class="form-control pilihprov">
                    <option>-Pilih Provinsi-</option>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lokasi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['kode_wilayah'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['getCurrentProv']['kode_wilayah']==$_smarty_tpl->tpl_vars['val']->value['kode_wilayah']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value['nama_wilayah'];?>
</option>

                    <?php } ?>
                  </select>
              </div>
            </div>  
            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kabupaten</label>
                  <select class="form-control pilihkab" name="provinsi">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['getCurrentKab']) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['data']->value['getCurrentKab']['kode_wilayah'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['getCurrentKab']['nama_wilayah'];?>
</option>
                    <?php } else { ?>
                    <option>-Pilih Kabupaten-</option>
                    <?php }?>
                  </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kecamatan</label>
                  <input type="text" name="kecamatan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kecamatan'];?>
" />
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kelurahan</label>
                  <input type="text" name="desa" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['desa'];?>
" />
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kode Pos</label>
                  <input type="text" name="kodePos" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['kodePos'];?>
" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Nama Jalan</label>
                  <input type="text" name="namaJalan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['namaJalan'];?>
" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">No NPPBKC</label>
                  <input type="text" name="noNPPBKC" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['noNPPBKC'];?>
" />
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Upload dokumen NPPBKC (dilampirkan fotocopy NPPBKC)</label>
                  <input type="file" name="fileNPPBKC" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" /><p>Nama Dokumen : <?php echo $_smarty_tpl->tpl_vars['data']->value['files'];?>
</p>
              </div>
            </div>
            <br>
            <input type="hidden" name="indusrtiID" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['indusrtiID'];?>
">
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
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

</form>
</div>
</section><?php }} ?>
