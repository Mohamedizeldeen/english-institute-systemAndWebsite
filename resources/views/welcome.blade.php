// ...existing code...
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Eagle Institute') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <script>
        function toggleMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
            document.getElementById('mobile-menu-btn').classList.toggle('open');
        }
        function toggleDark() {
            const html = document.documentElement;
            html.classList.toggle('dark');
            try { localStorage.theme = html.classList.contains('dark') ? 'dark' : 'light' } catch(e){}
        }
        (function(){
            try {
                if (localStorage.theme === 'dark') document.documentElement.classList.add('dark');
            } catch(e){}
        })();
    </script>
    <style>
        .hamburger { transition: transform .25s ease; }
        .hamburger .line { transition: transform .25s ease, opacity .2s ease; transform-origin: center; }
        .hamburger.open .line-1 { transform: rotate(45deg) translateY(6px); }
        .hamburger.open .line-2 { opacity: 0; transform: translateX(-10px); }
        .hamburger.open .line-3 { transform: rotate(-45deg) translateY(-6px); }
    </style>
</head>
<body class="font-sans antialiased bg-white dark:bg-[#0b0b0c] text-slate-900 dark:text-slate-100 min-h-screen flex flex-col">

    <!-- Section 1: Navbar -->
    <header class="w-full fixed top-0 left-0 z-50">
        <div class="backdrop-blur-sm bg-white/60 dark:bg-[#071022]/60 border-b border-white/30 dark:border-black/30">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <a href="{{ url('/') }}" class="flex items-center gap-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 rounded-md shadow-sm object-cover">
                        <div class="leading-tight">
                            <div class="text-lg font-bold tracking-tight">Eagle Institute</div>
                            <div class="text-xs text-slate-600 dark:text-slate-400 -mt-0.5">English • Fluent • Confident</div>
                        </div>
                    </a>

                    <nav class="hidden md:flex items-center gap-6">
                        <a href="#about" class="text-sm font-medium hover:text-[#0184ff] transition">About</a>
                        <a href="#features" class="text-sm font-medium hover:text-[#0184ff] transition">Why English</a>
                        <a href="#courses" class="text-sm font-medium hover:text-[#0184ff] transition">Courses</a>
                        <a href="#instructors" class="text-sm font-medium hover:text-[#0184ff] transition">Instructors</a>
                        <a href="#testimonials" class="text-sm font-medium hover:text-[#0184ff] transition">Testimonials</a>
                    </nav>

                    <div class="flex items-center gap-3">
                        <button aria-label="Toggle theme" onclick="toggleDark()" class="hidden sm:inline-flex items-center justify-center h-9 px-3 rounded-md bg-white/70 dark:bg-white/6 text-sm hover:shadow transition">
                            <svg class="w-5 h-5 text-slate-800 dark:text-slate-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
                        </button>

                        @if (Route::has('login'))
                            <div class="hidden md:flex items-center gap-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold px-3 py-2 rounded-md bg-[#0184ff] text-white hover:bg-[#e42a00] transition">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm font-medium">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-sm font-semibold px-3 py-2 rounded-md bg-[#0184ff] text-white hover:bg-[#e42a00] transition">Sign up</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                        <button id="mobile-menu-btn" onclick="toggleMenu()" class="md:hidden ml-1 p-2 rounded-md hamburger" aria-label="Toggle menu">
                            <span class="block w-5 h-0.5 bg-slate-800 dark:bg-slate-100 line line-1"></span>
                            <span class="block w-5 h-0.5 bg-slate-800 dark:bg-slate-100 mt-1 line line-2"></span>
                            <span class="block w-5 h-0.5 bg-slate-800 dark:bg-slate-100 mt-1 line line-3"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div id="mobile-menu" class="md:hidden hidden border-t border-white/20 dark:border-black/20">
                <div class="px-4 py-4 space-y-2">
                    <a href="#about" class="block px-3 py-2 rounded-md hover:bg-slate-100 dark:hover:bg-white/5">About</a>
                    <a href="#features" class="block px-3 py-2 rounded-md hover:bg-slate-100 dark:hover:bg-white/5">Why English</a>
                    <a href="#courses" class="block px-3 py-2 rounded-md hover:bg-slate-100 dark:hover:bg-white/5">Courses</a>
                    <a href="#instructors" class="block px-3 py-2 rounded-md hover:bg-slate-100 dark:hover:bg-white/5">Instructors</a>
                    <a href="#testimonials" class="block px-3 py-2 rounded-md hover:bg-slate-100 dark:hover:bg-white/5">Testimonials</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Section 2: Hero -->
    <section id="hero" class="pt-28 lg:pt-36 pb-16 lg:pb-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex flex-col lg:flex-row items-center gap-10">
            <div class="w-full lg:w-6/12">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight drop-shadow-sm">
                    Master English. Speak with confidence.
                </h1>
                <p class="mt-4 text-lg md:text-xl text-slate-700 dark:text-slate-300 max-w-2xl">
                    Practical English courses, native and bilingual mentors, live conversation labs and exam-focused prep — designed to make you fluent faster.
                </p>

                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="#courses" class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-gradient-to-r from-[#FF6A4D] to-[#0184ff] text-white font-semibold shadow-lg hover:scale-[1.02] transform transition">Explore Courses</a>
                    <a href="#about" class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-slate-200 dark:border-white/10 text-slate-800 dark:text-slate-100 hover:bg-slate-50 dark:hover:bg-white/3 transition">Why Eagle</a>
                </div>

                <div class="mt-6 flex items-center gap-6">
                    <div class="flex items-center gap-3">
                        <div class="inline-flex items-center justify-center rounded-full bg-white/80 dark:bg-white/6 p-2 shadow-sm">
                            <svg class="w-6 h-6 text-[#0184ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold">20k+ Learners</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">Improved fluency</div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="inline-flex items-center justify-center rounded-full bg-white/80 dark:bg-white/6 p-2 shadow-sm">
                            <svg class="w-6 h-6 text-[#0ea5a4]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6m-6 4h4"/></svg>
                        </div>
                        <div>
                            <div class="text-sm font-semibold">Native Mentors</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">Conversation-first</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-6/12 relative">
                <div class="relative rounded-3xl shadow-2xl overflow-hidden ring-1 ring-black/5 dark:ring-white/5">
                    <img src="{{ asset('images/hero-lg.jpg') }}" alt="Hero image" class="w-full h-80 lg:h-[420px] object-cover block" />
                    <div class="absolute left-6 bottom-6 bg-white/90 dark:bg-[#0b1220]/80 rounded-xl p-4 shadow-lg backdrop-blur">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/student1.jpg') }}" alt="student" class="h-12 w-12 rounded-full object-cover ring-2 ring-white/80" />
                            <div>
                                <div class="font-semibold">Live conversation lab</div>
                                <div class="text-sm text-slate-500 dark:text-slate-400">Practice speaking with peers & mentors</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-3 gap-3">
                    <div class="bg-[#0ea5a4] dark:bg-white/6 rounded-xl p-3 text-center shadow hover:scale-105 transform transition">
                        <div class="text-sm font-bold">Speaking</div>
                        <div class="text-xs text-white">Live labs</div>
                    </div>
                    <div class="bg-[#0ea5a4] dark:bg-white/6 rounded-xl p-3 text-center shadow hover:scale-105 transform transition">
                        <div class="text-sm font-bold">Writing</div>
                        <div class="text-xs text-white">Feedback</div>
                    </div>
                    <div class="bg-[#0ea5a4] dark:bg-white/6 rounded-xl p-3 text-center shadow hover:scale-105 transform transition">
                        <div class="text-sm font-bold">Exam Prep</div>
                        <div class="text-xs text-white">IELTS / TOEFL</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute -right-20 -top-24 w-96 h-96 bg-gradient-to-tr from-[#FF6A4D] to-[#0184ff] opacity-10 blur-3xl rounded-full"></div>
    </section>

    <!-- Section 3: Metrics -->
    <section id="metrics" class="py-10 lg:py-14 bg-gradient-to-r from-slate-50 to-white dark:from-[#05060a] dark:to-[#071022]">
        <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-[#071022] rounded-xl p-6 shadow-md flex flex-col items-start">
                <div class="text-3xl font-extrabold text-[#0184ff]">20k+</div>
                <div class="mt-2 font-semibold">Learners</div>
                <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Building speaking confidence</div>
            </div>
            <div class="bg-white dark:bg-[#071022] rounded-xl p-6 shadow-md flex flex-col items-start">
                <div class="text-3xl font-extrabold text-[#0ea5a4]">4.8/5</div>
                <div class="mt-2 font-semibold">Avg. Rating</div>
                <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Highly rated mentors</div>
            </div>
            <div class="bg-white dark:bg-[#071022] rounded-xl p-6 shadow-md flex flex-col items-start">
                <div class="text-3xl font-extrabold text-[#7c3aed]">500+</div>
                <div class="mt-2 font-semibold">Corporate Partners</div>
                <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Language programs for teams</div>
            </div>
        </div>
    </section>

    <!-- Section 4: About -->
    <section id="about" class="py-14 lg:py-20">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold">About Eagle Institute — English learning</h2>
                <p class="mt-4 text-slate-700 dark:text-slate-300 leading-relaxed">
                    Eagle Institute focuses on practical English — conversation, workplace communication and exam success. Curriculum is practice-first, led by experienced bilingual and native mentors.
                </p>

                <ul class="mt-6 space-y-3">
                    <li class="flex items-start gap-3">
                        <div class="mt-1 text-[#0184ff]">✔</div>
                        <div>
                            <div class="font-semibold">Conversation-first</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">Small live groups and 1:1 coaching.</div>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="mt-1 text-[#0ea5a4]">✔</div>
                        <div>
                            <div class="font-semibold">Exam-focused tracks</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400">IELTS & TOEFL strategies and practice.</div>
                        </div>
                    </li>
                </ul>

                <div class="mt-6 flex gap-3">
                    <a href="#courses" class="inline-flex items-center px-5 py-3 rounded-full bg-gradient-to-r from-[#FF6A4D] to-[#0184ff] text-white font-semibold shadow hover:scale-[1.02] transition">View Programs</a>
                    <a href="#testimonials" class="inline-flex items-center px-5 py-3 rounded-full border border-slate-200 dark:border-white/10 text-sm">Hear from learners</a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/about-1.jpg') }}" alt="class" class="w-full h-40 object-cover" />
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/about-2.jpg') }}" alt="mentor" class="w-full h-40 object-cover" />
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg col-span-2">
                    <img src="{{ asset('images/about-3.jpg') }}" alt="students" class="w-full h-56 object-cover" />
                </div>
            </div>
        </div>
    </section>

    <!-- Section 5: Features -->
    <section id="features" class="py-14 bg-gradient-to-b from-white to-slate-50 dark:from-[#071022] dark:to-[#04111b]">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h3 class="text-2xl md:text-3xl font-extrabold text-center">How we teach</h3>
            <p class="text-center mt-2 text-slate-500 dark:text-slate-400">Active practice, real feedback, and measurable progress.</p>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="p-6 rounded-xl bg-white dark:bg-[#071022] shadow hover:translate-y-1 transform transition">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-[#FFEDD5] text-[#F97316] mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
                    </div>
                    <div class="font-semibold">Live Conversation Labs</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-2">Practice speaking in guided sessions.</div>
                </div>

                <div class="p-6 rounded-xl bg-white dark:bg-[#071022] shadow hover:translate-y-1 transform transition">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-[#E0F2FE] text-[#0ea5a4] mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"/></svg>
                    </div>
                    <div class="font-semibold">1:1 Coaching</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-2">Targeted feedback for fast improvement.</div>
                </div>

                <div class="p-6 rounded-xl bg-white dark:bg-[#071022] shadow hover:translate-y-1 transform transition">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-[#F3E8FF] text-[#7c3aed] mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4"/></svg>
                    </div>
                    <div class="font-semibold">Exam Prep</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-2">IELTS & TOEFL practice tests and strategies.</div>
                </div>

                <div class="p-6 rounded-xl bg-white dark:bg-[#071022] shadow hover:translate-y-1 transform transition">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-lg bg-[#ECFCCB] text-[#84cc16] mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-7-7 7-7-9 2-9-2 7 7-7 7z"/></svg>
                    </div>
                    <div class="font-semibold">Corporate Training</div>
                    <div class="text-sm text-slate-500 dark:text-slate-400 mt-2">Team programs for workplace English.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Courses -->
    <section id="courses" class="py-14">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl md:text-3xl font-extrabold">Popular courses</h3>
                <a href="#" class="text-sm font-medium text-[#0184ff] hidden sm:inline">See all courses →</a>
            </div>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="group bg-gradient-to-br from-white to-slate-50 dark:from-[#071022] dark:to-[#04111b] rounded-2xl p-6 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-48 h-48 bg-gradient-to-br from-[#FFEDD5] to-[#FFD2B8] rounded-full opacity-30 blur-xl pointer-events-none"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-lg font-bold">General English</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Speaking • Listening • Writing • Reading</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-semibold text-[#0184ff]">Most popular</div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/course-web.jpg') }}" class="w-14 h-10 rounded-md object-cover shadow" alt="general" />
                            <div>
                                <div class="text-sm font-medium">40 hours</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Live + self-study</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xl font-bold">IRR 1,500,000</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">one-time</div>
                        </div>
                    </div>
                    <a href="#" class="inline-block mt-6 px-4 py-2 rounded-full bg-[#0184ff] text-white text-sm font-semibold hover:opacity-95 transition">Enroll now</a>
                </div>

                <div class="group bg-white dark:bg-[#071022] rounded-2xl p-6 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-lg font-bold">Business English</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Presentations • Meetings • Emails</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-semibold text-[#0ea5a4]">Professional</div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/course-biz.jpg') }}" class="w-14 h-10 rounded-md object-cover shadow" alt="business" />
                            <div>
                                <div class="text-sm font-medium">30 hours</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Role-play & feedback</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xl font-bold">IRR 2,000,000</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">one-time</div>
                        </div>
                    </div>
                    <a href="#" class="inline-block mt-6 px-4 py-2 rounded-full border border-slate-200 dark:border-white/10 text-sm font-semibold">Learn more</a>
                </div>

                <div class="group bg-white dark:bg-[#071022] rounded-2xl p-6 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-lg font-bold">IELTS & Exam Prep</div>
                            <div class="text-sm text-slate-500 dark:text-slate-400 mt-1">Targeted strategies & mock tests</div>
                        </div>
                        <div class="text-right">
                            <div class="text-sm font-semibold text-[#7c3aed]">Exam track</div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('images/course-data.jpg') }}" class="w-14 h-10 rounded-md object-cover shadow" alt="exam" />
                            <div>
                                <div class="text-sm font-medium">50 hours</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400">Mocks + feedback</div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-xl font-bold">IRR 1,800,000</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">one-time</div>
                        </div>
                    </div>
                    <a href="#" class="inline-block mt-6 px-4 py-2 rounded-full border border-slate-200 dark:border-white/10 text-sm font-semibold">Learn more</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 7: Instructors & Testimonials -->
    <section id="instructors" class="py-14 bg-gradient-to-b from-slate-50 to-white dark:from-[#04111b] dark:to-[#031018]">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
            <div class="lg:col-span-1">
                <h3 class="text-2xl font-extrabold">Meet our mentors</h3>
                <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">Certified teachers, exam specialists and native speakers focused on practical fluency.</p>

                <a href="#" class="mt-4 inline-block px-4 py-2 rounded-full bg-[#0184ff] text-white text-sm font-semibold">Become a mentor</a>
            </div>

            <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="p-4 bg-white dark:bg-[#071022] rounded-xl shadow-sm flex gap-4 items-center">
                    <img src="{{ asset('images/instructor1.jpg') }}" alt="instr" class="w-16 h-16 rounded-full object-cover shadow" />
                    <div>
                        <div class="font-semibold">Dr. Lina Ahmed</div>
                        <div class="text-sm text-slate-500 dark:text-slate-400">TESOL — Exam Specialist</div>
                        <div class="text-xs text-slate-400 mt-2">"I focus on test strategies and exam confidence."</div>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#071022] rounded-xl shadow-sm flex gap-4 items-center">
                    <img src="{{ asset('images/instructor2.jpg') }}" alt="instr" class="w-16 h-16 rounded-full object-cover shadow" />
                    <div>
                        <div class="font-semibold">Omar Hassan</div>
                        <div class="text-sm text-slate-500 dark:text-slate-400">Conversation Coach</div>
                        <div class="text-xs text-slate-400 mt-2">"Fluency comes from practice, not rules."</div>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#071022] rounded-xl shadow-sm flex gap-4 items-center">
                    <img src="{{ asset('images/instructor3.jpg') }}" alt="instr" class="w-16 h-16 rounded-full object-cover shadow" />
                    <div>
                        <div class="font-semibold">Sara El-Masry</div>
                        <div class="text-sm text-slate-500 dark:text-slate-400">Business English Lead</div>
                        <div class="text-xs text-slate-400 mt-2">"We train for real workplace interactions."</div>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#071022] rounded-xl shadow-sm flex gap-4 items-center">
                    <img src="{{ asset('images/instructor4.jpg') }}" alt="instr" class="w-16 h-16 rounded-full object-cover shadow" />
                    <div>
                        <div class="font-semibold">Khalid Noor</div>
                        <div class="text-sm text-slate-500 dark:text-slate-400">Corporate Trainer</div>
                        <div class="text-xs text-slate-400 mt-2">"Practical English for teams."</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="testimonials" class="max-w-6xl mx-auto px-6 lg:px-8 mt-10">
            <h3 class="text-2xl font-extrabold text-center">What learners say</h3>
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 rounded-xl bg-white dark:bg-[#071022] shadow-lg">
                    <div class="italic">"I improved my speaking in 8 weeks — now I lead meetings in English."</div>
                    <div class="mt-4 flex items-center gap-3">
                        <img src="{{ asset('images/student1.jpg') }}" class="w-10 h-10 rounded-full object-cover" alt="student"/>
                        <div>
                            <div class="font-semibold">Sara M.</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">Product Manager</div>
                        </div>
                    </div>
                </div>

                <div class="p-6 rounded-xl bg-white dark:bg-[#071022] shadow-lg">
                    <div class="italic">"IELTS prep helped me reach my target band. Great mentors."</div>
                    <div class="mt-4 flex items-center gap-3">
                        <img src="{{ asset('images/student2.jpg') }}" class="w-10 h-10 rounded-full object-cover" alt="student"/>
                        <div>
                            <div class="font-semibold">Ahmed K.</div>
                            <div class="text-xs text-slate-500 dark:text-slate-400">Student</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 8: Final CTA + Footer -->
    <section class="py-12 bg-gradient-to-r from-[#FF6A4D] to-[#0184ff] text-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col lg:flex-row items-center justify-between gap-4">
            <div>
                <h4 class="text-xl font-extrabold">Ready to speak confidently?</h4>
                <p class="text-sm opacity-90 mt-1">Start with a free consultation and a sample lesson.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('register') }}" class="px-5 py-3 rounded-full bg-white text-[#0184ff] font-semibold shadow">Get Started</a>
                <a href="#courses" class="px-4 py-2 rounded-full border border-white/30 text-white">Browse courses</a>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-200 dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <div class="text-lg font-bold">Eagle Institute</div>
                <div class="mt-2 text-sm text-slate-400">Practical English for real communication.</div>
            </div>

            <div class="flex gap-6 justify-center">
                <div>
                    <div class="font-semibold">Learn</div>
                    <ul class="mt-2 text-sm text-slate-400 space-y-2">
                        <li><a href="#courses" class="hover:underline">Courses</a></li>
                        <li><a href="#features" class="hover:underline">How we teach</a></li>
                        <li><a href="#instructors" class="hover:underline">Mentors</a></li>
                    </ul>
                </div>

                <div>
                    <div class="font-semibold">Company</div>
                    <ul class="mt-2 text-sm text-slate-400 space-y-2">
                        <li><a href="#" class="hover:underline">About</a></li>
                        <li><a href="#" class="hover:underline">Careers</a></li>
                        <li><a href="#" class="hover:underline">Contact</a></li>
                    </ul>
                </div>
            </div>

            <div class="text-right">
                <div class="font-semibold">Newsletter</div>
                <p class="text-sm text-slate-400 mt-2">Get updates on new courses and discounts.</p>
                <form class="mt-4 flex gap-2">
                    <input type="email" placeholder="Email address" class="px-3 py-2 rounded-md bg-white/5 border border-white/10 text-sm w-full" />
                    <button class="px-4 py-2 bg-[#0184ff] rounded-md text-white text-sm">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="border-t border-white/5 py-4">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm text-slate-500">
                <div class="flex">© {{ date('Y') }} Eagle Institute — All rights reserved . 
                <a href="https://mohamedizeldeen.com" target="_blank" class="hover:underline flex items-center gap-1">
                <div class=""> Developed by Mohamed Izeldeen</div>
                </a></div>
               
                <div class="mt-2 md:mt-0 flex gap-4">
                    <a href="#" class="hover:underline">Privacy</a>
                    <a href="#" class="hover:underline">Terms</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>