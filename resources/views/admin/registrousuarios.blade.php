@extends('index2')
	@section('styles2')
		<link href="/plugins/bootstrap-wizard/css/bwizard.min.css" rel="stylesheet" />
		<link href="/plugins/parsley/src/parsley.css" rel="stylesheet" />
	@endsection
	@section('content')
		<!-- begin breadcrumb -->
		<ol class="breadcrumb pull-right">
			<li><a href="javascript:;">Usuarios</a></li>
			<li class="active">Registro</li>
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Usuarios<small> Registro</small></h1>
		<!-- end page-header -->

		<!-- begin row -->
		<div class="row">
	        <!-- begin col-12 -->
		    <div class="col-md-12">
		        <!-- begin panel -->
	            <div class="panel panel-inverse">
	                <div class="panel-heading">
	                    <div class="panel-heading-btn">
	                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
	                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
	                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
	                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
	                    </div>
	                    <h4 class="panel-title">Registro Usuarios</h4>
	                </div>
	                <div class="panel-body">
	                    <form action="http://seantheme.com/" method="POST" data-parsley-validate="true" name="form-wizard">
							<div id="wizard">
								<ol>
									<li>
									    Datos Personales
									    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
									</li>
									<li>
									    Contact Information
									    <small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small>
									</li>
									<li>
									    Login
									    <small>Phasellus lacinia placerat neque pretium condimentum.</small>
									</li>
									<li>
									    Completed
									    <small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small>
									</li>
								</ol>
								<!-- begin wizard step-1 -->
								<div class="wizard-step-1">
	                                <fieldset>
	                                    <legend class="pull-left width-full">Identification</legend>
	                                    <!-- begin row -->
	                                    <div class="row">
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
												<div class="form-group block1">
													<label>Nombres</label>
													<input type="text" name="nombre" placeholder="" class="form-control" data-parsley-group="wizard-step-1" required min="5" max="100"/>
												</div>
	                                        </div>
	                                        <!-- end col-4 -->
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
												<div class="form-group">
													<label>Apellido Paterno</label>
													<input type="text" name="apaterno" placeholder="" class="form-control" data-parsley-group="wizard-step-1" required required min="5" max="60"/>
												</div>
	                                        </div>
	                                        <!-- end col-4 -->
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
												<div class="form-group">
													<label>Apellido Materno</label>
													<input type="text" name="amaterno" placeholder="" class="form-control" data-parsley-group="wizard-step-1" required required min="5" max="60"/>
												</div>
	                                        </div>
	                                        <!-- end col-4 -->
	                                    </div>
	                                    <!-- end row -->
	                                    <div class="row">
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
												<div class="form-group block1">
													<label>Telefono</label>
													<input type="text" name="firstname" placeholder="John" class="form-control" data-parsley-group="wizard-step-1" required  />
												</div>
	                                        </div>
	                                        <div class="col-md-4">
												<div class="form-group block1">
													<label>Fecha de Nacimiento</label>
													<input type="text" name="firstname" placeholder="John" class="form-control" data-parsley-group="wizard-step-1" required />
												</div>
	                                        </div>
	                                    </div>
									</fieldset>
								</div>
								<!-- end wizard step-1 -->
								<!-- begin wizard step-2 -->
								<div class="wizard-step-2">
									<fieldset>
										<legend class="pull-left width-full">Contact Information</legend>
	                                    <!-- begin row -->
	                                    <div class="row">
	                                        <!-- begin col-6 -->
	                                        <div class="col-md-6">
												<div class="form-group">
													<label>Telefono</label>
													<input type="text" name="phone" placeholder="1234567890" class="form-control" data-parsley-group="wizard-step-2" data-parsley-type="number" required  />
												</div>
	                                        </div>
	                                        <!-- end col-6 -->
	                                        <!-- begin col-6 -->
	                                        <div class="col-md-6">
												<div class="form-group">
													<label>Email Address</label>
													<input type="email" name="email" placeholder="someone@example.com" class="form-control" data-parsley-group="wizard-step-2" data-parsley-type="email" required />
												</div>
	                                        </div>
	                                        <!-- end col-6 -->
	                                    </div>
	                                    <!-- end row -->
									</fieldset>
								</div>
								<!-- end wizard step-2 -->
								<!-- begin wizard step-3 -->
								<div class="wizard-step-3">
									<fieldset>
										<legend class="pull-left width-full">Login</legend>
	                                    <!-- begin row -->
	                                    <div class="row">
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>Username</label>
	                                                <div class="controls">
	                                                    <input type="text" name="username" placeholder="johnsmithy" class="form-control" data-parsley-group="wizard-step-3" required />
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!-- end col-4 -->
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>Pasword</label>
	                                                <div class="controls">
	                                                    <input type="password" name="password" placeholder="Your password" class="form-control" data-parsley-group="wizard-step-3" required />
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!-- end col-4 -->
	                                        <!-- begin col-4 -->
	                                        <div class="col-md-4">
	                                            <div class="form-group">
	                                                <label>Confirm Pasword</label>
	                                                <div class="controls">
	                                                    <input type="password" name="password2" placeholder="Confirmed password" class="form-control" />
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <!-- end col-6 -->
	                                    </div>
	                                    <!-- end row -->
	                                </fieldset>
								</div>
								<!-- end wizard step-3 -->
								<!-- begin wizard step-4 -->
								<div>
								    <div class="jumbotron m-b-0 text-center">
	                                    <h1>Login Successfully</h1>
	                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
	                                    <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
	                                </div>
								</div>
								<!-- end wizard step-4 -->
							</div>
						</form>
	                </div>
	            </div>
	            <!-- end panel -->
	        </div>
	        <!-- end col-12 -->
	        <button id="v">Prueba</button>
	    </div>
	    <!-- end row -->
	@endsection
	@section('scripts2')
		<script src="/plugins/parsley/dist/parsley.js"></script>
		<script src="/plugins/bootstrap-wizard/js/bwizard.js"></script>
		<script src="/js/form-wizards-validation.demo.min.js"></script>
		<script src="/js/apps.min.js"></script>
		<script>
			$(document).ready(function() {
				App.init();
				FormWizardValidation.init();
			});
		</script>
	@endsection