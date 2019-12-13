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
					<form method="POST" action ="/home/{{$user->id}}" class="needs-validation" novalidate>
						@method('PUT')
						@csrf
						<div class="form-group row">
							<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" name="email" value="{{{ $user->email }}}" class="form-control" id="inputEmail" placeholder="Email"  required>
								<div class="invalid-feedback">Please provide a valid email.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputName" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
								<input type="text" name="name" value="{{{ Auth::user()->name}}}" class="form-control" id="inputName" placeholder="Name" required>
								<div class="invalid-feedback">Please provide your legal name.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
							<div class="col-sm-10">
								<input type="text"  name="address" value="{{{ Auth::user()->address }}}" class="form-control" id="inputAddress" placeholder="Address" >
								<div class="invalid-feedback">Please provide a valid address.</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputCity" class="col-sm-2 col-form-label">City</label>
							<div class="col-sm-10">
								<input type="text"  name="city" value="{{{ Auth::user()->city }}}" class="form-control" id="inputCity" placeholder="City" >
								<div class="invalid-feedback">Please provide a city.</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
							<div class="col-sm-10">
								<input type="text" name="country" value="{{{ Auth::user()->country }}}" class="form-control" id="inputCountry" placeholder="Country" >
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
									<th scope="col">Trips</th>
									<th scope="col">Options</th>
								</tr>
							</thead>
							@if($user->passengers)
							@foreach($user->passengers as $passenger)
							<tbody>
								<tr>
									<td>{{$passenger->title}}</td>
									<td>{{$passenger->first_name}}</td>
									<td>{{$passenger->surname}}</td>
									<td>{{$passenger->passport_id}}</td>
									<td>
									@for($i = 0; $i < count($passenger->trips); $i++)
									 {{ $passenger->trips[$i]['departure_airport_code'] }} -> {{ $passenger->trips[$i]['arrival_airport_code'] }} <br/>
									@endfor
									</td>
									<td>
										<form method="POST" action ="/home/delete_passenger/{{$passenger->id}}" novalidate>
										@method('DELETE')
										@csrf
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
									</td>
								</tr>
							</tbody>
							@endforeach
							@endif
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
							@if($trips)
							@foreach($trips as $trip)
							<tbody>
								<tr>
									<td>{{$trip->departure_airport_code}}</td>
									<td>{{$trip->arrival_airport_code}}</td>
									<td>{{ \Carbon\Carbon::parse($trip->departure_datetime)->format('d/M/Y H:i') }}</td>
									<td>{{ \Carbon\Carbon::parse($trip->arrival_datetime)->format('d/M/Y H:i') }}</td>
									<td>
									@for($i = 0; $i < count($trip->passengers); $i++)
										{{ $trip->passengers[$i]['title'] }} {{ $trip->passengers[$i]['first_name'] }} {{ $trip->passengers[$i]['surname'] }} <br/>
									@endfor
									</td>
									<td>
										<form method="POST" action ="/home/delete_trip/{{$trip->id}}" novalidate>
										@method('DELETE')
										@csrf
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
									</td>
								</tr>
							@endforeach
							@endif
						</table>   
						<button type="button" onclick="window.location='{{ route('add_trip') }}'"  class="btn btn-success float-right">Add</button>  
					</div>  
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


