<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jay Shree Krishna</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.3/tailwind.min.css"/>    
        <style>
            .cs-font{
                font-family: poppins;
            }
        </style>
    </head> 
    <body class="antialiased bg-gray-50 cs-font" >
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0" >
            <div id="col-1" class="bg-blue-900 px-12 pt-32 pb-40 md:px-32 xl:py-64 xl:px-32" 
                style="background-image: url('https://image3.mouthshut.com/images/imagesp/925754163s.jpg');">
                <h1 class="text-blue-500 font-extrabold text-4xl md:text-6xl" >
                    Jay Shree Krishna
                </h1>
                <p class="text-white text-normal md:text-3xl pt-3 md:pt-6 font-medium">Book Managment Systems.</p>
            </div>
            <div id="col-2" class="px-3 md:px-20 xl:py-64 xl:px-12">
                @if (Route::has('login'))
                    @auth
                        <div id="cards" class="rounded-lg flex border py-5 px-6 md:py-8 md:px-16 mt-6 md:mt-12 bg-white xl:pl-8 xl:rounded-xl">
                            <div id="circle" class="w-8 h-8 bg-blue-500 md:w-16 md:h-16 rounded-full"></div>
                            <p class="pl-4 md:pl-12 text-base pt-1 font-semibold md:text-2xl md:pt-4"><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></p>
                        </div>
                    @else
                        <div id="cards" class="rounded-lg flex border py-5 px-6 md:py-8 md:px-16 mt-6 md:mt-12 bg-white xl:pl-8 xl:rounded-xl">
                            <div id="circle" class="w-8 h-8 bg-blue-500 md:w-16 md:h-16 rounded-full"></div>
                            <p class="pl-4 md:pl-12 text-base pt-1 font-semibold md:text-2xl md:pt-4"><a href="{{ route('login') }}">Log in</a></p>
                        </div>
                        @if (Route::has('register'))
                            <div id="cards" class="rounded-lg flex border py-5 px-6 md:py-8 md:px-16 mt-6 md:mt-12 bg-white xl:pl-8 xl:rounded-xl">
                                <div id="circle" class="w-8 h-8 bg-blue-500 md:w-16 md:h-16 rounded-full"></div>
                                <p class="pl-4 md:pl-12 text-base pt-1 font-semibold md:text-2xl md:pt-4"><a href="{{ route('register') }}">Register</a></p>
                            </div>
                        @endif
                    @endauth
                @endif              
            </div>
        </div>
    </body>
</html>