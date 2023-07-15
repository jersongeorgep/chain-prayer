<style>
	.br {
		border-right: 1px #000 solid;
	}

	.bb {
		border-bottom: 1px #000 solid;
	}
</style>
<!-- Row -->
<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-red">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-light block counter"><span class="counter-anim"><?= $countPrescriptions; ?></span></span>
									<span class="weight-500 uppercase-font txt-light block font-13">Total Members</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-yellow">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-light block counter"><span class="counter-anim"><?= $countInvoice; ?></span></span>
									<span class="weight-500 uppercase-font txt-light block">Center Faith Homes</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-green">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-light block counter"><span class="counter-anim">4,054,876</span></span>
									<span class="weight-500 uppercase-font txt-light block">Laguages</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
		<div class="panel panel-default card-view pa-0">
			<div class="panel-wrapper collapse in">
				<div class="panel-body pa-0">
					<div class="sm-data-box bg-blue">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
									<span class="txt-light block counter"><span class="counter-anim">46.43</span></span>
									<span class="weight-500 uppercase-font txt-light block">Groups</span>
								</div>
								<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
									<div id="sparkline_4" style="width: 100px; overflow: hidden; margin: 0px auto;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Row -->

<!-- Row -->
<div class="row">
	<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
		<div class="panel panel-default card-view panel-refresh">
			<div class="refresh-container">
				<div class="la-anim-1"></div>
			</div>
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Latest Members </h6>
				</div>
				<div class="pull-right">
					<a href="#" class="pull-left inline-block refresh mr-15">
						<i class="zmdi zmdi-replay"></i>
					</a>
					<a href="#" class="pull-left inline-block full-screen mr-15">
						<i class="zmdi zmdi-fullscreen"></i>
					</a>
					<div class="pull-left inline-block dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
						<ul class="dropdown-menu bullet dropdown-menu-right" role="menu">
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
							<li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body row pa-0">
					<div class="table-wrap">
						<div class="table-responsive">
							<table class="table table-hover mb-0">
								<thead>
									<tr>
										<th>Time</th>
										<th>Broths/ Sisters</th>
										<th>Church</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Row -->
<script src="<?= site_url('assets/dist/js/dashboard-data.js'); ?>"></script>