@extends('layouts.app')

@section('title')
    Register on DevStagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
			<img src="{{asset('img/register.jpg')}}" alt="Register image">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-md">
            <form>
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500">
                        Name
                    </label>
                    <input type="text" id="name" name="name" placeholder="Your Name"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500">
                        User Name
                    </label>
                    <input type="text" id="username" name="username" placeholder="Your User Name"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500">
                        Email
                    </label>
                    <input type="email" id="email" name="email" placeholder="Your Email"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="Your Password"
                        class="border p-3 w-full rounded-lg">
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500">
                        Confirm Password
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" class="border p-3 w-full rounded-lg">
                </div>

                <input type="submit" value="Create Account"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
