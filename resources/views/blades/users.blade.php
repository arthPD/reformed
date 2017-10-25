@extends('layouts.main')

@section('title')
	Dashboard
@endsection

@section('head')
@endsection

@section('body')
<hr>
	
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
						<button class="button is-small is-danger" @click="deleteFunction(member)"><i class="fa fa-trash"></i>Delete</button>
						<button class='button is-small is-warning' @click="addPledgor(member)" v-if='member.isPledgor == 0'><i class="fa fa-user-plus"></i>Pledgor</button>
					</td>
				</tr>
			</tbody>
		</table>

		<modal v-if="showModal == 1" @close="showModal = 0"><!-- delete modal -->
			<template slot='modal_title'>Delete Member Account</template>
			<template slot='modal_content'>
				Are you sure you want to delete <span v-text="memberdelete"></span>'s account?
			</template>
			<template slot='modal_button'>
				<a v-bind:href="memberdeleteid" class="button is-danger">Yes</a>
			</template>
		</modal>

		<modal v-if="showModal == 2" @close="showModal = 0"><!-- add as pledgor modal -->
			<template slot='modal_title'>Add <span v-text="memberdelete"></span> as Pledgor</template>
			<template slot='modal_content'>
				<form action="addPledgor" method="POST" id="addPledgor">
					{{csrf_field()}}
					<input type="text" class="input" name="amount" placeholder="&#8369; Amount">
					<input type="hidden" name="id" v-bind:value="memberid">
					<input type="submit" style="display: none">
				</form>
			</template>
			<template slot='modal_button'>
				<button onclick="$('#addPledgor input[type=submit]').click();" class="button is-success">Add</button>
			</template>
		</modal>
	</div>

@endsection

@section('footer')
@endsection


@section('scripts')
@endsection