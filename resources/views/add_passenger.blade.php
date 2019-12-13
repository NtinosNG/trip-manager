@extends('layouts.app')

@section('content')

<div class="container">

	<h2 id="homeHeader">Customer Portal</h2>
	<hr/>

	<div class="row justify-content-left">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Add Passenger</div>

				<div class="card-body">
					<form method="POST" action="/add_passenger" class="needs-validation" novalidate>
                    @csrf
						<div class="form-group row">
							<label for="selectTitle" class="col-sm-2 col-form-label">Title</label>
							<div class="col-sm-10">
								<select name="title" class="form-control" id="selectTitle" >
                                    <option>Ms.</option>
                                    <option>Mr</option>
                                    <option>Miss</option>
                                    <option>Mrs.</option>
                                </select>						
							</div>
						</div>
						<div class="form-group row">
							<label for="inputFirstname" class="col-sm-2 col-form-label">First Name</label>
							<div class="col-sm-10">
								<input  name="firstname" type="text" class="form-control" id="inputFirstname" placeholder="First Name" required>
								<div class="invalid-feedback">Please add passenger's legal first name.</div>							
							</div>
						</div>
						<div class="form-group row">
							<label for="inputSurname" class="col-sm-2 col-form-label">Surname</label>
							<div class="col-sm-10">
								<input name="surname" type="text" class="form-control" id="inputSurname" placeholder="Surname" required>
								<div class="invalid-feedback">Please add passenger's legal surname.</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputPassporID" class="col-sm-2 col-form-label">Passport ID</label>
							<div class="col-sm-10">
								<input type="text" name="passport_id" class="form-control" id="inputPassporID" placeholder="Passport ID" required>
								<div class="invalid-feedback">Please add passenger's valid passport ID.</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10 offset-sm-2">
								<button type="submit" class="btn btn-secondary">Add</button>
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