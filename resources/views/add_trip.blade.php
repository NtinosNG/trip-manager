@extends('layouts.app')

@section('content')

<div class="container">

	<h2 id="homeHeader">Customer Portal</h2>
	<hr/>

	<div class="row justify-content-left">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Add Trip</div>

				<div class="card-body">
					<form method="" action="" class="needs-validation" novalidate>
                    <!-- @csrf -->
                    <div class="form-group row">
							<label for="inputDepartureAirport" class="col-sm-2 col-form-label">Departure Airport</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputDepartureAirport" placeholder="Departure Airport" required>
								<div class="invalid-feedback">Please add the departure airport code.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputDestinationAirport" class="col-sm-2 col-form-label">Destination Airport</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputDestinationAirport" placeholder="Destination Airport" required>
								<div class="invalid-feedback">Please add the destination airport code.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputDepartureDate" class="col-sm-2 col-form-label">Departure Date</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputDepartureDate" placeholder="Departure Date & Time" required>
								<div class="invalid-feedback">Please add the departure date and time.</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputArrivalDate" class="col-sm-2 col-form-label">Arrival Date</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="inputArrivalDate" placeholder="Arrival Date & Time" required>
								<div class="invalid-feedback">Please add the arrival date and time.</div>
							</div>
						</div>

						<div class="form-group row">
                        <label class="col-sm-6 col-form-label">Passengers</label>
							<div class="col-sm-6 offset-sm-2">
								<input type="checkbox" class="form-control custom-control-input" id="customCheck1" required>
                                <label class="custom-control-label offset-sm-1" for="customCheck1">Mr John Doe</label>
							</div>
                        </div>

                        <div class="form-group row">
                       
							<div class="col-sm-6 offset-sm-2">
                                <input type="checkbox" class="form-control custom-control-input" id="customCheck2">
                                <label class="custom-control-label offset-sm-1" for="customCheck2">Ms. Jane Doe</label>
							</div>
                        </div>

                        <div class="form-group row">
                       
							<div class="col-sm-6 offset-sm-2">
                                <input type="checkbox" class="form-control custom-control-input" id="customCheck3">
                                <label class="custom-control-label offset-sm-1" for="customCheck3">Miss Sarah Smith</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-secondary">Save</button>
							</div>
						</div>
					</form>
                    <hr/>
                    <button  onclick="window.location='{{ route('home') }}'" class="btn btn-secondary float-right">Cancel</button>

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

</div>
@endsection