@extends('layouts.main')

@section('title')
	Edit {{$user->name}} | Dashboard
@endsection

@section('head')
@endsection

@section('body')
	@include('layouts.userform', ['formAction' => '/users/'.$user->id,'submitButton' => 'Save'])
@endsection

@section('footer')
@endsection

@section('scripts')
@endsection