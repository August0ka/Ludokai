<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script>
        document.documentElement.setAttribute('data-theme', localStorage.getItem('theme') || 'dark');
    </script>
    <title>Ludokai Admin</title>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="w-64 bg-gray-200 dark:bg-gray-800 p-4 shadow-md">
            <div class="flex flex-col h-full">
                <ul class="mt-10 mb-4 space-y-4">
                    <li>
                        <button id="btnSwitch"
                            class="btn-theme-toggle w-full px-4 py-2 bg-gray-800 text-white dark:bg-gray-200 dark:text-black rounded shadow">
                            <i id="themeIcon" class="bi bi-moon-stars"></i>
                        </button>
                    </li>
                </ul>
                <div class="flex-1">
                    <ul class="space-y-4">
                        <li>
                            <a class="flex items-center space-x-2 text-gray-900 dark:text-gray-100"
                                href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i>
                                <span>Usuários</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center space-x-2 text-gray-900 dark:text-gray-100"
                                href="{{ route('products.index') }}">
                                <i class="bi bi-shop"></i>
                                <span>Produtos</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center space-x-2 text-gray-900 dark:text-gray-100"
                                href="{{ route('categories.index') }}">
                                <i class="bi bi-tags"></i>
                                <span>Categorias</span>
                            </a>
                        </li>
                        <li>
                            <a class="flex items-center space-x-2 text-gray-900 dark:text-gray-100"
                                href="{{ route('sales.index') }}">
                                <i class="bi bi-cash-coin"></i>
                                <span>Vendas</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="mt-4 space-y-4">
                    <li>
                        <a class="flex items-center space-x-2 text-gray-900 dark:text-gray-100"
                            href="{{ route('admin.logout') }}">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            let storedTheme = localStorage.getItem('theme') || 'dark';
            localStorage.setItem('theme', storedTheme);

            if (storedTheme === 'light') {
                applyLightTheme();
            } else {
                applyDarkTheme();
            }

            $('#btnSwitch').click(function() {
                let currentTheme = $('html').attr('data-theme');
                if (currentTheme === 'dark') {
                    applyLightTheme();
                    localStorage.setItem('theme', 'light');
                } else {
                    applyDarkTheme();
                    localStorage.setItem('theme', 'dark');
                }
            });

            function applyLightTheme() {
                $('#themeIcon').removeClass('bi-brightness-high').addClass('bi-moon-stars');
                $('html').attr('data-theme', 'light');
            }

            function applyDarkTheme() {
                $('#themeIcon').removeClass('bi-moon-stars').addClass('bi-brightness-high');
                $('html').attr('data-theme', 'dark');
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
