<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Voting Platform</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-100">
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <span class="text-xl font-semibold text-gray-800">E-Vote</span>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-800 hover:text-blue-600">Home</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">About</a>
                <a href="#" class="text-gray-800 hover:text-blue-600">Contact</a>
                <a href="#" class="bg-yellow-600 text-blue px-4 py-2 rounded-md hover:bg-blue-700 hover:text-gray-50">Login</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="bg-yellow-500 text-white py-20">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">Secure GCTU Voting Platform</h1>
                <p class="text-xl mb-8">Exercise your right to vote from anywhere, anytime.</p>
                <a href="{{ route('voting.index')}}" class="bg-white text-gray-600 px-6 py-3 rounded-md text-lg font-semibold hover:bg-blue-700 hover:text-gray-50">Get Started</a>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Why Choose E-Vote?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <h3 class="text-xl font-semibold mb-2">Secure</h3>
                        <p class="text-gray-600">State-of-the-art encryption ensures your vote remains confidential and tamper-proof.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-xl font-semibold mb-2">Accessible</h3>
                        <p class="text-gray-600">Vote from anywhere with an internet connection, making participation easier than ever.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        <h3 class="text-xl font-semibold mb-2">Transparent</h3>
                        <p class="text-gray-600">Real-time results and audit trails ensure a fair and transparent voting process.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <span class="text-2xl font-semibold">E-Vote</span>
                    <p class="mt-2 text-sm">Empowering democracy through technology</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-blue-400">Privacy Policy</a>
                    <a href="#" class="hover:text-blue-400">Terms of Service</a>
                    <a href="#" class="hover:text-blue-400">Contact Us</a>
                </div>
            </div>
            <div class="mt-8 text-center text-sm">
                &copy; {{ date('Y') }} E-Vote. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>