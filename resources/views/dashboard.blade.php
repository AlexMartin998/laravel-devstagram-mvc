@extends('layouts.app')

{{-- 
    $user here is the owner of the profile we are visiting at the moment
--}}

@section('title')
    Profile: {{ $user->username }}
@endsection


@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ $user->image ? asset('profiles' . '/' . $user->image) : asset('img/user.svg') }}"
                    alt="User default image" class="rounded-full h-full w-full object-cover">
            </div>

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                    {{-- edit profile --}}
                    @auth()
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path
                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal">Followers</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal">Following</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{-- post quantity --}}
                    {{ $user->posts->count() }}
                    <span class="font-normal">Posts</span>
                </p>

                @auth
                    {{-- Not following oneself --}}
                    @if ($user->id !== auth()->user()->id)
                        @if (!$user->isFollowingByUser(auth()->user()))
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf
                                <input type="submit"
                                    class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Follow">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                {{-- spoofing method to add more http verboses --}}
                                @method('DELETE')
                                <input type="submit"
                                    class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer"
                                    value="Unfollow">
                            </form>
                        @endif
                    @endif
                @endauth

            </div>
        </div>
    </div>

    <section>
        <h2 class="text-4xl text-center font-black my-10">Publications</h2>

        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div class="">
                        {{-- x el route model binding necesita el post, o solo el id --}}
                        {{-- <a href="{{ route('posts.show', ['user'=>$user, 'post'=>$post]) }}"> --}}
                        <a href="{{ route('posts.show', [$user->username, $post]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Post image | {{ $post->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-10">
                {{-- laravel ya mete la logica de la paginacion | defaul pagining with tailwindcss styles --}}
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center">No Posts</p>
        @endif
    </section>
@endsection
