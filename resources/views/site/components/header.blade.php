<header>
    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile_menu">
        {{-- <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"> --}}
        <ul class="absolute h-full bg-blue-night-900 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
            <li>
                <a href="#"
                    class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700"
                    aria-current="page">Home</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 pr-4 pl-3 text-gray-100 border-b border-gray-100 
                      lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Produto</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 pr-4 pl-3 text-gray-100 border-b border-gray-100 
                    lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700
                    lg:p-0">Categoria</a>
            </li>
        </ul>
    </div>
    <nav class="px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl text-gray-200">
            <a href="/" class="flex items-center mb-3">
                <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap">Lojinha legal</span>
            </a>
            <div class="flex items-center justify-between w-full lg:order-2">
                <button data-collapse-toggle="mobile-menu-2" type="button" id="hamburger_button"
                    class="items-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="">
                    <button class="text-gray-100 bg-pumpkin-400 font-medium rounded-full text-xs px-3 py-1">
                        Login
                    </button>

                    <button
                        class="text-gray-100 bg-pumpkin-600 font-medium rounded-full text-xs px-3 py-1">
                        Cadastrar
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>
