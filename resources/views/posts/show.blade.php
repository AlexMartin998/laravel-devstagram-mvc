@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto flex items-center">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image - {{ $post->title }}">

            <div class="p-3">
                <p>0 likes</p>
            </div>

            <div>
                {{-- x las relaciones entre DB y las convenciones en el name: --}}
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{-- gracias a Carbon de Laravel <- difference for humans --}}
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>
        </div>

        <div class="md:w-1/2 p-5">
            2
        </div>
    </div>
@endsection
