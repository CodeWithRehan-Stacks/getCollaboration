<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GetCollaboration — Where Creators Meet Investors</title>
    <meta name="description" content="The smart platform connecting influencers and content creators with investors and businesses for powerful collaborations.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { }

        .hero-glow {
            background: radial-gradient(ellipse 80% 60% at 50% -10%, rgba(183, 201, 157, 0.15), transparent);
        }

        .glass {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(164, 187, 141, 0.2);
            backdrop-filter: blur(16px);
        }

        .glass-premium {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.04) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid rgba(164, 187, 141, 0.25);
            backdrop-filter: blur(20px);
        }

        .gradient-text {
            background: linear-gradient(135deg, #b7c99d, #b9be8f, #a5c897);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-primary {
            background: linear-gradient(135deg, #a4bb8d, #a5c897);
            color: #141811 !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #b7c99d, #b6c594);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 1;
        }

        .btn-primary:hover::before { opacity: 1; }
        .btn-primary > * { position: relative; z-index: 2; }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(165, 200, 151, 0.2); }

        .blob {
            filter: blur(100px);
            animation: drift 12s ease-in-out infinite alternate;
        }

        @keyframes drift {
            from { transform: translate(0, 0) scale(1); }
            to   { transform: translate(30px, -20px) scale(1.05); }
        }

        .feature-card { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .feature-card:hover {
            transform: translateY(-6px);
            border-color: rgba(183, 201, 157, 0.4);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            background: rgba(255, 255, 255, 0.04);
        }
    </style>
</head>
<body class="bg-brand-dark text-white antialiased overflow-x-hidden">

    <!-- Background Animated Blobs -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="blob absolute top-[-10%] left-[-5%] w-[600px] h-[600px] bg-primary-1/10 rounded-full"></div>
        <div class="blob absolute top-[40%] right-[-10%] w-[500px] h-[500px] bg-deep/5 rounded-full" style="animation-delay: 2s;"></div>
        <div class="blob absolute bottom-[-10%] left-[20%] w-[450px] h-[450px] bg-primary-2/5 rounded-full" style="animation-delay: 4s;"></div>
    </div>

    <!-- Header / Navigation -->
    <header class="relative z-50 border-b border-primary-1/10 bg-brand-dark/70 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 md:px-12 py-5">
            <div class="flex items-center gap-3 group cursor-pointer">
                <div class="w-9 h-9 bg-gradient-to-br from-primary-1 to-deep rounded-xl flex items-center justify-center shadow-md transition-transform group-hover:scale-105">
                    <svg class="w-5 h-5 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                </div>
                <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-primary-1 to-primary-3 bg-clip-text text-transparent">GetCollaboration</span>
            </div>

            <div class="flex items-center gap-4">
                @if(Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-5 py-2.5 text-sm font-medium text-gray-300 hover:text-white transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 text-sm font-medium text-gray-300 hover:text-white transition">Log in</a>
                        @if(Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-primary px-5 py-2.5 text-sm font-semibold rounded-xl shadow-md">
                                <span>Get Started</span>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <main class="relative z-10">
        <!-- Hero Section -->
        <section class="hero-glow text-center px-6 pt-28 pb-24 max-w-5xl mx-auto">
            <div class="inline-flex items-center gap-2 px-4 py-2 glass rounded-full text-xs md:text-sm text-primary-1 mb-8 font-medium tracking-wide shadow-inner border border-primary-1/20">
                <span class="w-2 h-2 bg-primary-1 rounded-full animate-ping"></span>
                AI-Powered Smart Matching Engine
            </div>

            <h1 class="text-5xl md:text-8xl font-black tracking-tight leading-[1.02] mb-6">
                Where <span class="gradient-text">Brands</span><br class="hidden md:block"> Meet <span class="gradient-text">Creators</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-12 leading-relaxed font-normal">
                An intelligent ecosystem built to bridge the gap. Our system auto-matches top brands and content creators with targeted investors based on precise niches, unlocking instant growth.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-primary w-full sm:w-auto px-8 py-4 font-bold rounded-xl text-base shadow-xl">
                        <span>Start Collaborating — Free</span>
                    </a>
                @endif
                <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 font-semibold text-gray-200 hover:text-white glass rounded-xl text-base transition hover:-translate-y-1 flex items-center justify-center gap-2">
                    Sign In <span>&rarr;</span>
                </a>
            </div>

            <!-- Stats Dynamic Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto mt-24 px-4">
                <div class="p-6 glass rounded-2xl border border-primary-1/10">
                    <div class="text-4xl font-black gradient-text">100%</div>
                    <div class="text-xs tracking-wider uppercase text-gray-500 font-semibold mt-2">Niche Matching Logic</div>
                </div>
                <div class="p-6 glass rounded-2xl border border-primary-1/10">
                    <div class="text-4xl font-black gradient-text">Direct</div>
                    <div class="text-xs tracking-wider uppercase text-gray-500 font-semibold mt-2">Creator, Brand & Investor Roles</div>
                </div>
                <div class="p-6 glass rounded-2xl border border-primary-1/10">
                    <div class="text-4xl font-black gradient-text">Real-Time</div>
                    <div class="text-xs tracking-wider uppercase text-gray-500 font-semibold mt-2">Chat & Deal Contract</div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="px-6 md:px-16 py-24 max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-black tracking-tight mb-4">Engineered for Seamless Growth</h2>
                <p class="text-gray-400 text-base md:text-lg max-w-2xl mx-auto">Say goodbye to cold emails. Get matched and secure partnerships in record time.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card glass-premium rounded-2xl p-8 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-primary-1/10 border border-primary-1/20 rounded-xl flex items-center justify-center mb-6 shadow-inner">
                            <svg class="w-6 h-6 text-primary-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 tracking-tight">Smart Niche-Match</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Our system scans profiles. When a brand's category aligns with a creator's exact niche and sub-niche, a direct match is generated automatically.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card glass-premium rounded-2xl p-8 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-primary-2/10 border border-primary-2/20 rounded-xl flex items-center justify-center mb-6 shadow-inner">
                            <svg class="w-6 h-6 text-primary-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 tracking-tight">Real-Time Messaging</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Instantly communicate with verified users on the other side through a high-performance, real-time live chat panel built for negotiation.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card glass-premium rounded-2xl p-8 flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 bg-deep/10 border border-deep/20 rounded-xl flex items-center justify-center mb-6 shadow-inner">
                            <svg class="w-6 h-6 text-deep" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 tracking-tight">Finalize Deals</h3>
                        <p class="text-gray-400 text-sm leading-relaxed">Lock and seal your collaborations smoothly. Confirm your terms and close deals straight out of the messaging screen.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="px-6 md:px-16 py-20 max-w-6xl mx-auto border-t border-primary-1/10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-extrabold mb-4">The Workflow</h2>
                <p class="text-gray-400 max-w-md mx-auto">Get verified, match with partners, and accelerate your business.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center relative">
                @foreach([
                    ['1', 'Authenticate & Choose Role', 'Sign up safely. Select either Creator, Brand, or Investor. Admins are strictly managed on the backend dashboard.', 'from-primary-1 to-primary-2'],
                    ['2', 'Fill Niche Information', 'Provide your core categories and profiles. Perfect data alignments yield high-converting matches.', 'from-primary-2 to-primary-3'],
                    ['3', 'Match, Chat & Collaborate', 'Review your tailored recommendation list. Chat directly with targets to finalize actionable contracts.', 'from-primary-3 to-deep'],
                ] as [$num, $title, $desc, $gradient])
                <div class="flex flex-col items-center p-6 bg-white/[0.01] border border-primary-1/10 rounded-2xl shadow-sm hover:bg-white/[0.02] transition">
                    <div class="w-14 h-14 bg-gradient-to-br {{ $gradient }} rounded-2xl flex items-center justify-center text-xl font-black shadow-lg mb-5 text-brand-dark">
                        {{ $num }}
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-gray-100 tracking-tight">{{ $title }}</h4>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-xs">{{ $desc }}</p>
                </div>
                @endforeach
            </div>
        </section>

        <!-- CTA Section -->
        <section class="px-6 py-24 text-center max-w-5xl mx-auto">
            <div class="glass-premium rounded-3xl px-8 py-16 border border-primary-1/20 shadow-2xl relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-48 h-48 bg-primary-1/10 rounded-full blur-3xl pointer-events-none"></div>
                <h2 class="text-3xl md:text-5xl font-black mb-4 tracking-tight">Ready to Transform Your Network?</h2>
                <p class="text-gray-400 mb-10 text-base md:text-lg max-w-xl mx-auto">Join GetCollaboration today and experience data-driven partnership growth.</p>
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-primary inline-block px-10 py-4 font-bold rounded-xl text-base shadow-xl">
                        <span>Create Your Free Account</span>
                    </a>
                @endif
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="text-center py-10 border-t border-primary-1/10 text-gray-500 text-sm font-medium tracking-wide">
        &copy; {{ date('Y') }} GetCollaboration. All rights reserved.
    </footer>

</body>
</html>