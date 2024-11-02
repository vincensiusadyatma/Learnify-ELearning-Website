<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
<div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="bg-white sm:px-6 lg:w-[498px] rounded-[10px]">
            <div class="flex justify-between items-end mt-12 sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in</h2>
                <button id="closeModalButton" class="text-end">X</button>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('handle-login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email"
                               class="block text-sm font-medium leading-6 text-gray-900 text-start">Username
                            atau email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" required
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required
                                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        <div class="text-sm text-end">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Sign in
                        </button>
                    </div>
                    <div class="border border-black"></div>
                    <div>
                        <button class="mb-10">
                            <img src="https://placehold.co/50x50" alt="">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
