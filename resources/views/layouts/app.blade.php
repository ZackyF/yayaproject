<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <header class="px-4 py-2 shadow" style="background-color: #B16AB7;">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="h-8 w-auto mr-4">

                <button data-search class="p-4 md:hidden focus:outline-none" type="button">
                    <svg data-search-icon class="fill-current w-4 text-white" viewBox="0 0 512 512">
                        <path d="M225.474 0C101.151 0 0 101.151 0 225.474c0 124.33 101.151 225.474 225.474 225.474 124.33 0 225.474-101.144 225.474-225.474C450.948 101.151 349.804 0 225.474 0zm0 409.323c-101.373 0-183.848-82.475-183.848-183.848S124.101 41.626 225.474 41.626s183.848 82.475 183.848 183.848-82.475 183.849-183.848 183.849z" />
                        <path d="M505.902 476.472L386.574 357.144c-8.131-8.131-21.299-8.131-29.43 0-8.131 8.124-8.131 21.306 0 29.43l119.328 119.328A20.74 20.74 0 00491.187 512a20.754 20.754 0 0014.715-6.098c8.131-8.124 8.131-21.306 0-29.43z" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center">
                <!-- Search Input Field -->
                <input type="text" placeholder="Search..." class="px-4 py-2 mr-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-300">

                <!-- Dropdown Menu -->
                <button data-dropdown class="flex items-center px-3 py-2 focus:outline-none hover:bg-gray-200 hover:rounded-md" type="button" x-data="{ open: false }" @click="open = true" :class="{ 'bg-gray-200 rounded-md': open }">
                    <i class="bi bi-person-circle text-white h-6 w-6 ml-2"></i>
                    <span class="ml-4 text-sm hidden md:inline-block text-white">Admin</span>
                    <div data-dropdown-items class="text-sm text-left absolute top-0 right-0 mt-16 mr-4 bg-white rounded border border-gray-400 shadow" x-show="open" @click.away="open = false">
                        <ul>
                            <li class="px-4 py-3 border-b hover:bg-gray-200"><a href="#">My Profile</a></li>
                            <li class="px-4 py-3 border-b hover:bg-gray-200"><a href="#">Settings</a></li>
                            <li class="px-4 py-3 hover:bg-gray-200"><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </button>
            </div>
        </div>
    </header>



    <div class="flex flex-row">
        <div class="flex flex-col w-64 h-screen overflow-y-auto" style="background-color: #ffffff; border-right: 1px solid #242830;">
            <div class="sidebar text-center" style="background-color: #ffffff;">
                <div class="text-xl" style="color: #ffffff;">
                    <div class="my-2" style="background-color: #ffffff; height: 1px;"></div>
                </div>
                <a href="{{ route('admin/home') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white" style="background-color: #f9f9f9; color: #E2E8F0;" onmouseover="this.style.backgroundColor='#B16AB7'" onmouseout="this.style.backgroundColor='#f9f9f9'">
                        <i class="bi bi-grid text-gray-700"></i>
                        <span class="text-[15px] ml-4 font-bold" style="color: #000000;">Dashboard</span>
                    </div>
                </a>
                <a href="{{ route('admin/assets') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white" style="background-color: #f9f9f9; color: #E2E8F0;" onmouseover="this.style.backgroundColor='#B16AB7'" onmouseout="this.style.backgroundColor='#f9f9f9'">
                        <i class="bi bi-bookmark-fill text-gray-700"></i>
                        <span class="text-[15px] ml-4 font-bold" style="color: #000000;">Asset</span>
                    </div>
                </a>
                <a href="{{ route('admin/profile') }}">
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white" style="background-color: #f9f9f9; color: #E2E8F0;" onmouseover="this.style.backgroundColor='#B16AB7'" onmouseout="this.style.backgroundColor='#f9f9f9'">
                        <i class="bi bi-person-circle text-gray-700"></i> <!-- Changed icon to 'bi-person-circle' for Profile -->
                        <span class="text-[15px] ml-4 font-bold" style="color: #000000;">Profile</span>
                    </div>
                </a>
                <a href="{{ route('logout') }}">
                    <div class="my-4" style="background-color: #2D3748; height: 1px;"></div>
                    <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer text-white" style="background-color: #f9f9f9; color: #E2E8F0;" onmouseover="this.style.backgroundColor='#B16AB7'" onmouseout="this.style.backgroundColor='#f9f9f9'">
                        <i class="bi bi-box-arrow-in-right text-gray-700"></i>
                        <span class="text-[15px] ml-4 font-bold" style="color: #000000;">Logout</span>
                    </div>
                </a>

            </div>
        </div>

        <div class="flex flex-col w-full h-screen px-4 py-8 mt-10">
            <div>@yield('contents')</div>
        </div>
    </div>
</body>

</html>
