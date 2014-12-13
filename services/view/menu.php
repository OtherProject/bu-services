	<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="<?=$basedomain;?>dashboard"><i class="icon icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<!--<li><a class="ajax-link" href="<?=$basedomain;?>slideshow"><i class="icon icon-black icon-image"></i><span class="hidden-tablet"> SlideShow</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>info"><i class="icon-bullhorn"></i><span class="hidden-tablet"> Info</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>event"><i class="icon-film"></i><span class="hidden-tablet"> Event</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>about"><i class="icon icon-black icon-book"></i><span class="hidden-tablet"> About</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>input"><i class="icon icon-black icon-tag"></i><span class="hidden-tablet"> Input</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>rekap"><i class="icon icon-black icon-cart"></i><span class="hidden-tablet"> Rekap</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>download"><i class="icon icon-black icon-comment"></i><span class="hidden-tablet"> Download</span></a></li>
						<li><a class="ajax-link" href="<?=$basedomain;?>pendaftar"><i class="icon icon-black icon-user"></i><span class="hidden-tablet"> List Pendaftar</span></a></li>-->
						<?php
						if ($_SESSION['user']['usertype']==1){
						?>
						
						<li><a class="ajax-link" href="<?=$basedomain;?>member"><i class="icon icon-black icon-users"></i><span class="hidden-tablet"> User Member</span></a></li>

						
						<?php } ?>
						
						<li><a class="ajax-link" href="<?=$basedomain;?>review"><i class="icon icon-black icon-tag"></i><span class="hidden-tablet"> Data review</span></a></li>
						<!--<li><a class="ajax-link" href="ui.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a class="ajax-link" href="form.php"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a class="ajax-link" href="chart.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a class="ajax-link" href="typography.php"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						<li><a class="ajax-link" href="gallery.php"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li class="nav-header hidden-tablet">Sample Section</li>
						<li><a class="ajax-link" href="table.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a class="ajax-link" href="calendar.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a class="ajax-link" href="grid.php"><i class="icon-th"></i><span class="hidden-tablet"> Grid</span></a></li>
						<li><a class="ajax-link" href="file-manager.php"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="tour.php"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
						<li><a class="ajax-link" href="icon.php"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>
						<li><a href="error.php"><i class="icon-ban-circle"></i><span class="hidden-tablet"> Error Page</span></a></li>
						<li><a href="login.php"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>-->
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div><!--/.well -->
			</div><!--/span-->