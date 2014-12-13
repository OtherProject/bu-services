<?php /* Smarty version Smarty-3.1.15, created on 2014-11-16 10:48:14
         compiled from "app/view/account-pelaporan-nikotin.html" */ ?>
<?php /*%%SmartyHeaderCode:6305438255461620dc646a8-26012140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99f0bed9e6211deb59e9e56abb56fc619dfc6fbd' => 
    array (
      0 => 'app/view/account-pelaporan-nikotin.html',
      1 => 1416109690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6305438255461620dc646a8-26012140',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5461620dce43b6_44453643',
  'variables' => 
  array (
    'basedomain' => 0,
    'laporannikotin' => 0,
    'val' => 0,
    'listindustri' => 0,
    'listpabrik' => 0,
    'kemasanedit' => 0,
    'lab' => 0,
    'produk' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5461620dce43b6_44453643')) {function content_5461620dce43b6_44453643($_smarty_tpl) {?>
<script type="text/javascript">

  

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

    $(document).on('change', '#lab', function(){


      var id = $(this).val();

      $.post(basedomain+'account/ajaxLab',{kode_wilayah:id}, function(data){

        var html = "";

        if (data.status==true){
          
          var hasil = data.res;
          $('.alamat').val(hasil.alamat);
          $('.penanggungjawab').val(hasil.penanggungjawab);
          
          
          
        }else{
          $('.alamat').val('');
          $('.penanggungjawab').val('');
          
        } 
        
      }, "JSON")  

    })
  
</script>
<br>
<section>
    <div class="container"> 
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account/pelaporan_nikotin" enctype="multipart/form-data">

<div class="content-container">
<div class="row">

  
  
    
      <h3>Form Pelaporan Nikotin dan Tar</h3>
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
                <?php if ($_smarty_tpl->tpl_vars['laporannikotin']->value) {?>
                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['laporannikotin']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
account/pelaporan_nikotin/?id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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
                  <select class="form-control" name="jenisKelamin" id="lokasipabrik">
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
" data-required="true" />
              </div>
            </div> 
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Alamat</label>
                  <input type="text" name="namaJalan" class="form-control namaJalan" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['namaJalan'];?>
" data-required="true" />
              </div>
            </div> 
            
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Nama Pemilik</label>
                  <input type="text" name="namaPimpinan" class="form-control namaPimpinan" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['namaPimpinan'];?>
" data-required="true" />
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
              Informasi Laboratorium Penguji
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-12">
              <div class="form-group">
              <label for="text-input">Nama Laboratorium</label>
                  <select class="form-control" name="labID" id="lab">
                    <option value="" >-Pilih Lab-</option>
                    <?php if ($_smarty_tpl->tpl_vars['lab']->value) {?>
                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lab']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value['nama'];?>
</option>
                    <?php } ?>
                    <?php }?>
                  </select>
              </div>
            </div>  
            
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Alamat</label>
                  <input type="text" name="alamat" class="form-control alamat" value="" data-required="true" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Penanggungjawab</label>
                  <input type="text" name="penanggungjawab" class="form-control penanggungjawab" value="" data-required="true" />
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
              Informasi Sampel
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
            <div class="col-sm-6">
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
                    <option value="2" >SKK 2</option>
                  </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Isi/Kemasan</label>
                  <select class="form-control" name="isiKemasan">
                    <option value="1" >12</option>
                    
                  </select>
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kode Produksi</label>
                  <input type="text" name="kodeProduksi" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['kodeProduksi'];?>
" />
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
              <label for="text-input">Nomor/Kode Sampel</label>
                  <input type="text" name="kodeSample" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['kodeSample'];?>
" />
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
              Hasil Pengujian
            </h3>

          </div> <!-- /.portlet-header -->
        
          <div class="portlet-content">
        
           
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Nomor Lap Hasil Uji/Sertifikat</label>
                  <input type="text" name="noSertifikat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['noSertifikat'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Tanggal pengujian</label>
                  <input type="text" name="tanggalUji" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['tanggalUji'];?>
" />
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kadar Nikotin</label>
                  <input type="text" name="kadarNikotin" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['kadarNikotin'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kadar Tar Coresta/Tar ISO</label>
                  <input type="text" name=" kadarTar" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['kadarTar'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Kadar Tar SNI/ Tar Kretek</label>
                  <input type="text" name="kadarKretek" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['kadarKretek'];?>
" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="text-input">Upload sertifikat pengujian</label>
                  <input type="file" name="sertifikat" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['kemasanedit']->value['sertifikat'];?>
" />
              </div>
            </div>
          </div>
        </div>
      </div>
      
      </div>
      
</div>
<br>
<section>
    <div class="container">  
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
</section>
<?php }} ?>
