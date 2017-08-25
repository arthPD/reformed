@extends('layouts.main')


@section('title')
	Log In
@endsection


@section('head')
@endsection


@section('body')
	<div id="login_form">
		<form method="POST" action="login">
		{{csrf_field()}}
			<div class="field">
				<p class="control has-icons-left">{{-- has-icons-right --}}
					<input name="username" class="input" type="text" placeholder="Username">
					<span class="icon is-small is-left">
						<i class="fa fa-user"></i>
					</span>
					<!-- <span class="icon is-small is-right">
						<i class="fa fa-check"></i>
					</span> -->
				</p>
			</div>
			<div class="field">
				<p class="control has-icons-left">
					<input name="password" class="input" type="password" placeholder="Password">
					<span class="icon is-small is-left">
						<i class="fa fa-lock"></i>
					</span>
				</p>
			</div>
			<div class="field">
				<p class="control">
					<button type="submit" class="button is-primary is-pulled-right"><i class="fa fa-sign-in"></i> Login</button>
				</p>
			</div>
		</form>
	</div>

@endsection


@section('footer')
@endsection


@section('scripts')
@endsection