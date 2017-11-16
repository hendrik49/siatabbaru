<?php $this->beginContent('//layouts/main'); ?>
	
	<div class="span2"> 
		<div class="nav-side-menu" style="padding-top: 40px; height: 94%; background-color: #2e353d;">
			<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
			<div class="menu-list">
					<ul id="menu-content" class="menu-content">
					<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN) : ?>
						<li><a href="<?php echo Yii::app()->baseUrl; ?>/site/dashboard"><i class="fa fa-home fa-lg"></i> Dashboard</a></li>
					<?php endif ?>
						<li><a href="<?php echo Yii::app()->baseUrl; ?>/sumur"><i class="fa fa-bank fa-lg"></i> Air Tanah</a></li>
						<li><a href="<?php echo Yii::app()->baseUrl; ?>/sistembaku/listbaku"><i class="fa fa-bank fa-lg"></i> Air Baku</a></li>
					<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>					
							<li  data-toggle="collapse" data-target="#bidang" class="collapsed">
								<a href="#"><i class="fa fa-building fa-lg"></i> PUS ATAB <span class="arrow"></span></a>
							</li>
						<ul class="sub-menu collapse" id="bidang">
							<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/StrukturOrganisasi">Struktur Organisasi</a></li>
							<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/dbrencana">Program Kerja (DB)</a></li>
							<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/Pegawai">Progress Fisik (eMon)</a></li >
							<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/Pegawai">Pegawai</a></li >
							<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/PPK">Profil PPK</a></li>
							
							<!--<li  data-toggle="collapse" data-target="#perdantu" class="collapsed">
								<a href="<?php echo Yii::app()->baseUrl; ?>/StrukturOrganisasi"><i class="fa fa-sitemap fa-lg"></i> rencana dan TU <span class="arrow"></span></a>
							</li>
							
								<ul class="sub-menu collapse" id="perdantu">
									<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/dbrencana">DT-Base</a></li>
									<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/StrukturOrganisasi">Struktur Organisasi</a></li>
									<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/Pegawai">Profil Pegawai</a></li >
									
								</ul>
							<li  data-toggle="collapse" data-target="#atabbarat" class="collapsed">
								<a href="#"><i class="fa fa-chevron-circle-left fa-lg"></i>Wilayah ATAB<span class="arrow"></span></a>
							</li>
								<ul class="sub-menu collapse" id="atabbarat">
									<li class="active"><a href="#">Rekapitulasi</a></li>
									<li class="active"><a href="#">Detail</a></li>
								</ul>
							<li  data-toggle="collapse" data-target="#konservasi" class="collapsed">
								<a href="#"><i class="fa fa-adjust fa-lg"></i> Konservasi <span class="arrow"></span></a>
							</li>
								<ul class="sub-menu collapse" id="konservasi">
											<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/dataSumur">Air Tanah</a></li>
											<li class="active"><a href="#">Air Baku</a></li>
								</ul>-->
						</ul>  
								
					<?php endif ?>							
						<li><a href="/gis"><i class="fa fa-map-marker fa-lg"></i> Pemetaan</a></li>
						<li><a href="<?php echo Yii::app()->baseUrl; ?>/neraca"><i class="fa fa-picture-o fa-lg"></i> Neraca Air</a></li>
						<li><a href="<?php echo Yii::app()->baseUrl; ?>/Peraturan"><i class="fa fa-globe fa-lg"></i> Peraturan</a></li>
						<li><a href="<?php echo Yii::app()->baseUrl; ?>/Berita"><i class="fa fa-newspaper-o fa-lg"></i> Berita</a></li>
						<!--<li><a href="<?php echo Yii::app()->baseUrl; ?>/Galeri"><i class="fa fa-picture-o fa-lg"></i> Galeri</a></li>-->
						<li  data-toggle="collapse" data-target="#galeriy" class="collapsed">
							<a href="#"><i class="fa fa-picture-o fa-lg"></i> Galeri <span class="arrow"></span></a>
						</li>
							<ul class="sub-menu collapse" id="galeriy">
									<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/Galeri"> Foto Kegiatan</a></li>
									<li class="active"><a href="<?php echo Yii::app()->baseUrl; ?>/Video"> Video Kegiatan</a></li>									
							</ul>
				</ul>
			</div> 
		</div>	
	<!-- sidebar -->
	</div>
	
	<div style="padding: 0 5px 0 5px;"class="span10">
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
			<?php endif?>
		<?php echo $content; ?>
		
	</div><!-- content -->
		

<?php $this->endContent(); ?>

