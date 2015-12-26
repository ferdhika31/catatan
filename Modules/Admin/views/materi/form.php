<script type="text/javascript">
	$( "#tgl_materi" ).datepicker({
	  dateFormat: "yy-mm-dd"
	});
</script>
<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php $this->output('menu');?>
			<!-- end: Main Menu -->
						
			<!-- start: Content -->
			<div id="content" class="span10">
			
				<div class="row-fluid">
					<div class="box span12">
						<div class="box-header">
							<h2><i class="icon-edit"></i><?php echo $heading_title;?></h2>
							<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<?php echo $notif;?>
							<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="judul">Judul </label>
										<div class="controls">
											<input type="text" name="judul" value="<?php echo (!empty($materi->judul)) ? $materi->judul : ""; ?>" class="span6 judul" id="judul" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="deskripsi">Deskripsi </label>
										<div class="controls">
											<textarea class="span6 deskripsi" id="deskripsi"><?php echo (!empty($materi->deskripsi)) ? $materi->deskripsi : ""; ?></textarea>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="my_file">File Materi </label>
										<div class="controls">
											<small>* Kosongkan jika tidak diubah</small><br>
											<input type="file" name="my_file" id="my_file">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="tgl_materi">Tanggal Materi </label>
										<div class="controls">
											<?php
												// ke format default datepicker-ui.js
												if(!empty($materi->tgl_materi)):
													$tgl = substr($materi->tgl_materi,0,10);
													$pecah = explode('-', $tgl);
													$tanggal = $pecah[2].'/'.$pecah[1].'/'.$pecah[0];
												endif;
											?>
											<input type="text" class="input-xlarge datepicker" value="<?php echo (!empty($materi->tgl_materi)) ? $tanggal : ""; ?>" id="tgl_materi" name="tgl_materi" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="matkul">Mata Kuliah</label>
										<div class="controls">
											<select name="matkul">
												<?php
												if(!empty($matkuls)):
													foreach ($matkuls as $matkul):
														$smt = isset($materi->matkul_id) ? $materi->matkul_id : '';
														$pilih = ($matkul->matkul_id==$smt) ? ' selected': '';
												?>
												<option<?php echo $pilih;?> value="<?php echo $matkul->matkul_id;?>">
													<?php echo $matkul->nama_matkul;?>
												</option>
												<?php
													endforeach;
												else:
												?>
												<option>-None-</option>
												<?php
												endif;
												?>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="tipe_materi">Tipe Materi</label>
										<div class="controls">
											<select name="tipe_materi">
												<option value="praktek"<?php echo (!empty($materi)) ? ($materi->tipe_materi=="praktek") ? " selected" : "" : ""; ?>>Praktek</option>
												<option value="teori"<?php echo (!empty($materi)) ? ($materi->tipe_materi=="teori") ? " selected" : "" : ""; ?>>Teori</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="minggu">Minggu Ke</label>
										<div class="controls">
											<select name="minggu">
												<?php
												if(!empty($minggu)):
													foreach ($minggu as $minggu):
														$smt = isset($materi->minggu_id) ? $materi->minggu_id : '';
														$pilih = ($minggu->minggu_id==$smt) ? ' selected': '';
												?>
												<option<?php echo $pilih;?> value="<?php echo $minggu->minggu_id;?>">
													<?php echo $minggu->minggu;?>
												</option>
												<?php
													endforeach;
												else:
												?>
												<option>-None-</option>
												<?php
												endif;
												?>
											</select>
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" class="btn btn-primary" name="oke" value="Simpan">
										<a href="<?php echo $this->location('admin/materi');?>"><button class="btn">Batal</button></a>
									</div>
								</fieldset>
							</form>
						</div>
					</div><!--/span-->

				</div><!--/row-->
					
			</div>
			<!-- end: Content -->
				
		</div><!--/fluid-row-->
				
		
		<div class="clearfix"></div>