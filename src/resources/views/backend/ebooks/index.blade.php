{{-- <x-app-layout> --}}
<x-sp-backend-master>
    <x-slot name="header">
        <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">{{ __('Dashboard') }}</h1>
        </div>
    </x-slot>

    <!-- State cards -->
    <div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">

        <!-- My Ebook card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    My Ebook/s
                </h6>
                <span class="text-xl font-semibold">1</span>
                {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +3.1%
                </span> --}}
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">

                        <!-- Outer circle -->
                        <circle cx="12" cy="12" r="9" stroke-width="2" stroke="currentColor"
                            fill="none" />

                        <!-- Checkmark -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l2.5 2.5L16 9" />
                    </svg>

                </span>
            </div>
        </div>

        <!-- Ebook Reading Completion card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Ebook Reading Completed
                </h6>
                <span class="text-xl font-semibold">0</span>
                {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    0
                </span> --}}
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <!-- Book Icon -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M6 4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h7v-1H6V5h11v8h1V6c0-1.1-.9-2-2-2H6z" />
                        <rect x="8" y="8" width="7" height="2" rx="1" stroke="currentColor"
                            stroke-width="1" />

                        <!-- Circled Check Mark -->
                        <circle cx="18" cy="18" r="3.2" stroke="currentColor" stroke-width="1"
                            fill="none" />
                        <path d="M16.8 18l1 1 2-2" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>

                </span>
            </div>
        </div>

        <!-- Amount Spent for Ebook -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Amount Spent
                </h6>
                <span class="text-xl font-semibold">$1.20</span>
                {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +4.4%
                </span> --}}
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Other Available Ebooks card -->
        <div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
            <div>
                <h6
                    class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                    Other Available Ebooks
                </h6>
                <span class="text-xl font-semibold">2</span>
                {{-- <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
                    +3.1%
                </span> --}}
            </div>
            <div>
                <span>
                    <svg class="w-12 h-12 text-gray-300 dark:text-primary-dark" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <!-- Book shape -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 6a1 1 0 011-1c3 0 5 .5 8 2 3-1.5 5-2 8-2a1 1 0 011 1v12a1 1 0 01-1 1c-3 0-5 .5-8 2-3-1.5-5-2-8-2a1 1 0 01-1-1V6z" />

                        <!-- Center spine line -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7v10" />

                        <!-- Left page text lines (shifted left) -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.5 9h3M5.5 12h2.5M5.5 15h3" />

                        <!-- Right page text lines (shifted right) -->
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.5 9h3M16 12h2M15.5 15h3" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

</x-sp-backend-master>
{{-- </x-app-layout> --}}
