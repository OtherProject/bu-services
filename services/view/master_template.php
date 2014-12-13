<?php
include 'meta.php';
?>
	<!-- RUNNING GLOBAL VAR -->
	<script>
		var basedomain = "<?=$basedomain?>";
	</script>
	
	<?php 
	if ($this->isUserOnline())include 'header.php';
	?>
	<!-- HEADER -->
    
	<div class="container-fluid">
		<div class="row-fluid">
		
	<?php 
	if ($this->isUserOnline())include 'menu.php';
	?>
	<?php 
	if ($this->isUserOnline())include 'alert_statusjavascript.php';
	?>
	<?php
	if ($this->isUserOnline()){
	?>
			<?=$content?>
	
	</div><!--/fluid-row-->
	<hr/>
		
	<?php
	}else{
	
	echo $content;
	?>
	</div><!--/fluid-row-->
	</div><!--/.fluid-container-->
	<?php
	}
	?>
		

	
	<!-- FOOTER -->
    
	<?php if ($this->isUserOnline())include 'modal.php';?>
	<?php include 'footer.php';?>