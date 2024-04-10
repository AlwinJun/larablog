<x-layout>
    <x-setting heading="All Post">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="mb-4 overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <a href="/post/{{ $post->slug }}"
                                                class="text-sm text-gray-900">{{ $post->title }}</a>
                                        </td>
                                        <td
                                            class="flex justify-evenly whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                            <a href="/admin/post/{{ $post->id }}/edit"
                                                class="text-blue-500 hover:text-blue-600">Edit</a>


                                            <div x-data="{ show: false }">
                                                <button @click="show = true" class="text-red-300 hover:text-red-500">
                                                    Delete
                                                </button>

                                                <div x-show="show" x-transition x-cloak id="popup-modal" tabindex="-1"
                                                    class="fixed left-0 right-0 top-0 z-50 flex h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                                    <div class="relative max-h-full w-full max-w-md p-4">
                                                        <div
                                                            class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                                            <button @click="show = false" type="button"
                                                                class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-hide="popup-modal">
                                                                <svg class="h-3 w-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <form action="/admin/post/{{ $post->id }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <div class="p-4 text-center md:p-5">
                                                                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 20 20">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                    </svg>
                                                                    <h3
                                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                        Are you sure you want to delete this post?</h3>
                                                                    <button type="submit"
                                                                        class="inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                    <button @click="show = false" type="button"
                                                                        class="ms-3 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">No,
                                                                        cancel</button>
                                                                </div>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>


                                        {{-- <button x-data=
                                            class="block rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Toggle modal
                                        </button> --}}

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>

    </x-setting>
</x-layout>
