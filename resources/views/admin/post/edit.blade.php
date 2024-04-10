<x-layout>
    <x-setting heading="manage post">
        <form action="/admin/post/{{ $post->id }}" method="post" class="panel-border space-y-4 pb-0"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
            <x-form.textarea name="exerpt">{{ $post->exerpt }}</x-form.textarea>
            <x-form.textarea name="body">{{ $post->body }}</x-form.textarea>
            <x-form.select name="category" :options="$categories" :currentOption="$post" />
            <x-form.button>Post</x-form.button>
        </form>
    </x-setting>
</x-layout>
