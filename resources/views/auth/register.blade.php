<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learnify - Register</title>
    @vite('resources/css/app.css')
    <style>
        /* Notification Container */
        #notification-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 300px;
        }

        /* Notification Style */
        .notification {
            display: flex;
            align-items: center;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 14px;
            animation: slide-in 0.5s ease-in-out;
            color: white;
        }

        .notification.success {
            background-color: #4caf50;
        }

        .notification.error {
            background-color: #f44336;
        }

        @keyframes slide-in {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slide-out {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }
    </style>
</head>
<body>
<div id="notification-container"></div>

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
            <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl xl:text-bold">
                Register</h2>

            <div class="mt-12">
                <form method="POST" action="{{ route('handle-register') }}">
                    @csrf

                    {{-- Email Field --}}
                    <div class="mt-8">
                        <div class="text-sm font-bold text-gray-700 tracking-wide">Email</div>
                        <input
                            class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                            type="email" placeholder="email@example.com" name="email" value="{{ old('email') }}" required>
                    </div>

                    {{-- Password Field --}}
                    <div class="mt-8">
                        <div class="text-sm font-bold text-gray-700 tracking-wide">Password</div>
                        <input
                            class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                            type="password" placeholder="Enter your password" name="password" required>
                    </div>

                    {{-- Confirm Password Field --}}
                    <div class="mt-8">
                        <div class="text-sm font-bold text-gray-700 tracking-wide">Confirm Password</div>
                        <input
                            class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500"
                            type="password" placeholder="Confirm your password" name="password_confirmation" required>
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-10">
                        <button
                            class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Image Section for Large Screen --}}
    <div id="image-login" class="hidden lg:flex items-center justify-center flex-1 h-screen"
         style="background-image: url('/img/assets/jumbotron.png');">
        <div class="max-w-xs transform duration-200 hover:scale-110 cursor-pointer">
            <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="" class="w-[1000px] lg:mr-4">
        </div>
    </div>
</div>

<script>
    // Show Notification Function
    function showNotification(message, type = 'success') {
        const container = document.getElementById('notification-container');

        // Create Notification
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.innerText = message;

        // Append Notification
        container.appendChild(notification);

        // Remove After 3 Seconds
        setTimeout(() => {
            notification.style.animation = 'slide-out 0.5s ease-in-out';
            notification.addEventListener('animationend', () => {
                notification.remove();
            });
        }, 3000);
    }

    // Display Notifications from Session or Validation Errors
    @if(session('success'))
        showNotification("{{ session('success') }}", 'success');
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            showNotification("{{ $error }}", 'error');
        @endforeach
    @endif
</script>
</body>
</html>
