@extends('layouts.app')

@section('content')

<div class="container">

	<h2 id="homeHeader">Customer Portal</h2>
	<hr/>

	<div class="row justify-content-left">
		<div class="col-md-7">
			<div class="card">
				<div class="card-header headername">Basic Info</div>

				<div class="card-body">
					<form method="POST" action ="" class="needs-validation" novalidate>
						<div class="form-group row">
							<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" value="{{{ Auth::user()->email }}}" class="form-control" id="inputEmail" placeholder="Email" disabled="disabled" required>
								<div class="invalid-feedback">Please provide a valid email.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
								<input type="text" value="{{{ Auth::user()->name}}}" class="form-control" id="inputName" placeholder="Name" required>
								<div class="invalid-feedback">Please provide your legal name.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputAddress" placeholder="Address" required>
								<div class="invalid-feedback">Please provide a valid address.</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputCity" class="col-sm-2 col-form-label">City</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputCity" placeholder="City" required>
								<div class="invalid-feedback">Please provide a city.</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputCountry" placeholder="Country" required>
								<div class="invalid-feedback">Please provide a country.</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-secondary">Save</button>
							</div>
						</div>
					</form>
					<script>
					// Example JavaScript for disabling form submissions if there are invalid fields
					// that was found in Bootstrap documentation.
					(function() {
					  'use strict';
					  window.addEventListener('load', function() {
					    // Fetch all the forms we want to apply custom Bootstrap validation styles to
					    var forms = document.getElementsByClassName('needs-validation');
					    // Loop over them and prevent submission
					    var validation = Array.prototype.filter.call(forms, function(form) {
					      form.addEventListener('submit', function(event) {
					        if (form.checkValidity() === false) {
					          event.preventDefault();
					          event.stopPropagation();
					        }
					        form.classList.add('was-validated');
					      }, false);
					    });
					  }, false);
					})();
					</script>
				</div>
			</div>
		</div>
	</div>

	<br/>

	<div class="row justify-content-left">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header headername">Passengers</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Title</th>
									<th scope="col">First Name</th>
									<th scope="col">Surname</th>
									<th scope="col">Passport ID</th>
									<th scope="col">Options</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Mr</td>
									<td>Mark</td>
									<td>Otto</td>
									<td>12345678</td>
									<td><button class="btn btn-danger">Delete</button></td>
								</tr>
								<tr>
									<td>Mr</td>
									<td>Jacob</td>
									<td>Thornton</td>
									<td>8796541233</td>
									<td><button class="btn btn-danger">Delete</button></td>
								</tr>
								<tr>
									<td>Ms</td>
									<td>Jane</td>
									<td>Doe</td>
									<td>9854845489</td>
									<td><button class="btn btn-danger">Delete</button></td>
								</tr>
							</tbody>
						</table>   
						<button type="button"  onclick="window.location='{{ route('add_passenger') }}'" class="btn btn-success float-right">Add</button>
					</div>     
				</div>
			</div>
		</div>
	</div>
	<br/>
	<div class="row justify-content-left">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header headername">Trips</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">From</th>
									<th scope="col">To</th>
									<th scope="col">Departure</th>
									<th scope="col">Arrival</th>
									<th scope="col">Passengers</th>
									<th scope="col">Options</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>MAD</td>
									<td>LAX</td>
									<td>11/Apr/2017 06:31</td>
									<td>11/May/2017 17:33</td>
									<td>Mr John Smith, Ms Jane Smith</td>
									<td><button class="btn btn-danger">Delete</button></td>
								</tr>
								<tr>
									<td>LON</td>
									<td>JFK</td>
									<td>12/Apr/2017 06:31</td>
									<td>12/May/2017 17:33</td>
									<td>Mr John Doe, Ms Jane Doe</td>
									<td><button class="btn btn-danger">Delete</button></td>
								</tr>
							</tbody>
						</table>   
						<button type="button" onclick="window.location='{{ route('add_trip') }}'"  class="btn btn-success float-right">Add</button>  
					</div>  
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


