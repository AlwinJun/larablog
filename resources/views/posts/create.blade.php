<x-layout>
    <section class="mx-auto space-y-6" style="width: 650px">
        <form action="/admin/posts" method="post" class="panel-border mt-10 space-y-4 pb-0">
            @csrf
            <div>
                <label for="title" class="mb-1 block text-sm font-semibold leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input id="title" name="title" type="text" value="{{ old('title') }}" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('title')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="exerpt" class="mb-1 block text-sm font-semibold leading-6 text-gray-900">Exerpt</label>
                <textarea id="exerpt" name="exerpt" class="overflow-au h-16 w-full resize-none rounded-xl focus:h-24" required>{{ old('exerpt') }}</textarea>
                @error('exerpt')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="mb12 block text-sm font-semibold leading-6 text-gray-900">Body</label>
                <textarea id="body" name="body" class="overflow-au h-16 w-full resize-none rounded-xl focus:h-24" required>{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="mb12 block text-sm font-semibold leading-6 text-gray-900">Category</label>
                <select name="category_id" id="category" class="w-full">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-2 flex justify-end">
                <button type="submit"
                    class="mb-2 rounded-full bg-blue-500 px-4 py-2 text-xs font-semibold uppercase text-white">Post
                </button>
            </div>
        </form>
    </section>
</x-layout>
