<!DOCTYPE html>
<html>
<head>
	<!--title-->
	<title><?php echo $page_title; ?> </title>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />
	<!--favicon-->
<!-- 	<link rel="shortcut icon" type="text/css" href="<?php echo base_url().'public/img/favicon.ico';?>">
 -->	<!--bootstrap-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/bootstrap/dist/css/bootstrap.min.css';?>" />
	<!--bootstrap-toggle-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/bootstrap-toggle/css/bootstrap-toggle.min.css';?>" />
	<!--keen-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/css/keen-dashboards.css';?>" />
	<!--select2-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/select2/css/select2.min.css';?>" />
	<!--dataTables-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/dataTables/css/jquery.dataTables.min.css';?>" />
	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/css/custom.css';?>" />
	<!-- Bootstrap DatePicker css and Js -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/bootstrap-datepicker/css/bootstrap-datepicker.css';?>";">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/lib/bootstrap-datepicker/css/bootstrap-datepicker3.css';?>";">

</head>
	<body class="application">
	<!--navbar-->
	  	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			    <div class="container-fluid">
				      <div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				          <span class="sr-only">Toggle navigation</span>
				          <span class="icon-bar"></span>
				          <span class="icon-bar"></span>
				          <span class="icon-bar"></span>
				        </button>
		        		<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-dashboard"></span></a>
		        		<a class="navbar-brand" href="#">ADT Dashboard</a>
				      </div>
			      <div class="navbar-collapse collapse">
			        <ul class="nav navbar-nav navbar-left">
			          <li><a href="#">PATIENTS<span class="glyphicon glyphicon-menu-down"></span></a> 
			          </li>
			          <li><a href="#">COMMODITIES</a></li>
			        </ul>

			        <nav class="collapse navbar-collapse" id="filter-navbar"> 
						<!--filter_frm-->
						<div class="nav navbar-nav navbar-form navbar-right">
							<!--clear_filter_btn-->
							<button type="button" class="btn btn-danger btn-md" id="clear_filter_btn">
								<span class="glyphicon glyphicon-refresh"></span> Reset</button>
							</button>
						  	<!--filter_modal-->
							<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#filterModal">
								<span class="glyphicon glyphicon-filter"></span> Filter</button>
							</button>
						</div>
			            
					</nav>
			      </div>
			    </div>
  		</div>
	 <!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="patient_details">
			<div class="container-fluid">
				<!--toprow-->
				<div class="row">
					<!--patients_enrolled_in_care-->
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS ENROLLED IN CARE
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="enrolled_in_care"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS ENROLLED IN CARE
							</div>
						</div>
					</div>
					<!--patients_started_on_art-->
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS ENROLLED IN ART
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_route">
										<div class="container-fluid">
											<div class="row">
												<div id="enrolled_in_art">
													<!-- enrolled in art chart -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS ENROLLED IN ART
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS CUMMULATIVE NUMBER TO DATE
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_cumm_number"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS CUMMULATIVE NUMBER TO DATE
							</div>
						</div>
					</div>
				</div>
				<!-- end toprow -->
				<!-- Start second row -->
				<div class="row">
					<!--patients_cummulative number to date-->
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS ACTIVE BY REGIMEN
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_active_byregimen"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS ACTIVE BY REGIMEN
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS EXPECTED VISITS
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_expected_visits"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS EXPECTED VISITS
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS CHANGED REGIMENS
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_changed_regimen"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS CHANGED REGIMENS
							</div>
						</div>
					</div>
				</div>
				<!-- end of second row -->
				<!-- Start third row -->
				<div class="row">
					<!--patients_cummulative number to date-->
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS EARLY WARNING INDICATORS
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_ealry_warn_indic"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS EARLY WARNING INDICATORS
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS ADHRENCE
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_adherence"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS ADHRENCE
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS NON ADHRENCE
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_non_adhrence"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS NON ADHRENCE
							</div>
						</div>
					</div>
				</div>
				<!-- end of third row -->
				<!-- Start third row -->
				<div class="row">
					<!--patients_cummulative number to date-->
					<div class="col-sm-12">
						<div class="chart-wrapper">
							<div class="chart-title">
								PATIENTS NON ADHERENCE
							</div>
							<div class="chart-stage">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_atc_code">
										<div class="container-fluid">
											<div class="row">
												<div id="patient_lost_to_follow_up"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> PATIENTS NON ADHERENCE
							</div>
						</div>
					</div>
					
				</div>
				<!-- end of third row -->
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="premises">
			<div class="container-fluid">
				<!--toprow-->
				<div class="row">
					<!--county_chart-->
					<div class="col-sm-6">
						<div class="chart-wrapper">
							<div class="chart-title">
								County
							</div>
							<div class="chart-stage">
								<ul class="nav nav-tabs navbar-right" role="tablist" id="county_tabs">
								    <li role="presentation" class="active">
								    	<a href="#summary_county" aria-controls="summary_county" role="tab" data-toggle="tab">Summary</a>
								    </li>
								    <li role="presentation">
								    	<a href="#list_county" aria-controls="list_county" role="tab" data-toggle="tab">Data List</a>
								    </li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_county">
										<div class="container-fluid">
											<div class="row">
												<div id="county_chart"></div>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="list_county">
										<div class="container-fluid">
											<div class="row">
												<table id="county_table" class="display" cellspacing="0" width="100%"></table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> Counties
							</div>
						</div>
					</div>
					<!--cadre_chart-->
					<div class="col-sm-6">
						<div class="chart-wrapper">
							<div class="chart-title">
								Cadre
							</div>
							<div class="chart-stage">
								<ul class="nav nav-tabs navbar-right" role="tablist" id="cadre_tabs">
								    <li role="presentation" class="active">
								    	<a href="#summary_cadre" aria-controls="summary_cadre" role="tab" data-toggle="tab">Summary</a>
								    </li>
								    <li role="presentation">
								    	<a href="#list_cadre" aria-controls="list_cadre" role="tab" data-toggle="tab">Data List</a>
								    </li>
								</ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="summary_cadre">
										<div class="container-fluid">
											<div class="row">
												<div id="cadre_chart"></div>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane" id="list_cadre">
										<div class="container-fluid">
											<div class="row">
												<table id="cadre_table" class="display" cellspacing="0" width="100%"></table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="chart-notes">
								<span class="heading"></span> Cadres
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--footer-->
	<hr>
	<p class="small text-muted">Built by <a href="http://www.clintonhealthaccess.org" target="_blank">CHAI</a></p>
	<!-- filter_modal -->
	<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
				<div class="modal-header alert-success">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="filterModalLabel"><span class="glyphicon glyphicon-filter"></span> Dashboard Filter</h4>
				</div>
	      		<div class="modal-body">
					<div id="filter_frm" class="form-horizontal">
						<div class="auto_filter"></div><!--auto_filter-->
						<div class="form-group">
							<label for="metric" class="col-sm-4 control-label">SUB COUNTY</label>
							<div class="col-sm-8">
								<select class="form-control metric" id="metric">
		                            <option value="subcounty" selected="selected">Sub County</option>
		                        </select>
							</div>
						</div>
						<!--common_filters-->
						<div class="form-group">
							<label for="order" class="col-sm-4 control-label">COUNTY</label>
							<div class="col-sm-8">
								<select class="order form-control" id="order">
									<option value="counry" selected="selected">County</option>
								</select>
							</div>
						</div>
						<!-- Facility Name -->
						<div class="form-group">
							<label for="order" class="col-sm-4 control-label">FACILITY</label>
							<div class="col-sm-8">
								<select class="order form-control" id="order">
									<option value="counry" selected="selected">Facility</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="limit" class="col-sm-4 control-label">ENROLLMENT DATE</label>
							<div class="col-sm-8">
								<div class="input-daterange input-group" id="datepicker">
								    <input type="text" class="input-sm form-control" name="start" />
								    <span class="input-group-addon">to</span>
								    <input type="text" class="input-sm form-control" name="end" />
								</div>
							</div>
						</div>
					</div>
	      		</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" id="filter_btn"><i class="glyphicon glyphicon-filter" aria-hidden="true"></i> Filter</button>
				</div>
	    	</div>
		</div>
	</div>

	<!--jquery-->
	<script type="text/javascript" src="<?php echo base_url().'public/lib/jquery/dist/jquery.min.js';?>"></script>
	<!--highcharts-->
	<script src="<?php echo base_url().'public/lib/highcharts/highcharts.js';?>"></script>
	<script src="<?php echo base_url().'public/lib/highcharts/exporting.js';?>"></script>
	<script src="<?php echo base_url().'public/lib/highcharts/drilldown.js';?>"></script>
	<!--bootstrap-->
	<script type="text/javascript" src="<?php echo base_url().'public/lib/bootstrap/dist/js/bootstrap.min.js';?>"></script>
	<!--bootstrap-toggle-->
	<script type="text/javascript" src="<?php echo base_url().'public/lib/bootstrap-toggle/js/bootstrap-toggle.min.js';?>"></script>
	<!--spin-->
	<script type="text/javascript" src="<?php echo base_url().'public/js/spin.min.js';?>"></script>
	<!--select2-->
	<script type="text/javascript" src="<?php echo base_url().'public/lib/select2/js/select2.full.min.js';?>"></script>
	<!--dataTables-->
	<script type="text/javascript" src="<?php echo base_url().'public/lib/dataTables/js/jquery.dataTables.min.js';?>"></script>
	<!--disable_back_button-->
	<script type="text/javascript" src="<?php echo base_url().'public/js/disable_back_button.js';?>"></script>
	<!--dashboard Charts-->
	<script type="text/javascript" src="<?php echo base_url().'public/js/dashboard.js';?>"></script>
	

</body>
</html>