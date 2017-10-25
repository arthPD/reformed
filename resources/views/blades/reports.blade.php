@extends('layouts.main')

@section('title')
	Reports | Dashboard
@endsection

@section('head')
@endsection

@section('body')
	<div id="reports">
		<ul>
			<li v-for = 'record in records'>
				<div class="card column">
					<div class="card-content">
						<div class="media">
							<div class="media-content">
								<p class="title is-4">&#8369; @{{record.total}}</p>
								<p class="subtitle is-6" v-html="momentFormat(record.record_date, record.updated_at)"></p>
							</div>
						</div>
						<div class="content">
							"@{{record.note}}"
							<div>
								<a v-bind:href="hrefId(record.id)" class="button is-small is-primary">VIEW</a>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
@endsection

@section('footer')
@endsection

@section('script')
@endsection