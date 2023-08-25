<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 rounded-xl">
           <x-panel>

               <h1 class="text-center font-bold text-xl">Register</h1>

               <form method="POST" action="/register" class="mt-10">
                   @csrf
                   <!-- CSRF code 419 error without csrf validation READ MORE ABOUT THIS -->

                   <x-form.input name="name"/>
                   <x-form.input name="username"/>
                   <x-form.input name="email" type="email" autocomplete="username"/>
                   <x-form.input name="password" type="password"/>
                   <x-form.button>Submit</x-form.button>

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
