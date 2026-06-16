<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Your Role - GetCollaboration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="font-sans antialiased bg-slate-900 text-white min-h-screen relative overflow-hidden flex items-center justify-center">

    <!-- Decorative Background -->
    <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float" style="animation-delay: 2s;"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center w-full">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4 bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-blue-500">
            How do you want to join?
        </h1>
        <p class="text-lg text-slate-300 mb-12">Select your path to start collaborating and growing your network.</p>

        <form method="POST" action="{{ route('role.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @csrf
            
            <!-- Creator Card -->
            <button type="submit" name="role" value="creator" class="group relative text-left w-full focus:outline-none focus:ring-4 focus:ring-purple-500 rounded-3xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur-md"></div>
                <div class="relative glass-panel rounded-3xl p-8 h-full flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-purple-500/20 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold mb-3">Join as a Creator</h2>
                    <p class="text-slate-400">I am an influencer, content creator, or artist looking for brand deals and investments.</p>
                </div>
            </button>

            <!-- Investor Card -->
            <button type="submit" name="role" value="investor" class="group relative text-left w-full focus:outline-none focus:ring-4 focus:ring-blue-500 rounded-3xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur-md"></div>
                <div class="relative glass-panel rounded-3xl p-8 h-full flex flex-col items-center text-center">
                    <div class="w-20 h-20 bg-blue-500/20 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold mb-3">Join as an Investor</h2>
                    <p class="text-slate-400">I represent a business, brand, or venture capital looking to collaborate with creators.</p>
                </div>
            </button>

        </form>
    </div>

</body>
</html>
