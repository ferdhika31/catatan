<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php $this->output('menu');?>
			<!-- end: Main Menu -->
						
			<!-- start: Content -->
			<div id="content" class="span10">
			
			<div class="row-fluid">
				Selamat datang <?php echo $this->session->getValue('nama');?>. 
			</div>
						
			<!-- <div class="row-fluid">
				
				<div class="span3 smallstat box mobileHalf" ontablet="span6" ondesktop="span3">
					<div class="boxchart-overlay blue">
						<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
					</div>	
					<span class="title">Clients</span>
					<span class="value">4 589</span>
				</div>
				
				<div class="span3 smallstat box mobileHalf" ontablet="span6" ondesktop="span3">
					<div class="boxchart-overlay red">
						<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
					</div>	
					<span class="title">Transactions</span>
					<span class="value">789</span>
				</div>
				
				<div class="span3 smallstat box mobileHalf noMargin" ontablet="span6" ondesktop="span3">
					<i class="icon-download-alt green"></i>
					<span class="title">Income</span>
					<span class="value">$1 999,99</span>
				</div>
				
				<div class="span3 smallstat mobileHalf box" ontablet="span6" ondesktop="span3">
					<i class="icon-money yellow"></i>
					<span class="title">Account</span>
					<span class="value">$19 999,99</span>
				</div>
			
			</div>	

			<div class="row-fluid">
				
				<div class="box span8" ontablet="span12" ondesktop="span8">
					<div class="box-header">
						<h2>Materi</h2>
					</div>
					<div class="box-content" style="height:308px">
						<div id="stats-chart2" class="span12" style="height:308px"></div>
					</div>	
				</div>	
				
				<div class="box span4 noMargin" ontablet="span12" ondesktop="span4">
					<div class="box-header">
						<h2><i class="icon-check"></i>To Do List</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="todo">
							<ul class="todo-list">
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">Windows Phone 8 App</span> 
									<span class="label label-important">today</span>					
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">New frontend layout</span>
									<span class="label label-important">today</span>
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">Hire developers</span>
									<span class="label label-warning">tommorow</span>
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">Windows Phone 8 App</span>
									<span class="label label-warning">tommorow</span>
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">New frontend layout</span>
									<span class="label label-success">this week</span>
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">Hire developers</span>
									<span class="label label-success">this week</span>
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">New frontend layout</span>
									<span class="label label-info">this month</span>
								</li>
								<li>
									<span class="todo-actions">
										<a href="#"><i class="icon-check-empty"></i></a>
									</span>
									<span class="desc">Hire developers</span>
									<span class="label label-info">this month</span>
								</li>
							</ul>
						</div>	
					</div>
				</div> -->
		
			</div>
		
					
			</div>
			<!-- end: Content -->
				
				</div><!--/fluid-row-->
				
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>
		
		<div class="clearfix"></div>