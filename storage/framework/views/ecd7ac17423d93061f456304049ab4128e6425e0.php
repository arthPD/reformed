<?php $__env->startSection('title'); ?>
	Finance | Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div id="users">
	

		<!-- List of Pledge record -->

		<?php if(!session("recordSession")): ?>
			<a class="button is-primary" href="/newRecord"><span class="fa fa-plus"></span>Record</a>
		<?php endif; ?>

		<?php if(session("recordSession")): ?>
			<div id="record">
				<hr>
				<div class="field columns">
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input type="text" class="input has-icons-left" v-model="search" placeholder="Search Name">
						<span class="icon is-small is-left">
							<i class="fa fa-search"></i>
						</span>
					</p>
					<div class="column" v-if="records"><h3>Record: {{records.record_date}}</h3></div>
				</div>
				<table class="table is-striped" style="width: 100%; height: 500px;">
					<thead>
						<tr>
							<th>Name</th>
							<th>Pledge Amount</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for = 'member in memberSearch'>
							<td v-text='member.name'></td>
							<td v-if="member.isPledgor == 1"><p>&#8369;{{member.amount}}</p></td>
							<td v-else>N/A</td>
							<td>&#8369; {{ifTotal(member.id)}}</td>
							<td><button class="button is-info" @click="breakDown(member)"><span class="fa fa-edit"></span></button></td>
						</tr>
					</tbody>
				</table>

				<button class="button is-success is-pulled-right" @click="showModal = 1"><span class="fa fa-save"></span>Save</button>
			</div>
		<?php endif; ?>
		<modal v-if="showModal == 1" @close="showModal = 0">
			<template slot='modal_title'>Save Record</template>			
			<template slot='modal_content'>
				<form id="saveRecordForm" action="/saveRecord" method="POST">
					<?php echo e(csrf_field()); ?>

					<input type="text" name="note" class="input" placeholder="Note">
					<input type="submit" style="display: none">
				</form>
			</template>
			<template slot='modal_button'>
				<button type="button" class="button is-success" onclick="$('#saveRecordForm input[type=submit]').click();">Ok</button>
			</template>
		</modal>

		<modal v-if="showModal == 2" @close="showModal = 0">
			<template slot="modal_title">Amount Breakdown | <span v-text="memberdelete"></span></template>
			<template slot="modal_content">
				<form v-bind:action="breakDownActionLink" id="breakDownForm" method="POST">
					<?php echo e(csrf_field()); ?>

					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="thousands" name="thousands" type="text" class="input field has-icons-left" placeholder="Thousand">
						<span class="icon is-small is-left">
							<i class="fa fa-money"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="five_hundreds" name="five_hundreds" type="text" class="input field has-icons-left" placeholder="Five Hundred">
						<span class="icon is-small is-left">
							<i class="fa fa-money"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="two_hundreds" name="two_hundreds" type="text" class="input field has-icons-left" placeholder="Two Hundred">
						<span class="icon is-small is-left">
							<i class="fa fa-money"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="hundreds" name="hundreds" type="text" class="input field has-icons-left" placeholder="Hundred">
						<span class="icon is-small is-left">
							<i class="fa fa-money"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="fifties" name="fifties" type="text" class="input field has-icons-left" placeholder="Fifty">
						<span class="icon is-small is-left">
							<i class="fa fa-money"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="twenties" name="twenties" type="text" class="input field has-icons-left" placeholder="Twenty">
						<span class="icon is-small is-left">
							<i class="fa fa-money"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="tens" name="tens" type="text" class="input field has-icons-left" placeholder="Ten">
						<span class="icon is-small is-left">
							<i class="fa fa-gg-circle"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="fives" name="fives" type="text" class="input field has-icons-left" placeholder="Five">
						<span class="icon is-small is-left">
							<i class="fa fa-gg-circle"></i>
						</span>
					</p>
					<p class="control has-icons-left has-icons-right is-one-quarter">
						<input v-bind:value="ones" name="ones" type="text" class="input field has-icons-left" placeholder="Peso">
						<span class="icon is-small is-left">
							<i class="fa fa-gg-circle"></i>
						</span>
					</p>
					<textarea v-bind:value="note" name="note" rows="5" class="textarea" placeholder="Note"></textarea>
					<input type="hidden" name="user_id" v-bind:value="memberid">
					<input type="submit" style="display: none;">
				</form>
			</template>
			<template slot="modal_button">
				<button onclick="$('#breakDownForm input[type=submit]').click();" class="button is-info" type="button">Ok</button>
			</template>
		</modal>


	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>