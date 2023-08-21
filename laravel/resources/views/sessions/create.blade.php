<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                <!-- CSRF code 419 error without csrf validation READ MORE ABOUT THIS -->

                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        E-mail
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded" type="password" name="password"
                           id="password" required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Log in!
                    </button>
                </div>

                <!-- BOTTOM LINE VIEW DISPLAY ERRORS -->
                {{--@if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs mt-1">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif--}}

            </form>
        </main>
    </section>
</x-layout>
