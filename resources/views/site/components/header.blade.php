<div id="search-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-[5] hidden"></div>

<header>
    <nav class="py-2.5">
        <div class="grid grid-cols-12 text-gray-200">
            <div class="col-span-12 mb-3 ml-5">
                <div class="flex">
                    <a href="/">
                        <img src="{{ asset('images/banner.svg') }}" class="w-28 lg:w-32 hover:scale-110 transition-transform duration-300" alt="Ludokai_banner" />
                    </a>
                </div>
                </div>
            <div class="col-span-12 h-10 bg-vivid-violet-950 flex items-center justify-between" id="web-header">
                <div class="flex ml-3 lg:ml-5">
                    <div class="relative mr-2" id="dropdown-container">
                        <button
                            class="text-gray-100 bg-pumpkin-700 hover:bg-pumpkin-800 focus:ring-4 focus:outline-none focus:ring-pumpkin-300 font-medium rounded-lg text-sm px-1.5 lg:px-5 py-2 text-center inline-flex items-center">
                            Categorias
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <div class="absolute z-10 hidden bg-pumpkin-600 divide-y divide-gray-100 rounded-lg shadow-sm w-44"
                            id="dropdown-menu">
                            <ul class="py-2 text-sm text-gray-100 ">
                                <li>
                                    <a href="{{ route('site.home') }}" class="block px-4 py-2 hover:bg-pumpkin-700">
                                        Todas
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('site.home', ['category' => $category->id]) }}"
                                            class="block px-4 py-2 hover:bg-pumpkin-700">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Search Web -->
                    <form class="hidden md:flex w-52 lg:w-80 2xl:lg:w-80" method="GET"
                        action="{{ route('site.home') }}">
                        <input type="search" id="search" name="search"
                            value="{{ request()->search ? request()->search : '' }}"
                            class="block w-full py-1 px-2 text-sm text-gray-900 border border-pumpkin-300 rounded-l-lg bg-pumpkin-200 focus:outline-none focus:ring-pumpkin-300 focus:border-pumpkin-500"
                            placeholder="Pesquisar..." />
                        <button type="submit"
                            class="text-vivid-violet-950 bg-pumpkin-600 hover:bg-pumpkin-500 focus:ring-4 focus:outline-none focus:ring-pumpkin-300 font-medium rounded-r-lg text-sm px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>

                        </button>
                    </form>

                    <!-- Search Mobile -->
                    <button type="button" id="search-mobile-button"
                        class="block md:hidden text-gray-100 bg-pumpkin-600 hover:bg-pumpkin-500 focus:ring-4 focus:outline-none focus:ring-pumpkin-300 font-medium rounded-full text-sm px-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                <div>
                    @auth
                        <div class="flex items-center">
                            <span class="text-gray-100 font-medium text-xs md:text-lg lg:text-base xl:text-base px-2">
                                Olá, {{ Str::before(Auth::user()->name, ' ') }}
                            </span>

                            <a href="{{ route('site.mySales') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5 block lg:hidden 2xl:hidden mr-2 text-pumpkin-600 hover:text-pumpkin-500">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="{{ route('site.mySales') }}"
                                class="text-gray-100 mr-1 hidden bg-pumpkin-400 hover:bg-pumpkin-500 font-medium rounded-full text-xs px-3 py-1
                                lg:text-base lg:block
                                md:text-lg
                                xl:text-base 
                                2xl:block">
                                Meus Pedidos
                            </a>

                            <a href="{{ route('site.logout') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 block lg:hidden 2xl:hidden mr-2 text-pumpkin-600 hover:text-pumpkin-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                </svg>
                            </a>

                            <a href="{{ route('site.logout') }}"
                                class="text-gray-100 mr-1 hidden bg-pumpkin-600 hover:bg-pumpkin-700 font-medium rounded-full text-xs px-3 py-1
                                md:text-lg 
                                lg:text-base lg:block 
                                xl:text-base 
                                2xl:block">
                                Sair
                            </a>
                        </div>
                    @else
                        <a href="{{ route('site.login') }}"
                            class="text-gray-100 mr-3 bg-pumpkin-400 hover:bg-pumpkin-500 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                            Entrar
                        </a>
                    @endauth
                </div>
            </div>

            <div class="hidden col-span-12 bg-vivid-violet-950 items-center justify-between z-[6]"
                id="mobile-search-header">
                <form class="bg-pumpkin-600 h-10 flex items-center w-full lg:w-80 2xl:lg:w-80" method="GET"
                    action="{{ route('site.home') }}" id="mobile-search-form">
                    <button type="submit" class="text-vivid-violet-950 font-medium rounded-r-lg text-sm px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>

                    </button>
                    <input type="search" id="search" name="search"
                        value="{{ request()->search ? request()->search : '' }}"
                        class="block w-full h-10 py-1 px-2 text-sm text-gray-900 border bg-pumpkin-200 border-pumpkin-300 focus:outline-none focus:ring-pumpkin-300 focus:border-pumpkin-500"
                        placeholder="Pesquisar..." />
                </form>
            </div>
        </div>
    </nav>
</header>
