<x-layout>
    <x-setting heading="publish new post">
        <form action="/admin/posts" method="post" class="panel-border space-y-4 pb-0" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="exerpt" />
            <x-form.textarea name="body" />
            <x-form.select name="category" :options="$categories" />
            <x-form.button>Post</x-form.button>
        </form>
    </x-setting>
</x-layout>
