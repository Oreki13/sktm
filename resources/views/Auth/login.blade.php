@extends('layout.main')
@section('content')
    <section class="h-screen w-screen flex items-center justify-center">
        <div class="bg-white max-w-sm w-full p-5 rounded-md">

            <h1 class="text-center font-bold text-2xl">Masuk Admin</h1>
            <form class="mt-7" method="POST" action="/login">
                @error('credential')
                    <div class="mb-5 rounded text-white px-3 py-2 bg-red-700">{{ $message }}</div>
                @enderror
                @csrf

                <div class="flex flex-col">
                    <label>Username</label>
                    <input name='username' type="text" class="bg-gray-200 rounded-sm p-2 focus:outline-gray-400 mt-1" />
                    @error('username')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="flex flex-col mt-3">
                    <label>Password</label>
                    <input name="password" class="bg-gray-200 rounded-sm p-2 focus:outline-gray-400 mt-1" type="password" />
                    @error('password')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <button type="submit" name="submit"
                    class="border-2 border-gray-200 w-full mt-4 py-2 rounded-sm hover:bg-gray-100">LOGIN</button>
            </form>
        </div>
    </section>
@endsection
