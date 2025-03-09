<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Ludokai Admin</title>
</head>

<body class="overflow-x-hidden">
    <!-- Mobile Toggle Button (fixed) -->
    <div class="fixed top-0 left-0 z-30 lg:hidden bg-vivid-violet-950 p-2 flex justify-between items-center w-full">
        <button id="toggleSidebar" class="text-white p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
        <div class="flex justify-start">
            <img class="h-10" src="{{ asset('images/banner.svg') }}" alt="Ludokai_banner">
        </div>
    </div>

    <!-- Dark Overlay (mobile only) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <div class="flex lg:min-h-screen">
        <!-- Sidebar -->
        <nav id="sidebarMenu"
            class="fixed top-0 left-0 h-full bg-vivid-violet-950 w-64 p-4 shadow-md z-40 lg:z-0 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out lg:w-48">
            <div class="flex justify-between items-center mb-6">
                <img class="h-16" src="{{ asset('images/banner.svg') }}" alt="Ludokai_banner">
                <!-- Close button (mobile only) -->
                <button id="closeSidebar" class="lg:hidden text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-col mt-5">
                <div class="flex-1">
                    <ul class="space-y-3">
                        <li class="">
                            <div
                                class="flex items-center border-l {{ Route::is('admin.users.*') ? 'border-gray-200' : 'border-gray-400' }} hover:border-gray-200 text-pumpkin-500 hover:text-pumpkin-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="ml-1.5 size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                </svg>

                                <a href="{{ route('admin.users.index') }}"
                                    class="flex items-center space-x-2 hover:text-gray-100 ml-2 
                                    {{ Route::is('admin.users.*') ? 'text-gray-100' : 'text-gray-400' }}">
                                    <span>Usuários</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div
                                class="flex items-center border-l {{ Route::is('admin.products.*') ? 'border-gray-200' : 'border-gray-400' }} hover:border-gray-200 text-pumpkin-500 hover:text-pumpkin-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="ml-1.5 size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                </svg>

                                <a href="{{ route('admin.products.index') }}"
                                    class="flex items-center space-x-2 hover:text-gray-100 ml-2 
                                    {{ Route::is('admin.products.*') ? 'text-gray-100' : 'text-gray-400' }}">
                                    <span>Produtos</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div
                                class="flex items-center border-l {{ Route::is('admin.categories.*') ? 'border-gray-200' : 'border-gray-400' }} hover:border-gray-200 text-pumpkin-500 hover:text-pumpkin-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="ml-1.5 size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>

                                <a href="{{ route('admin.categories.index') }}"
                                    class="flex items-center space-x-2 hover:text-gray-100 ml-2
                                    {{ Route::is('admin.categories.*') ? 'text-gray-100' : 'text-gray-400' }}">
                                    <span>Categorias</span>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div
                                class="flex items-center border-l {{ Route::is('admin.sales.*') ? 'border-gray-200' : 'border-gray-400' }} hover:border-gray-200 text-pumpkin-500 hover:text-pumpkin-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="ml-1.5 size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>

                                <a href="{{ route('admin.sales.index') }}"
                                    class="flex items-center space-x-2 hover:text-gray-100 ml-2
                                    {{ Route::is('admin.sales.*') ? 'text-gray-100' : 'text-gray-400' }}">
                                    <span>Vendas</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul class="mt-4 space-y-4">
                    <li>
                        <div
                            class="flex items-center border-l border-gray-400 hover:border-gray-200 text-pumpkin-500 hover:text-pumpkin-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="ml-1.5 size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                            </svg>

                            <a class="flex items-center space-x-2 text-gray-400 hover:text-gray-100 ml-2"
                                href="{{ route('admin.logout') }}">
                                <span>Sair</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 ml-0 lg:ml-48 p-2 lg:p-6 mt-6 lg:mt-0">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#toggleSidebar').click(function() {
                $('#sidebarMenu').removeClass('-translate-x-full');
                $('#sidebarOverlay').removeClass('hidden');
                $('body').addClass('overflow-hidden');
            });

            $('#closeSidebar, #sidebarOverlay').click(function() {
                $('#sidebarMenu').addClass('-translate-x-full');
                $('#sidebarOverlay').addClass('hidden');
                $('body').removeClass('overflow-hidden');
            });

            if (window.innerWidth < 1024) {
                $('#sidebarMenu a').click(function() {
                    $('#sidebarMenu').addClass('-translate-x-full');
                    $('#sidebarOverlay').addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                });
            }

            $(window).resize(function() {
                if (window.innerWidth >= 1024) {
                    $('#sidebarMenu').removeClass('-translate-x-full');
                    $('#sidebarOverlay').addClass('hidden');
                    $('body').removeClass('overflow-hidden');
                } else {
                    $('#sidebarMenu').addClass('-translate-x-full');
                }
            });
        });
    </script>

    @yield('scripts')
</body>

</html>
