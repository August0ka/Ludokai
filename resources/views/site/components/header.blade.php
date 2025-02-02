    <header>
        <!-- Sidebar Hamburguer -->
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
                        @foreach($categories as $category)
                        <li class="">
                            <div
                                class="flex items-center border-l hover:border-gray-200 text-pumpkin-500 hover:text-pumpkin-300">
                                <a href=""
                                    class="flex items-center space-x-2 hover:text-gray-100 ml-2">
                                    <span>{{ $category->name }}</span>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Sidebar Hamburguer -->

        <!-- Header -->
        <nav class="py-2.5">
            <div class="grid grid-cols-12 text-gray-200">
                <a href="/" class="col-span-12 mb-3 ml-5">
                    <div class="flex items-center">
                        <img src="{{ asset('images/banner.svg') }}" class="w-28 lg:w-32" alt="Ludokai_banner" />
                    </div>
                </a>
                <div class="col-span-12 h-10 bg-vivid-violet-950 flex items-center justify-between">
                    <div class="flex ml-5">
                        <button type="button" id="sidebar_button"
                            class="items-center text-sm text-gray-500 rounded-lg mr-10 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <form class="flex w-80">
                            <input type="search"
                                id="search"
                                class="block w-full py-1 px-2 text-sm text-gray-900 border border-pumpkin-300 rounded-l-lg bg-pumpkin-200 focus:outline-none focus:ring-pumpkin-300 focus:border-pumpkin-500"
                                placeholder="Pesquisar..."
                                required />
                            <button type="submit"
                                class="text-vivid-violet-950 bg-pumpkin-600 hover:bg-pumpkin-500 focus:ring-4 focus:outline-none focus:ring-pumpkin-300 font-medium rounded-r-lg text-sm px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>

                            </button>
                        </form>

                    </div>
                    <div>
                        @auth
                        <span class="text-gray-100 font-medium text-xs md:text-lg xl:text-base px-2">
                            Olá, {{ Str::before(Auth::user()->name, ' ') }}
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
        <!-- End Header -->
    </header>