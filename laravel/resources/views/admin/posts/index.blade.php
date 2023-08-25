<x-layout>
    <x-setting heading="Manage Posts">

        <div class="container max-w-3xl px-2 mx-auto sm:px-2">
            <div class="py-1">
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal">
                            <tbody>
                            @foreach($posts as $post)

                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                            </p>
                                        </div>

                                    </td>
                                    {{-- Block to sketch if needed
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Admin
                                        </p>
                                    </td>

                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            12/09/2020
                                        </p>
                                    </td>
                                    --}}
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <span
                                    class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                    <span aria-hidden="true"
                                          class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                    </span>
                                    <span class="relative">
                                        Published
                                    </span>
                                </span>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-400 hover:text-blue-700">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                       <form method="POST" action="/admin/posts/{{$post->id}}">
                                           @csrf
                                           @method('DELETE')

                                           <button class="text-xs text-gray-400">Delete</button>
                                       </form>

                                        </a>
                                    </td>
                                </tr>


                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </x-setting>

</x-layout>

