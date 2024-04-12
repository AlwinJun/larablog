<x-layout>
    <section class="mx-auto max-w-6xl space-y-6">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Log your account!
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="login-email" />
                    <x-form.input name="password" type="password" autocomplete="login-password" />
                    <x-form.button>Login</x-form.button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
