    <header>
        <div id="sidebarOverlay"
            class="fixed inset-0 bg-black bg-opacity-70 hidden z-40">
        </div>
        <nav id="sidebarMenu"
            class="bg-vivid-violet-950 fixed top-0 left-0 w-64 h-screen p-4 shadow-md transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
            <div class="flex justify-start">
                <img class="h-20" src="{{ asset('images/banner.svg') }}" alt="Ludokai_banner">
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

        <nav class="py-2.5">
            <div class="grid grid-cols-12 text-gray-200">
                <a href="/" class="col-span-12 mb-3 ml-5">
                    <div class="flex items-center">
                        <img src="{{ asset('images/banner.svg') }}" class="w-28 lg:w-32" alt="Ludokai_banner" />
                    </div>
                </a>
                <div class="col-span-12 h-10 bg-vivid-violet-950 flex items-center justify-between">
                    <div class="ml-5">
                        <button type="button" id="sidebar_button"
                            class="items-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div>
                        @auth
                        <span class="text-gray-100 font-medium text-xs md:text-lg xl:text-base px-2">
                            Olá, {{ substr(Auth::user()->name, 0, strpos(Auth::user()->name, ' ')) }}
                        </span>
                        <a href="{{ route('site.mySales') }}"
                            class="text-gray-100 mr-1 bg-pumpkin-400 hover:bg-pumpkin-500 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                            Meus Pedidos
                        </a>
                        <a href="{{ route('site.logout') }}"
                            class="text-gray-100 mr-1 bg-pumpkin-600 hover:bg-pumpkin-700 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                            Sair
                        </a>
                        @else
                        <a href="{{ route('site.login') }}"
                            class="text-gray-100 mr-3 bg-pumpkin-400 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                            Login
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>