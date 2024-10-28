<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Learnify</title>
        @vite('resources/css/app.css')
    </head>
    <body class>
        <div class="lg:flex">
            <div class="lg:px-20">
                <div class="py-12 bg-indigo-100 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                    <div class="cursor-pointer flex items-center">
                        <div>
                            <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="" class="w-[30px] lg:mr-4">
                        </div>
                        <div class="text-2xl text-indigo-800 tracking-wide ml-2 font-semibold">Learnify</div>
                    </div>
                </div>
                <div class="sm:p-10 md:p-0">
                    <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Log in</h2>
                    <div class="mt-12">
                        <form method="POST" action="">
                            @csrf
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Username</div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="username" name="username">
                            </div>
                            <div class="mt-8">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                    <div>
                                        <a class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <input type="password" class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500" type="" placeholder="Enter your password" name="password">
                            </div>
                            <div class="mt-10">
                                <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                                    Log In
                                </button>
                            </div>
                        </form>
                        <div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
                            Don't have an account ? <a href="" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="image-login" class="hidden lg:flex items-center justify-center flex-1 h-screen" style="background-image: url('/img/assets/jumbotron.png');">
                <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
                    <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="" class="w-[1000px] lg:mr-4">
                </div>
            </div>
        </div>
    </body>
</html>