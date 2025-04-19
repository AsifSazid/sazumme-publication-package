{{-- <x-app-layout> --}}
<x-sp-backend-master>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ebooks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex h-screen">
                    <!-- Sidebar -->
                    <x-sp-backend-aside :navigations="['my ebooks' => 'ebooks.my-ebooks', 'create' => 'ebooks.create', 'index' => 'ebooks.index']"/>

                    <!-- Main Content -->
                    <main class="flex-1 p-6 overflow-y-auto">
                        <h1 class="text-3xl font-semibold mb-4">My Books</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <img class="w-full h-40 object-cover" src="https://via.placeholder.com/400x200"
                                    alt="Thumbnail Image" />
                                <div class="p-4">
                                    <h2 class="text-xl font-semibold mb-2">Card Title</h2>
                                    <p class="text-gray-600 mb-4">This is a short description of the card content. You
                                        can summarize details here.</p>
                                    <button class="mt-2 w-full bg-blue-600 text-black font-medium py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition duration-300">
                                        View Details
                                    </button>
                                </div>
                            </div>
                            <div class="bg-white p-4 rounded shadow">📊 Dashboard Card</div>
                            <div class="bg-white p-4 rounded shadow">👥 Users Info</div>
                            <div class="bg-white p-4 rounded shadow">⚙️ Settings Panel</div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-sp-backend-master>
{{-- </x-app-layout> --}}
