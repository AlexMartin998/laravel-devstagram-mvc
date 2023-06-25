@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="container mx-auto flex">
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
            <div class="shadow bg-white p-5 mb-5">

                @auth
                    <p class="text-xl font-bold text-center mb-4">
                        Add a new comment
                    </p>

                    <form action="">
                        <div class="mb-5">
                            <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                                Add a comment
                            </label>
                            <textarea id="comment" name="comment" placeholder="Add a new comment"
                                class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"></textarea>

                            @error('comment')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                            @enderror
                        </div>

                        <input type="submit" value="Comment"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
                    </form>
                @endauth

            </div>
        </div>
    </div>
@endsection
