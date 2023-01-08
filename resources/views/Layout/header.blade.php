<header class="bg-white">
    <div class="flex justify-between mx-auto py-5  max-w-screen-xl">

        <div>
            @if (str_contains(Request::path(), 'admin'))
                <a href="/admin" class="text-2xl font-bold">
                    Dashboard
                </a>
            @else
                <a href="/" class="text-2xl font-bold">
                    SKTM
                </a>
            @endif
        </div>
        <div>
            @if (str_contains(Request::path(), 'admin'))
                <a href="/logout"
                    class=" px-3 py-2 rounded border-2 border-red-500 hover:bg-red-500 hover:text-white cursor-pointer transition-all duration-400">Logout</a>
            @else
                <a href="/login"
                    class=" px-3 py-2 rounded border-2 border-gray-300 hover:bg-gray-200 cursor-pointer transition-all duration-400">Admin</a>
            @endif
        </div>
    </div>
</header>
