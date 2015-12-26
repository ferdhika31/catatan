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
							<h2><i class="icon-align-justify"></i><span class="break"></span><?php echo $heading_title;?></h2>
							<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>	
						<div class="box-content">
							<?php echo $notif;?>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>Kode Mata Kuliah</th>
										<th>Mata Kuliah</th>
										<th>Semester</th>
										<th>Jumlah Materi</th>
										<!-- <th>Aksi</th>                                           -->
									</tr>
								</thead>   
								<tbody>
								<?php
									if(!empty($data)):
										foreach ($data as $data):
								?>
									<tr>
										<td>
											<a href="<?php echo $this->location('admin/materi/matkul/'.$data->matkul_id);?>">
												<?php echo ucwords($data->kode_matkul);?>
											</a>
										</td>
										<td class="center">
											<a href="<?php echo $this->location('admin/materi/matkul/'.$data->matkul_id);?>">
												<?php echo ucwords($data->nama_matkul);?>
											</a>
										</td>
										<td class="center"><?php echo $data->semester;?></td>
										<td class="center"><?php echo count($this->model->m_admin()->semuaMateriMatkul($data->matkul_id));?></td>
										<!-- <td class="center">
											<a class="btn btn-info" href="<?php echo $this->location('admin/materi/matkul/'.$data->matkul_id);?>">
												<i class="icon-eye-open"></i>                                            
											</a>
										</td>  -->                                      
									</tr>
								<?php
										endforeach;
									else:
								?>
									<tr>
										<td colspan="6"><center>Belum ada data.</center></td>                                      
									</tr>
								<?php
									endif;
								?>     
								   
								</tbody>
							</table>

							<!--<?php echo count($data); ?> data mata kuliah dari <?php echo $totalData;?> mata kuliah. -->

							<div class="pagination pagination-centered">
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
					</div><!--/span-->
				</div><!--/row-->
					
			</div>
			<!-- end: Content -->
				
		</div><!--/fluid-row-->
				
		
		<div class="clearfix"></div>