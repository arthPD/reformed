@extends('layouts.main')

@section('title')
	Finance | Dashboard
@endsection

@section('head')
@endsection

@section('body')
	<div id="finance">
	
		<button class="button is-danger" @click="showModal = 1">Open Modal</button>
		<button class="button is-success" @click="showModal = 2">Open Modal</button>

		<modal v-if="showModal == 1" @close="showModal = 0">
			<template slot='modal_title'>Title</template>			
			<template slot='modal_content'>Content</template>
			<template slot='modal_button'><button class="button is-success">Click me</button></template>
		</modal>


		<modal v-if="showModal == 2" @close="showModal = 0">
			<template slot='modal_title'>Title 2</template>			
			<template slot='modal_content'>Content 2</template>
			<template slot='modal_button'><button class="button is-success">Click me</button></template>
		</modal>

	</div>
@endsection

@section('footer')
@endsection

@section('script')
@endsection