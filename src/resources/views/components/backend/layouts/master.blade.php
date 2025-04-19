<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-sp-backend-meta />
    <x-sp-backend-title :title="'SazVerse - Dashboard'" />
    <x-sp-backend-favicon />
    <x-sp-backend-style />

    <script defer>
        document.addEventListener("DOMContentLoaded", () => {
            const toggleBtn = document.getElementById("menu-toggle");
            const sidebar = document.getElementById("sidebar");
            const overlay = document.getElementById("overlay");

            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("-translate-x-full");
                overlay.classList.toggle("hidden");
            });

            overlay.addEventListener("click", () => {
                sidebar.classList.add("-translate-x-full");
                overlay.classList.add("hidden");
            });
        });
    </script>
</head>

<body class="h-full bg-gray-100">

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-30 hidden lg:hidden"></div>

    <!-- Navbar -->
    <nav class="bg-white shadow px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <!-- Hamburger button for mobile -->
            <button id="menu-toggle" class="lg:hidden btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <span class="text-xl font-bold">SazVer Publication</span>
        </div>
        <div class="flex items-center gap-4">
            <input type="text" placeholder="Search" class="input input-bordered w-32 md:w-auto" />
            <div class="relative">
                <button class="btn btn-circle btn-ghost">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17" />
                    </svg>
                    <span class="badge badge-sm indicator-item absolute -top-1 -right-1">8</span>
                </button>
            </div>
            <div class="dropdown dropdown-end">
                <div class="avatar">
                    <div class="w-10 rounded-full">
                        <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
                            alt="avatar" />
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="flex h-[calc(100vh-64px)]">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed lg:static z-40 inset-y-20 left-0 w-64 bg-white shadow-lg p-4 overflow-y-auto transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out">
            <x-sp-backend-aside :navigations="['my ebooks' => 'ebooks.my-ebooks', 'create' => 'ebooks.create', 'index' => 'ebooks.index']" />
        </aside>

        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-3xl font-semibold mb-6">My Books</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Book Card -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img class="w-full h-40 object-cover" src="https://via.placeholder.com/400x200" alt="book">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">Card Title</h2>
                        <p class="text-gray-600 mb-4">Short description goes here.</p>
                        <button
                            class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
                            View Details
                        </button>
                    </div>
                </div>
                <!-- Other Cards -->
                <div class="bg-white p-4 rounded shadow">📊 Dashboard Card</div>
                <div class="bg-white p-4 rounded shadow">👥 Users Info</div>
                <div class="bg-white p-4 rounded shadow">⚙️ Settings Panel</div>
            </div>
        </main>
    </div>
    <x-sp-backend-js />
</body>

</html>
