<div id="content" class="content">
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Dashboard</a></li>
	</ol>
	<h1 class="page-header mb-3">Dashboard</h1>
	<!-- <div class="d-sm-flex align-items-center mb-3">
		<a href="#" class="btn btn-inverse mr-2 text-truncate" id="daterange-filter">
			<i class="fa fa-calendar fa-fw text-white-transparent-5 ml-n1"></i> 
			<span>1 Jun 2019 - 7 Jun 2019</span>
			<b class="caret"></b>
		</a>
		<div class="text-muted f-w-600 mt-2 mt-sm-0">compared to <span id="daterange-prev-date">24 Mar-30 Apr 2019</span></div>
	</div> -->
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">KAMPUS</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body bg-dark">
					<div class="card border-0 bg-dark text-white mb-3 overflow-hidden">
						<div class="card-body">
							<div class="row">
								<div class="col-xl-7 col-lg-8">
									<div class="mb-3 text-grey">
										<b>PERSENTASE SPAN</b>
										<span class="ml-2">
											<i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="PERSENTASE SPAN, SAS dan POK" data-placement="top" data-content=""></i>
										</span>
									</div>
									<div class="d-flex mb-1">
										<a href="<?php echo base_url('d_span');?>"><h2 class="mb-0"><span data-animation="number" data-value="<?php echo $persentase_span ?>"><?php echo $persentase_span ?></span>%</h2></a>
										<div class="ml-auto mt-n1 mb-n1"><div id="total-sales-sparkline"></div></div>
									</div>
									<div class="mb-3 text-grey">
										<!-- <i class="fa fa-caret-up"></i> <span data-animation="number" data-value="33.21">0.00</span>% compare to last week -->
									</div>
									<div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
										<div class="progress-bar progress-bar-striped rounded-right bg-teal" data-animation="width" data-value="<?php echo $persentase_span ?>%" style="width: 0%"></div>
									</div>
									<hr class="bg-white-transparent-2" />
									<div class="row text-truncate">
										<div class="col-6">
											<div class="f-s-12 text-grey"><b>PERSENTASE SAS</b></div>
											<div class="text-grey">
												<i class=""></i> IPDN
											</div>
											<div class="f-s-18 m-b-5 f-w-600 p-b-1"><a href="<?php echo base_url('d_sas');?>"><span data-animation="number" data-value="<?php echo $persentase_sas ?>"><?php echo $persentase_sas ?></span>%</div>
											<div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
												<div class="progress-bar progress-bar-striped rounded-right bg-yellow" data-animation="width" data-value="<?php echo $persentase_sas ?>%" style="width: 0%"></div>
											</div>
										</div>
										<div class="col-6">
											<div class="f-s-12 text-grey"><b>PERSENTASE POK</b></div>
											<div class="text-grey">
												<i class=""></i> JATINANGOR
											</div>
											<div class="f-s-18 m-b-5 f-w-600 p-b-1"><a href="<?php echo base_url('d_pok');?>"><span data-animation="number" data-value="<?php echo $persentase_pok ?>"><?php echo $persentase_pok ?></span>%</a></div>
											<div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
												<div class="progress-bar progress-bar-striped rounded-right" data-animation="width" data-value="<?php echo $persentase_pok ?>%" style="width: 0%"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-5 col-lg-4 align-items-center d-flex justify-content-center">
									<img src="assets/img/svg/img-1.svg" height="150px" class="d-none d-lg-block" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6">
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">SPAN JATINANGOR</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body bg-dark">
							<div class="card border-0 bg-dark text-white text-truncate mb-3">
								<div class="mb-3 text-grey">
									<b class="mb-3">TOTAL PERSENTASE</b> 
									<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="BIRO KAMPUS JATINANGOR" data-placement="top" data-content="REALISASI SERAPAN ANGGARAN PROGRAM PENDIDIKAN KEPAMONGPRAJAAN IPDN JATINANGOR ." data-original-title="" title=""></i></span>
									<div class="text-grey">
										<i class=""></i> JATINANGOR (SPAN)
									</div>
								</div>
								<div class="d-flex align-items-center mb-1">
									<a href="<?php echo base_url('d_span/biro');?>"><h2 class="text-white mb-0"><span data-animation="number" data-value="<?php echo $persentase_jatinangor[0]->persentase_t ?>"><?php echo $persentase_jatinangor[0]->persentase_t ?></span></h2></a>
									<div class="ml-auto">
										<div id="conversion-rate-sparkline"></div>
									</div>
								</div>
								<br><br>
								<?php
									foreach($biro as $row){
								?>
								<div class="d-flex mb-2">
									<div class="d-flex align-items-center">
										<i class="fa fa-circle text-lime f-s-8 mr-2"></i>
										<?php echo $row->alias; ?>
									</div>
									<div class="d-flex align-items-center ml-auto">
										<!-- <div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="262">0</span>%</div> -->
										<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="<?php echo $row->persentase_t; ?>"><?php echo $row->persentase_t; ?></span></div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-inverse">
						<div class="panel-heading">
							<h4 class="panel-title">Kalender</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative"><div></div></div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card border-0 bg-dark text-white text-truncate mb-3">
						<!-- <div class="card-body">
							<div class="mb-3 text-grey">
								<b class="mb-3">STORE SESSIONS</b> 
								<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Store Sessions" data-placement="top" data-content="Number of sessions on your online store. A session is a period of continuous activity from a visitor." data-original-title="" title=""></i></span>
							</div>
							<div class="d-flex align-items-center mb-1">
								<h2 class="text-white mb-0"><span data-animation="number" data-value="70719">0</span></h2>
								<div class="ml-auto">
									<div id="store-session-sparkline"></div>
								</div>
							</div>
							<div class="mb-4 text-grey">
								<i class="fa fa-caret-up"></i> <span data-animation="number" data-value="9.5">0.00</span>% compare to last week
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-teal f-s-8 mr-2"></i>
									Mobile
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="25.7">0.00</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="53210">0</span></div>
								</div>
							</div>
							<div class="d-flex mb-2">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-blue f-s-8 mr-2"></i>
									Desktop
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="16.0">0.00</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="11959">0</span></div>
								</div>
							</div>
							<div class="d-flex">
								<div class="d-flex align-items-center">
									<i class="fa fa-circle text-aqua f-s-8 mr-2"></i>
									Tablet
								</div>
								<div class="d-flex align-items-center ml-auto">
									<div class="text-grey f-s-11"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="7.9">0.00</span>%</div>
									<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="5545">0</span></div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">NAVIGATION</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body bg-dark">
					<div class="card border-0 bg-dark text-white mb-3">
						<div class="card-body" style="background: no-repeat bottom right; background-image: url(assets/img/svg/img-4.svg); background-size: auto 100%;"></div>
						<div class="widget-list widget-list-rounded inverse-mode">
							<a href="http://ipdn.ac.id/" target="_blank" class="widget-list-item rounded-0 p-t-3">
								<div class="widget-list-media icon">
									<i class="fab fas fa-lg fa-fw  fa-university bg-white text-black"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">IPDN</div>
								</div>
							</a>
							<a href="<?php echo base_url('d_span');?>" class="widget-list-item rounded-0 p-t-3">
								<div class="widget-list-media icon">
									<i class="fab fas fa-lg fa-fw  fa-money-bill-alt bg-green text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Keuangan</div>
								</div>
							</a>
							<a href="#" class="widget-list-item rounded-0 p-t-3">
								<div class="widget-list-media icon">
									<i class="fab fas fa-lg fa-fw fa-building bg-blue text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Kepegawaian</div>
								</div>
							</a>
							<a href="#" class="widget-list-item rounded-0 p-t-3">
								<div class="widget-list-media icon">
									<i class="fab fas fa-lg fa-fw fa-graduation-cap bg-yellow text-white"></i>
								</div>
								<div class="widget-list-content">
									<div class="widget-list-title">Keprajaan</div>
								</div>
							</a>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-xl-4 col-lg-6">
			
		</div> -->
		<div class="col-xl-4 col-lg-6">
			<!-- <div class="card border-0 bg-dark-darker text-white mb-3">
				<div class="card-body" style="background: no-repeat bottom right; background-image: url(assets/img/svg/img-4.svg); background-size: auto 60%;">
					<div class="mb-3 text-grey">
						<b>SALES BY SOCIAL SOURCE</b>
						<span class="text-grey ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Sales by social source" data-placement="top" data-content="Total online store sales that came from a social referrer source."></i></span>
					</div>
					<h3 class="m-b-10">$<span data-animation="number" data-value="55547.89">0.00</span></h3>
					<div class="text-grey m-b-1"><i class="fa fa-caret-up"></i> <span data-animation="number" data-value="45.76">0.00</span>% increased</div>
				</div>
				<div class="widget-list widget-list-rounded inverse-mode">
					<a href="#" class="widget-list-item rounded-0 p-t-3">
						<div class="widget-list-media icon">
							<i class="fab fa-apple bg-indigo text-white"></i>
						</div>
						<div class="widget-list-content">
							<div class="widget-list-title">Apple Store</div>
						</div>
						<div class="widget-list-action text-nowrap text-grey">
							$<span data-animation="number" data-value="34840.17">0.00</span>
						</div>
					</a>
					<a href="#" class="widget-list-item">
						<div class="widget-list-media icon">
							<i class="fab fa-facebook-f bg-blue text-white"></i>
						</div>
						<div class="widget-list-content">
							<div class="widget-list-title">Facebook</div>
						</div>
						<div class="widget-list-action text-nowrap text-grey">
							$<span data-animation="number" data-value="12502.67">0.00</span>
						</div>
					</a>
					<a href="#" class="widget-list-item">
						<div class="widget-list-media icon">
							<i class="fab fa-twitter bg-aqua text-white"></i>
						</div>
						<div class="widget-list-content">
							<div class="widget-list-title">Twitter</div>
						</div>
						<div class="widget-list-action text-nowrap text-grey">
							$<span data-animation="number" data-value="4799.20">0.00</span>
						</div>
					</a>
					<a href="#" class="widget-list-item">
						<div class="widget-list-media icon">
							<i class="fab fa-google bg-red text-white"></i>
						</div>
						<div class="widget-list-content">
							<div class="widget-list-title">Google Adwords</div>
						</div>
						<div class="widget-list-action text-nowrap text-grey">
							$<span data-animation="number" data-value="3405.85">0.00</span>
						</div>
					</a>
					<a href="#" class="widget-list-item p-b-3">
						<div class="widget-list-media icon">
							<i class="fab fa-instagram bg-pink text-white"></i>
						</div>
						<div class="widget-list-content">
							<div class="widget-list-title">Instagram</div>
						</div>
						<div class="widget-list-action text-nowrap text-grey">
							$<span data-animation="number" data-value="0.00">0.00</span>
						</div>
					</a>
				</div>
			</div> -->
		</div>
		<div class="col-xl-4 col-lg-6">
			<!-- <div class="card border-0 bg-dark text-white mb-3">
				<div class="card-body">
					<div class="mb-3 text-grey">
						<b>TOP PRODUCTS BY UNITS SOLD</b>
						<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Top products with units sold" data-placement="top" data-content="Products with the most individual units sold. Includes orders from all sales channels."></i></span>
					</div>
					<div class="d-flex align-items-center m-b-15">
						<div class="widget-img rounded-lg width-30 m-r-10 bg-white p-3">
							<div class="h-100 w-100" style="background: url(assets/img/product/product-8.jpg) center no-repeat; background-size: auto 100%;"></div>
						</div>
						<div class="text-truncate">
							<div>Apple iPhone XR (2019)</div>
							<div class="text-grey">$799.00</div>
						</div>
						<div class="ml-auto text-center">
							<div class="f-s-13"><span data-animation="number" data-value="195">0</span></div>
							<div class="text-grey f-s-10">sold</div>
						</div>
					</div>
					<div class="d-flex align-items-center m-b-15">
						<div class="widget-img rounded-lg width-30 m-r-10 bg-white p-3">
							<div class="h-100 w-100" style="background: url(assets/img/product/product-9.jpg) center no-repeat; background-size: auto 100%;"></div>
						</div>
						<div class="text-truncate">
							<div>Apple iPhone XS (2019)</div>
							<div class="text-grey">$1,199.00</div>
						</div>
						<div class="ml-auto text-center">
							<div class="f-s-13"><span data-animation="number" data-value="185">0</span></div>
							<div class="text-grey f-s-10">sold</div>
						</div>
					</div>
					<div class="d-flex align-items-center m-b-15">
						<div class="widget-img rounded-lg width-30 m-r-10 bg-white p-3">
							<div class="h-100 w-100" style="background: url(assets/img/product/product-10.jpg) center no-repeat; background-size: auto 100%;"></div>
						</div>
						<div class="text-truncate">
							<div>Apple iPhone XS Max (2019)</div>
							<div class="text-grey">$3,399</div>
						</div>
						<div class="ml-auto text-center">
							<div class="f-s-13"><span data-animation="number" data-value="129">0</span></div>
							<div class="text-grey f-s-10">sold</div>
						</div>
					</div>
					<div class="d-flex align-items-center m-b-15">
						<div class="widget-img rounded-lg width-30 m-r-10 bg-white p-3">
							<div class="h-100 w-100" style="background: url(assets/img/product/product-11.jpg) center no-repeat; background-size: auto 100%;"></div>
						</div>
						<div class="text-truncate">
							<div>Huawei Y5 (2019)</div>
							<div class="text-grey">$99.00</div>
						</div>
						<div class="ml-auto text-center">
							<div class="f-s-13"><span data-animation="number" data-value="96">0</span></div>
							<div class="text-grey f-s-10">sold</div>
						</div>
					</div>
					<div class="d-flex align-items-center">
						<div class="widget-img rounded-lg width-30 m-r-10 bg-white p-3">
							<div class="h-100 w-100" style="background: url(assets/img/product/product-12.jpg) center no-repeat; background-size: auto 100%;"></div>
						</div>
						<div class="text-truncate">
							<div>Huawei Nova 4 (2019)</div>
							<div class="text-grey">$499.00</div>
						</div>
						<div class="ml-auto text-center">
							<div class="f-s-13"><span data-animation="number" data-value="55">0</span></div>
							<div class="text-grey f-s-10">sold</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<div class="col-xl-4 col-lg-6">
			<!-- <div class="card border-0 bg-dark text-white mb-3">
				<div class="card-body">
					<div class="mb-3 text-grey">
						<b>MARKETING CAMPAIGN</b>
						<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Marketing Campaign" data-placement="top" data-content="Campaign that run for getting more returning customers."></i></span>
					</div>
					<div class="row align-items-center p-b-1">
						<div class="col-4">
							<div class="height-100 d-flex align-items-center justify-content-center">
								<img src="assets/img/svg/img-2.svg" class="mw-100 mh-100" />
							</div>
						</div>
						<div class="col-8">
							<div class="m-b-2 text-truncate">Email Marketing Campaign</div>
							<div class="text-grey m-b-2 f-s-11">Mon 12/6 - Sun 18/6</div>
							<div class="d-flex align-items-center m-b-2">
								<div class="flex-grow-1">
									<div class="progress progress-xs rounded-corner bg-white-transparent-1">
										<div class="progress-bar progress-bar-striped bg-indigo" data-animation="width" data-value="80%" style="width: 0%"></div>
									</div>
								</div>
								<div class="ml-2 f-s-11 width-30 text-center"><span data-animation="number" data-value="80">0</span>%</div>
							</div>
							<div class="text-grey f-s-11 m-b-15 text-truncate">
								57.5% people click the email
							</div>
							<a href="#" class="btn btn-xs btn-indigo f-s-10 pl-2 pr-2">View campaign</a>
						</div>
					</div>
					<hr class="bg-white-transparent-2 m-t-20 m-b-20" />
					<div class="row align-items-center">
						<div class="col-4">
							<div class="height-100 d-flex align-items-center justify-content-center">
								<img src="assets/img/svg/img-3.svg" class="mw-100 mh-100" />
							</div>
						</div>
						<div class="col-8">
							<div class="m-b-2 text-truncate">Facebook Marketing Campaign</div>
							<div class="text-grey m-b-2 f-s-11">Sat 10/6 - Sun 18/6</div>
							<div class="d-flex align-items-center m-b-2">
								<div class="flex-grow-1">
									<div class="progress progress-xs rounded-corner bg-white-transparent-1">
										<div class="progress-bar progress-bar-striped bg-warning" data-animation="width" data-value="60%" style="width: 0%"></div>
									</div>
								</div>
								<div class="ml-2 f-s-11 width-30 text-center"><span data-animation="number" data-value="60">0</span>%</div>
							</div>
							<div class="text-grey f-s-11 m-b-15 text-truncate">
								+124k visitors from facebook
							</div>
							<a href="#" class="btn btn-xs btn-warning f-s-10 pl-2 pr-2">View campaign</a>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>