	<body class="">
		<div id="root" class="page">
			<header class="Header">
				<div class="container">
					<?php $this->output('menu');?>

					<div class="Banner">
						<h1 class="Banner__heading utility-center">
							Semua Mata Kuliah
						</h1>
					</div>

				</div>
			</header>

			<!-- Mau belajar apa hari ini? -->
			<div class="container section">

			<?php
				if(empty($matkul)):
			?>
				<div class="BlockMessage BlockMessage--With-Spacing">
				Tidak ada mata kuliah.
				</div>
			<?php
				else:
			?>
				<div class="Card-Collection">
					<?php
						foreach ($matkul as $temp):
					?>
					<div class="Card">
						<span class="Card__difficulty">Semester <?php echo $temp['semester'];?></span>
						<span class="Card__updated-status Label Label--x-small"><?php echo $temp['tipe_materi'];?></span>

						<div class="Card__image">
							<a href="<?php echo $this->location('matkul/detail/'.$temp['id_matkul'].'-'.$temp['tipe_materi']);?>">
								<img src="<?php echo $asset."img/".$temp['cover'];?>" class="Card__image" alt="DDP">
								<div class="Card__overlay">
									
								</div>
							</a>
						</div>

						<div class="Card__details">
							<h3 class="Card__title">
								<a href="<?php echo $this->location('matkul/detail/'.$temp['id_matkul'].'-'.$temp['tipe_materi']);?>">
									<?php echo $temp['nama_matkul'];?>
								</a>
							</h3>

							<div class="Card__count">
								<?php echo $temp['jumlah'];?> <span class="utility-muted">Materi</span>
							</div>
						</div>
					</div>
					<?php
						endforeach;
					endif;
					?>

					<div class="pagination">
					<?php if($pageLinks):?>
					    <ul>
					        <?php foreach($pageLinks as $paging):?>
					        	<?php
					        	$aktif = (strip_tags($paging)==$hal) ? 'active' : '';
					        	?>
					            <li class="<?php echo $aktif;?>"><?php echo $paging;?></li>
					        <?php endforeach;?>
					    </ul>
					<?php endif;?>
					</div>

				</div>

			</div>
			<!-- end of mau belajar apa -->
		</div>
