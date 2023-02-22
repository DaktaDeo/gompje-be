<?php
$menuItems = [
    [
        'title' => 'Articles',
        'url' => '/articles',
    ],
    [
        'title' => 'Reviews',
        'url' => '/reviews',
    ],
    [
        'title' => 'Projects',
        'url' => '/projects',
    ],
    [
        'title' => 'Nantucket',
        'url' => '/nantucket',
    ],
    [
        'title' => 'Journal',
        'url' => '/journal',
    ],
];
?>

<header class="relative">
    <div class=" flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10 max-w-screen-xl mx-auto">
        <div class="lg:w-0 lg:flex-1">
            <a href="/" aria-label="Home" class="h-8 w-auto sm:h-10 fill-light-silver fill-dot">
                <img
                    class="h-10 w-10 md:h-12 md:w-12 lg:h-20 lg:w-20 rounded-full"
                    src="https://secure.gravatar.com/avatar/09251c08e3db9c6698f9fe621d4c1d6e?s=160&d=identicon"
                    alt=""
                />
            </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
            <button
                type="button"
                class=" inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out "
                @click.prevent="isMobile = true"
            >
                <!-- Heroicon name: menu -->
                <svg
                    class="h-6 w-6"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>
        </div>
        <nav class="md:flex space-x-10">
            @foreach($menuItems as $item)
                <a href="{{$item['url']}}"
                   class="text-base leading-6 font-medium text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 focus:outline-none focus:text-gray-900 dark:focus:text-gray-100 transition ease-in-out duration-150">
                    {{$item['title']}}
                </a>
            @endforeach
        </nav>
        <div class=" hidden md:flex items-center justify-end space-x-8 md:flex-1 lg:w-0 ">
            <div class="flex-1 flex items-center justify-end">
                <button id="header__sun" onclick="toSystemMode()" title="Switch to system theme" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">

                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12A10 10 0 0 0 12 22A10 10 0 0 0 22 12A10 10 0 0 0 12 2M12 4A8 8 0 0 1 20 12A8 8 0 0 1 12 20V4Z" />
                    </svg>
                </button>
                <button id="header__moon" onclick="toLightMode()" title="Switch to light mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                    </svg>
                </button>
                <button id="header__indeterminate" onclick="toDarkMode()" title="Switch to dark mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div
        x-show="isMobile"
        x-transition:enter="transition ease-out duration-200"
        class="hidden absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-50 bg-gray-100"
    >
        <div class="rounded-lg shadow-lg">
            <div class=" rounded-lg shadow-xs bg-primary-color-dark divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5 space-y-6">
                    <div class="flex items-center justify-between">
                        <img
                            class="h-10 w-10 md:h-12 md:w-12 lg:h-20 lg:w-20 rounded-full"
                            src="https://secure.gravatar.com/avatar/09251c08e3db9c6698f9fe621d4c1d6e?s=80&d=identicon"
                            alt=""
                        />

                        <div class="-mr-2">
                            <button
                                type="button"
                                class=" inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus-gray-900 focus:text-gray-500 dark:focus:text-gray-500 transition duration-150 ease-in-out "
                            >
                                <!-- Heroicon name: x -->
                                <svg
                                    class="h-6 w-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <nav class="grid grid-cols-1 gap-7">
                            @foreach($menuItems as $item)
                                <a href="{{$item['url']}}"
                                    class="text-base leading-6 font-medium text-gray-600"
                                >
                                    {{ $item['title'] }}
                                </a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
