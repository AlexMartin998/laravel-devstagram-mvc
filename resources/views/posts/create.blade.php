@extends('layouts.app')

@section('title')
    Create new post
@endsection


@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="/ss1" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 md:flex md:items-center md:justify-center mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate
                class="md:w-9/12 p-10 bg-white rounded-lg shadow-md">
                @csrf

                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500">
                        Title
                    </label>
                    <input type="text" id="title" name="title" placeholder="Post Title" value="{{ old('title') }}"
                        class="border p-3 w-full rounded-lg @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Post description"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }} </p>
                    @enderror
                </div>

                <input type="submit" value="Create Post"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
