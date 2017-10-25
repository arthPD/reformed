<form method="POST" action="{{$formAction}}">
	{{csrf_field()}}
	@if(isset($user))
		<input name="_method" type="hidden" value="PUT">
	@endif
	
	<div class="columns">
		<div class="column">
			<div class="field">
				<label class="label">Name</label>
				<div class="control has-icons-left">
					<input name="name" class="input" type="text" value="{{isset($user->name) ? ''.$user->name : ''}}">
					<span class="icon is-small is-left">
				      <i class="fa fa-user"></i>
				    </span>
				</div>
			</div>

			<div class="field">
				<label for="" class="label">Username</label>
				<div class="control has-icons-left">
					<input name="username" type="text" class="input" {{isset($user->username) ? "value=".$user->username : ""}}>
					<span class="icon is-small-is-left">
						<i class="fa fa-id-card-o"></i>
					</span>
				</div>
			</div>

			<div class="field">
				<label for="" class="label">{{isset($user) ? "New " : ""}}Password</label>
				<div class="control has-icons-left">
					<input name="password" type="password" class="input">
					<span class="icon is-small-is-left">
						<i class="fa fa-lock"></i>
					</span>
				</div>
			</div>

			<div class="field">
				<label for="" class="label">{{isset($user) ? "New " : ""}}Password Confirm</label>
				<div class="control has-icons-left">
					<input name="password_confirmation" type="password" class="input">
					<span class="icon is-small-is-left">
						<i class="fa fa-lock"></i>
					</span>
				</div>
			</div>
		</div>

		<div class="column">
			<div class="field">
				<label for="" class="label">Contact Number</label>
				<div class="control has-icons-left">
					<input name="contact_number" type="text" class="input" {{isset($user->contact_number) ? "value=".$user->contact_number : ""}}>
					<span class="icon is-small-is-left">
						<i class="fa fa-mobile"></i>
					</span>
				</div>
			</div>

			<div class="field">
				<label for="" class="label">Address</label>
				<div class="control has-icons-left">
					<textarea name="address" class="input">
						{{isset($user->address) ? "".$user->address : ""}}
					</textarea>
					<span class="icon is-small-is-left">
						<i class="fa fa-map"></i>
					</span>
				</div>
			</div>

			<div class="field">
				<label for="" class="label">Email Address</label>
				<div class="control has-icons-left">
					<input name="email_address" type="email" class="input" {{isset($user->email_address) ? "value=".$user->email_address : ""}}>
					<span class="icon is-small-is-left">
						<i class="fa fa-envelope"></i>
					</span>
				</div>
			</div>

			<div class="field">
				<label for="" class="label">Birthdate</label>
				<div class="control has-icons-left">
					<input id="birthday" name="birthday" type="text" class="input" {{isset($user->birthday) ? "value=".$user->birthday : ""}}>
					<span class="icon is-small-is-left">
						<i class="fa fa-calendar"></i>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="is-pulled-right">
		<input type="submit" class="button is-primary" value="{{$submitButton}}">
		<a href="{{ url("/users") }}"><button type="button" class="button is-info">Back</button></a>
	</div>
</form>
<script>
</script>