<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Post Detail') }} - {{ $post->title }}
		</h2>
	</x-slot>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="mt-4">{{ $post->title }}</h1>
				<p class="lead">
					{{ __('by') }} {{ $post->user->name }}
				</p>
				<hr>
				<p>{{ __('Posted') }} {{ $post->created_at->diffForHumans() }}</p>
				<hr>
				<p>{{ $post->body }}</p>
			</div>
		</div>
	</div>

</x-app-layout>