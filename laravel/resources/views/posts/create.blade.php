<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-xl font-bold py-8">Publish New Post</h1>
        <x-panel>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>

                <x-form.field>
                    <x-form.label name="category"/>

                    <select name="category_id" id="category_id">
                        @foreach(App\Models\Category::all() as $category)
                            <option
                                value="{{$category->id}}"
                                {{ old('$category_id') == $category->id ? 'selected' : '' }}
                            >{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category"/>

                </x-form.field>


                <div class="mb-6 flex justify-end">
                    <x-form.button>Publish</x-form.button>
                </div>

            </form>
        </x-panel>
    </section>
</x-layout>

