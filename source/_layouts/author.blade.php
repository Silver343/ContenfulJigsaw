@extends('_layouts.master')

@section('body')
    <h1>{{ $page->name }}</h1>
    <p>{{ $page->role }}</p>

    <div class="text-2xl border-b border-blue-200 mb-6 pb-10">
        @yield('content')
    </div>

     @foreach ($page->contentful() as $post)
        <div class="space-x-6">
            <a href="/contentful/{{$post['path']}}" class="text-xl"> {{ $post['title'] }} </span>
            </span> {{ $post['description'] }} </span>
        </div>

        @if (! $loop->last)
        <hr class="w-full border-b mt-2 mb-6">
        @endif

    @endforeach
    @include('_components.newsletter-signup')
@stop
