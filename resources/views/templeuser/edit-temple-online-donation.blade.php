@extends('templeuser.layouts.app')

    @section('styles')

		<!-- INTERNAL Select2 css -->
		<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />

		<!-- INTERNAL Data table css -->
		<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}"  rel="stylesheet">
		<link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet" />

    @endsection

    @section('content')

					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="left-content">
						<span class="main-content-title mg-b-0 mg-b-lg-1">Edit Online Donation</span>
						</div>
						<div class="justify-content-center mt-2">
							<ol class="breadcrumb">
								<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Online Donation</li>
							</ol>
						</div>
					</div>
					<!-- /breadcrumb -->
						
							<!-- row  -->
							<div class="row">
								<div class="col-12 col-sm-12">
									<div class="card">
										{{-- <div class="card-header">
											<h4 class="card-title">Temple About</h4>
										</div> --}}
										<div class="card-body pt-0 pt-4">
											<form action="{{ route('templedonation.update', $donation->id) }}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT') 
												<div id="form-container">
													<div class="form-group-wrapper">
														<div class="row">
															
															<!-- Donated By -->
															<div class="col-md-4">
																<div class="form-group">
																	<label for="donated_by">Donated By</label>
																	<input type="text" class="form-control" name="donated_by" placeholder="Enter your name" value="{{ old('donated_by', $donation->donated_by) }}">
																</div>
															</div>
											
															<!-- Amount -->
															<div class="col-md-4">
																<div class="form-group">
																	<label for="amount">Amount</label>
																	<input type="number" class="form-control" name="donation_amount" placeholder="Enter amount" min="1" value="{{ old('donation_amount', $donation->donation_amount) }}">
																</div>
															</div>
											
															<!-- Date & Time -->
															<div class="col-md-4">
																<div class="form-group">
																	<label for="donation_date_time">Date & Time</label>
																	<div class="input-group">
																		<input type="datetime-local" class="form-control" name="donation_date_time" value="{{ old('donation_date_time', \Carbon\Carbon::parse($donation->donation_date_time)->format('Y-m-d\TH:i')) }}">
																	</div>
																</div>
															</div>
											
															<!-- Phone Number -->
															<div class="col-md-4">
																<div class="form-group">
																	<label for="phone_number">Phone Number</label>
																	<input type="tel" class="form-control" name="phone_number" placeholder="Enter phone number" pattern="[0-9]{10}" value="{{ old('phone_number', $donation->phone_number) }}">
																</div>
															</div>
											
															<!-- Address -->
															<div class="col-md-4">
																<div class="form-group">
																	<label for="address">Address</label>
																	<input type="text" class="form-control" name="address" placeholder="Enter your address" value="{{ old('address', $donation->address) }}">
																</div>
															</div>
											
															<!-- Payment Mode -->
															<div class="form-group col-md-4">
																<label for="payment_mode">Payment Mode <span style="color:red">*</span></label>
																<select name="payment_mode" class="form-control" id="payment_mode" onchange="togglePaymentIdField()" required>
																	<option value="UPI" {{ old('payment_mode', $donation->payment_mode) == 'UPI' ? 'selected' : '' }}>UPI</option>
																	<option value="IMPS" {{ old('payment_mode', $donation->payment_mode) == 'IMPS' ? 'selected' : '' }}>IMPS</option>
																	<option value="CHEQUE" {{ old('payment_mode', $donation->payment_mode) == 'CHEQUE' ? 'selected' : '' }}>CHEQUE</option>
																</select>
															</div>
											
															<!-- Payment Number -->
															<div class="form-group col-md-4" id="payment_id_field">
																<label for="payment_number" id="payment_id_label">Payment Number <span style="color:red">*</span></label>
																<input type="text" class="form-control" name="payment_number" id="payment_id" placeholder="" value="{{ old('payment_number', $donation->payment_number) }}" required>
															</div>
															
														</div>
													</div>
												</div>
												<!-- Add and Submit Buttons -->
												<div class="text-center col-md-12">
													<button type="submit" class="btn btn-primary">Save Donations</button>
												</div>
											</form>
											
											
										
										</div>
									</div>
								</div>
							</div>
							<!-- /row closed -->


    @endsection

    @section('scripts')

		<!-- Internal Chart.Bundle js-->
		<script src="{{asset('assets/plugins/chartjs/Chart.bundle.min.js')}}"></script>

		<!-- Moment js -->
		<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>

		<!-- INTERNAL Apexchart js -->
		<script src="{{asset('assets/js/apexcharts.js')}}"></script>

		<!--Internal Sparkline js -->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

		<!--Internal  index js -->
		<script src="{{asset('assets/js/index.js')}}"></script>

        <!-- Chart-circle js -->
		<script src="{{asset('assets/js/chart-circle.js')}}"></script>

		<!-- Internal Data tables -->
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

		<!-- INTERNAL Select2 js -->
		<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>
		<script>
			function previewFiles(inputId, previewContainerId) {
				const input = document.getElementById(inputId);
				const previewContainer = document.getElementById(previewContainerId);
				
				previewContainer.innerHTML = ''; // Clear previous previews
			
				const files = input.files;
				if (files.length === 0) return;
			
				for (let i = 0; i < files.length; i++) {
					const file = files[i];
					const reader = new FileReader();
			
					reader.onload = function(e) {
						const fileUrl = e.target.result;
						const fileType = file.type;
			
						let element;
						if (fileType.startsWith('image/')) {
							element = document.createElement('img');
							element.src = fileUrl;
							element.style.width = '150px';
							element.style.margin = '5px';
						} else if (fileType.startsWith('video/')) {
							element = document.createElement('video');
							element.src = fileUrl;
							element.controls = true;
							element.style.width = '300px';
							element.style.margin = '5px';
						}
			
						if (element) {
							previewContainer.appendChild(element);
						}
					};
			
					reader.readAsDataURL(file);
				}
			}
		</script>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
			@if(session('error'))
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: '{{ session('error') }}',
				});
			</script>
			@endif
			
			@if(session('success'))
			<script>
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: '{{ session('success') }}',
				});
			</script>
			@endif

			<script>
				function togglePaymentIdField() {
					var paymentMode = document.getElementById("payment_mode").value;
					var paymentIdField = document.getElementById("payment_id_field");
					var paymentIdLabel = document.getElementById("payment_id_label");
					var paymentIdInput = document.getElementById("payment_id");
				
					if (paymentMode === "CASH") {
						// Hide the payment_id field if CASH is selected
						paymentIdField.style.display = "none";
						paymentIdInput.removeAttribute('required');  // Remove required attribute
					} else {
						// Show the payment_id field if any other mode is selected
						paymentIdField.style.display = "block";
						paymentIdInput.setAttribute('required', true);  // Add required attribute
				
						// Modify the label and placeholder based on the selected payment mode
						if (paymentMode === "UPI") {
							paymentIdLabel.innerHTML = "Transaction ID <span style='color:red'>*</span>";
							paymentIdInput.placeholder = "Enter UPI Transaction ID";
						} else if (paymentMode === "IMPS") {
							paymentIdLabel.innerHTML = "IMPS Transaction Number <span style='color:red'>*</span>";
							paymentIdInput.placeholder = "Enter IMPS Transaction Number";
						} else if (paymentMode === "CHEQUE") {
							paymentIdLabel.innerHTML = "Cheque Number <span style='color:red'>*</span>";
							paymentIdInput.placeholder = "Enter Cheque Number";
						}
					}
				}
				
				// Call the function on page load to ensure correct behavior
				document.addEventListener("DOMContentLoaded", function() {
					togglePaymentIdField(); // Ensure the field state is set based on the default value
				});
				</script>
    @endsection
