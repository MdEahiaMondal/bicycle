@extends('frontend.master')

@section('title')
shipping
@endsection


@section('body')


<div class="container">
<div class="row">
	<div class="col-md-6">
		<form>
			
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-9">
				  <input type="email" name="email" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-3 control-label">Password</label>
				<div class="col-md-9">
				  <input type="password" name="password" class="form-control">
				</div>

			</div>
			
			<div class="form-group">
				
				<div class="col-md-9 col-md-offset-3">
				  <input type="submit" name="btn" class="btn btn-success btn-block" value="Save">
				</div>
			</div>

		</form>
	</div>
</div>
</div>
@endsection