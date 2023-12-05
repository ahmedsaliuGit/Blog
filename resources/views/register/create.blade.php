<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center font-bold text-xl">Register Form!</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <x-form.input name="name" autocomplete="Full Name" required/>
                <x-form.input name="username" />
                <x-form.input name="email" type="email" autocomplete="username" />
                <x-form.input name="password" type="password" autocomplete="new-password" />
                
                <x-form.field>
                    <x-form.button>Register</x-form.button>
                </x-form.field>

                {{-- @if ($errors->any())
                    <ul class="list-none">
                        @foreach ($errors->all() as $error)
                            <li class="text-xs text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
            </form>
        </main>
    </section>
</x-layout>
