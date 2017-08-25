@extends('layouts.main')

@section('title')
	Add Member | Dashboard
@endsection

@section('head')
@endsection

@section('body')
	@include('layouts.userform', ['formAction' => '/users','submitButton' => 'Add'])
@endsection

@section('footer')
@endsection

@section('scripts')
@endsection