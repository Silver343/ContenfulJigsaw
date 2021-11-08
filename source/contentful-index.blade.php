@extends('_layouts.master')

@section('body')
    @foreach($contentful as $post)
        <div class="w-full mb-6">
            @if ($post->coverImage)
                <img src="{{ $post->coverImage }}" alt="{{ $post->title }} cover image" class="mb-6">
            @endif

            <p class="text-gray-700 font-medium my-2">
                {{ date('F j, Y', $page->publishDate) }}
            </p>

            <h2 class="text-3xl mt-0">
                <a href="{{ $post->getUrl() }}" title="Read {{ $post->title }}" class="text-gray-900 font-extrabold">
                    {{ $post->title }}
                </a>
            </h2>

            {{--<p class="mt-0 mb-4">{!! $post->getExcerpt() !!}</p> --}}

            <a href="{{ $post->getUrl() }}" title="Read - {{ $post->title }}" class="uppercase tracking-wide mb-4">
                Read
            </a>
        </div>

        @if (! $loop->last)
            <hr class="border-b my-6">
        @endif
    @endforeach

    @include('_components.newsletter-signup')
@stop
