<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 10:47:45
         compiled from "app/view/account-pelaporan.html" */ ?>
<?php /*%%SmartyHeaderCode:1319540971545ad77bb7b1c2-70974816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '589830117a06bb6c13e4f7aca61723aeccae3d33' => 
    array (
      0 => 'app/view/account-pelaporan.html',
      1 => 1416109148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1319540971545ad77bb7b1c2-70974816',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_545ad77bbb7950_61414795',
  'variables' => 
  array (
    'basedomain' => 0,
    'laporankemasan' => 0,
    'val' => 0,
    'listindustri' => 0,
    'listpabrik' => 0,
    'kemasanedit' => 0,
    'produk' => 0,
    'laporankemasandetail' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545ad77bbb7950_61414795')) {function content_545ad77bbb7950_61414795($_smarty_tpl) {?><script type="text/javascript">

  

    $(document).on('change', '#lokasipabrik', function(){


      var id = $(this).val();

      $.post(basedomain+'account/ajaxPabrik',{kode_wilayah:id}, function(data){

        var html = "";

        if (data.status==true){
          
          var hasil = data.res;
          $('.noNPPBKC').val(hasil.pabrik.noNPPBKC);
          $('.namaJalan').val(hasil.pabrik.namaJalan);
          $('.noTelepon').val(hasil.ind.noTelepon);
          $('.noFax').val(hasil.ind.noFax);
          $('.namaPimpinan').val(hasil.ind.namaPimpinan);
          $('.industriID').val(hasil.ind.id);
          $('.pabrikID').val(hasil.pabrik.id);
          
        }else{
          $('.noNPPBKC').val('');
          $('.namaJalan').val('');
          $('.noTelepon').val('');
          $('.noFax').val('');
          $('.namaPimpinan').val('');
          $('.industriID').val('');
          $('.pabrikID').val('');
        } 
        
      }, "JSON")  

    })
  
</script>

<br>
<section>
    <div class="container">  
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
/account/pelaporan" enctype="multipart/form-data">

<div class="content-container">
<div class="row">

  
  
    
      <h3>Form Pelaporan Kemasan</h3>
      <div class="col-md-12">
        <div class="portlet">
        
          <div class="portlet-header">

            <h3>
              <i class="fa fa-file"></i>
              List Pelaporan
            </h3>

          </div>
          <div class="portlet-content">
        
            <div class="col-sm-12">
              <div class="form-group">
                <?php if ($_smarty_tpl->tpl_vars['laporankemasan']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['laporankemasan']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account/pelaporan/?id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="form-control"><?php echo $_smarty_tpl->tpl_vars['val']->value['merek'];?>
</a><br>
                <?php } ?>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="clearfix"></div>
    <br>
      <div class="col-md-6">
        
        <div class="portlet">
        
          <div class="portlet-header">

            <h3>
              <i class="fa fa-file"></i>
              Informasi Produsen
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-6">
              <div class="form-group">
              <label for="text-input">Nama Produsen / Importir</label>
                  <select class="form-control" name="jenisKelamin">
                    <?php if ($_smarty_tpl->tpl_vars['listindustri']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listindustri']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['namaIndustri'];?>
</option>
                    <?php } ?>
                    <?php }?>
                  </select>
              </div>
            </div>  
            <div class="col-sm-6">
              <div class="form-group">
              <label for="text-input">Lokasi Pabrik</label>
                  <select class="form-control" name="lokasi" id="lokasipabrik">
                    <option value="" >-Pilih Pabrik-</option>
                    <?php if ($_smarty_tpl->tpl_vars['listpabrik']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listpabrik']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value['alamatPabrik']['nama_wilayah'];?>
</option>
                    <?php } ?>
                    <?php }?>
                  </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">No NPPBKC</label>
                  <input type="text" name="noNPPBKC" class="form-control noNPPBKC" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['noNPPBKC'];?>
" data-required="true" disabled/>
              </div>
            </div> 
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Alamat</label>
                  <input type="text" name="namaJalan" class="form-control namaJalan" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['namaJalan'];?>
" data-required="true" disabled/>
              </div>
            </div> 
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">No Telp</label>
                  <input type="text" name="noTelepon" class="form-control noTelepon" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['noTelepon'];?>
" data-required="true" disabled/>
              </div>
            </div> 
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">No Fax</label>
                  <input type="text" name="noFax" class="form-control noFax" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['noFax'];?>
" data-required="true" disabled />
              </div>
            </div> 
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Nama Pemilik/Direktur</label>
                  <input type="text" name="namaPimpinan" class="form-control namaPimpinan" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['namaPimpinan'];?>
" data-required="true" disabled/>
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
              Informasi Produk
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Merek Rokok</label>
                  <select class="form-control" name="merek">
                    <?php if ($_smarty_tpl->tpl_vars['produk']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['produk']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>

                    <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value['merek'];?>
</option>
                    <?php } ?>
                    <?php }?>
                  </select>
              </div>
            </div>  
            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Jenis</label>
                  <select class="form-control" name="jenis">
                    <option value="1" >SKM</option>
                    <option value="2" >SKT</option>
                  </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Isi/Kemasan</label>
                  <select class="form-control" name="isi">
                    <option value="1" >10 bks/slop</option>
                    <option value="2" >SKT</option>
                  </select>
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Bentuk Kemasan</label>
                  <select class="form-control" name="bentuKemasan">
                    <option value="1" >Kotak Persegi Panjang 1</option>
                    <option value="2" >Kotak Slop</option>
                    <option value="3" >Slinder</option>
                  </select>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Jenis Gambar</label>
                  <select class="form-control" name="jenisGambar">
                    <option value="1" >Gambar 1</option>
                    <option value="2" >Gambar 2</option>
                  </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Tulisan peringatan kesehatan</label>
                  <select class="form-control" name="tulisanPeringatan">
                    <option value="1" >Merokok membunuhmu</option>
                    <option value="2" >Gambar 2</option>
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Foto Kemasan Depan</label>
              <?php if ($_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoDepan']) {?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/<?php echo $_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoDepan'];?>
" width="100px"><?php }?>
                  <input type="file" name="fotoDepan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Foto Kemasan Belakang</label>
              <?php if ($_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoBelakang']) {?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/<?php echo $_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoBelakang'];?>
" width="100px"><?php }?>
                  <input type="file" name="fotoBelakang" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Foto Kemasan samping Kanan</label>
              <?php if ($_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoKanan']) {?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/<?php echo $_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoKanan'];?>
" width="100px"><?php }?>
                  <input type="file" name="fotoKanan" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Foto Kemasan samping kiri</label>
              <?php if ($_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoKiri']) {?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/<?php echo $_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoKiri'];?>
" width="100px"><?php }?>
                  <input type="file" name="fotoKiri" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Foto Kemasan atas</label>
              <?php if ($_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoAtas']) {?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/<?php echo $_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoAtas'];?>
" width="100px"><?php }?>
                  <input type="file" name="fotoAtas" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Foto Kemasan bawah</label>
              <?php if ($_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoBawah']) {?>
              <img src="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
public_assets/<?php echo $_smarty_tpl->tpl_vars['laporankemasandetail']->value['fotoBawah'];?>
" width="100px"><?php }?>
                  <input type="file" name="fotoBawah" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['evaluasiInformasi'];?>
" />
              </div>
            </div>
          </div>
        </div>
      </div>


      </div>
      
</div>
<br>
<input type="hidden" name="industriID" value="" class="industriID">
<input type="hidden" name="pabrikID" value="" class="pabrikID">
<button id="btn-dis" class="btn btn-info" type="submit">
      <i class="fa fa-save"></i>
      Simpan Data
      </button>
      <button id="btn-dis" class="btn btn-warning" type="submit">
      <i class="fa fa-save"></i>
      Reset
      </button>
</form>

</div>
</section><?php }} ?>
