<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            <x-form-title>Login!</x-form-title>
            <form method="POST" action="/login" class="mt-10">
                @csrf
                @if ($errors->any())
                    <ul class="mb-5">
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase text-gray-700 font-bold text-xs">Email / Username</label>
                    <input type="text" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="p-2 w-full border border-gray-400"
                        placeholder="Email / Username"
                        id="email" required />
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase text-gray-700 font-bold text-xs">Password</label>
                    <input type="password" 
                        name="password" 
                        value="" 
                        class="p-2 w-full border border-gray-400" 
                        id="password" required />
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500"
                    >Login</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
