<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 rounded-xl">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Log In!</h1>
                <form method="POST" action="{{ route('user.login') }}" class="mt-10">
                    @csrf
                    <!-- CSRF code 419 error without csrf validation READ MORE ABOUT THIS -->

                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="current-password"/>

                    <x-form.button>Log In</x-form.button>

                    {{-- <div class="mb-6">
                         <button type="submit"
                                 class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                         >
                             Log in!
                         </button>
                     </div>--}}

                    <!-- BOTTOM LINE VIEW DISPLAY ERRORS -->
                    {{--@if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 text-xs mt-1">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif--}}

                </form>
            </x-panel>

        </main>
    </section>
</x-layout>
