<x-layout>
    <section class="mx-auto space-y-6" style="width: 650px">
        <form action="/admin/posts" method="post" class="panel-border mt-10 space-y-4 pb-0" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="exerpt" />
            <x-form.textarea name="body" />
            <x-form.select name="category" :options="$categories" />
            <x-form.button>Post</x-form.button>

            {{--
            <div class="mb-2 flex justify-end">
                <button type="submit"
                    class="mb-2 rounded-full bg-blue-500 px-4 py-2 text-xs font-semibold uppercase text-white">Post
                </button>
            </div> --}}
        </form>
    </section>
</x-layout>
