@extends('layouts.main')

@section('title')
	Dashboard
@endsection

@section('head')
@endsection

@section('body')
	<div id="users">
		<div class="field columns">
			<a href="users/create"><button class="button is-pulled-right is-primary"><i class="fa fa-plus"></i>Add</button></a>
			<p class="control has-icons-left has-icons-right is-one-quarter">
				<input type="text" class="input has-icons-left" v-model="search" placeholder="Search Name">
				<span class="icon is-small is-left">
					<i class="fa fa-search"></i>
				</span>
			</p>
		</div>
		<table class="table is-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Contact Number</th>
					<th>Address</th>
					<th>Email Address</th>
					<th>Birthdate</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for = 'member in memberSearch'>
					<td v-text='member.name'></td>
					<td v-text='member.contact_number'></td>
					<td v-text='member.address'></td>
					<td v-text='member.email_address'></td>
					<td v-text='member.birthday'></td>
					<td>
						<button class="button is-small is-primary"><i class="fa fa-eye"></i>View</button>
						<a v-bind:href="editUser(member.id)"><button class="button is-small is-info"><i class="fa fa-Edit"></i>Edit</button></a>
						<button class="button is-small is-danger"><i class="fa fa-trash"></i>Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

@endsection

@section('footer')
@endsection


@section('scripts')
@endsection