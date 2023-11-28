<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center font-bold text-xl">Register Form!</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase text-gray-700 font-bold text-xs">Name</label>
                    <input type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}"
                        class="p-2 w-full border border-gray-400"
                        required>

                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase text-gray-700 font-bold text-xs">Username</label>
                    <input type="text" 
                        name="username" 
                        value="{{ old('username') }}" 
                        class="p-2 w-full border border-gray-400" 
                        id="username" required />
                    @error('username')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase text-gray-700 font-bold text-xs">Email</label>
                    <input type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="p-2 w-full border border-gray-400" 
                        id="email" required />
                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase text-gray-700 font-bold text-xs">Password</label>
                    <input type="password" 
                        name="password" 
                        value="" 
                        class="p-2 w-full border border-gray-400" 
                        id="password" required />
                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500"
                    >Register</button>
                </div>

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
