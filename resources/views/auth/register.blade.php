{{-- resources/views/auth/register.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-white">

    {{-- TOAST ERROR --}}
    @if ($errors->any())
        <div id="toastError"
            class="fixed right-5 top-5 z-50 max-w-md rounded-2xl border border-red-200 bg-red-500 px-5 py-4 text-white shadow-2xl shadow-red-500/20 transition-all duration-300">

            <div class="flex items-start gap-3">

                {{-- ICON --}}
                <div class="mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-5 w-5">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m9-.75a9 9 0
                            1 1-18 0 9 9 0 0 1 18 0ZM12
                            15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>

                <div>
                    <div class="text-sm font-semibold">
                        Registrasi gagal
                    </div>

                    <ul class="mt-2 list-disc space-y-1 pl-4 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="relative min-h-screen overflow-hidden">

        {{-- BACKGROUND --}}
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/library.jpg') }}"
                alt=""
                class="h-full w-full object-cover">

            <div class="absolute inset-0 bg-white/70 dark:bg-slate-950/75"></div>
        </div>

        {{-- CONTENT --}}
        <main class="relative z-10 flex min-h-screen items-center justify-center px-4 py-10">

            <div class="w-full max-w-md">

                <div class="rounded-3xl border border-slate-200 bg-white/90 p-8 shadow-2xl shadow-slate-900/10 backdrop-blur-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-slate-900/20 dark:border-slate-800 dark:bg-slate-900/90 dark:shadow-black/30">

                    {{-- HEADER --}}
                    <div class="text-center">

                        <div class="mb-4 inline-flex items-center gap-2 text-indigo-700 dark:text-indigo-400">

                            {{-- BOOK ICON --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
                                    fill="currentColor"
                                    stroke-linejoin="round"
                                    d="M12 6.042A8.967 8.967 0
                                    0 1 15.75 5.25c1.273 0
                                    2.476.266 3.563.742.53.232.937.747.937
                                    1.326v9.355c0 .653-.598
                                    1.158-1.244 1.068A48.424 48.424 0
                                    0 0 15.75 17.25c-1.856
                                    0-3.347.29-4.5.83m0-12.038A8.966
                                    8.966 0 0 0 8.25 5.25c-1.273
                                    0-2.476.266-3.563.742-.53.232-.937.747-.937
                                    1.326v9.355c0 .653.598 1.158
                                    1.244 1.068A48.423 48.423 0
                                    0 1 8.25 17.25c1.856 0
                                    3.347.29 4.5.83" />
                            </svg>

                            <span class="text-2xl font-bold">
                                BookLending
                            </span>
                        </div>

                        <h1 class="text-4xl font-bold tracking-tight text-slate-900 dark:text-white">
                            Create Account
                        </h1>

                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                            Join and start borrowing books
                        </p>
                    </div>

                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('register') }}"
                        class="mt-8 space-y-5">

                        @csrf

                        {{-- NAME --}}
                        <div>
                            <label for="name"
                                class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Full Name
                            </label>

                            <div class="relative">

                                {{-- USER ICON --}}
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0
                                            1 1-7.5 0 3.75 3.75 0
                                            0 1 7.5 0ZM4.501
                                            20.118a7.5 7.5 0 0
                                            1 14.998 0A17.933 17.933
                                            0 0 1 12 21.75c-2.676
                                            0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                </div>

                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autofocus
                                    placeholder="Your full name"
                                    class="w-full rounded-xl border border-slate-300
                                    bg-white py-3 pl-12 pr-4
                                    text-slate-900 outline-none
                                    transition-all duration-300
                                    placeholder:text-slate-400
                                    focus:border-indigo-500
                                    focus:ring-4 focus:ring-indigo-500/20
                                    dark:border-slate-700
                                    dark:bg-slate-800
                                    dark:text-white"
                                >
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Email Address
                            </label>

                            <div class="relative">

                                {{-- MAIL ICON --}}
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25
                                            2.25 0 0 1-2.25 2.25H4.5a2.25
                                            2.25 0 0 1-2.25-2.25V6.75m19.5
                                            0A2.25 2.25 0 0 0 19.5
                                            4.5H4.5A2.25 2.25 0 0
                                            0 2.25 6.75m19.5
                                            0v.243a2.25 2.25 0 0
                                            1-1.07 1.916l-7.5
                                            4.615a2.25 2.25 0 0
                                            1-2.36 0L3.32 8.91a2.25
                                            2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                </div>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    placeholder="name@example.com"
                                    class="w-full rounded-xl border border-slate-300
                                    bg-white py-3 pl-12 pr-4
                                    text-slate-900 outline-none
                                    transition-all duration-300
                                    placeholder:text-slate-400
                                    focus:border-indigo-500
                                    focus:ring-4 focus:ring-indigo-500/20
                                    dark:border-slate-700
                                    dark:bg-slate-800
                                    dark:text-white"
                                >
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div>
                            <label for="password"
                                class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Password
                            </label>

                            <div class="relative">

                                {{-- LOCK ICON --}}
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5
                                            4.5 0 1 0-9 0v3.75m-.75
                                            0h10.5c.621 0 1.125.504
                                            1.125 1.125v7.125c0
                                            .621-.504 1.125-1.125
                                            1.125H6.75a1.125 1.125 0
                                            0 1-1.125-1.125V11.625c0-.621.504-1.125
                                            1.125-1.125Z" />
                                    </svg>
                                </div>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="••••••••"
                                    class="w-full rounded-xl border border-slate-300
                                    bg-white py-3 pl-12 pr-12
                                    text-slate-900 outline-none
                                    transition-all duration-300
                                    placeholder:text-slate-400
                                    focus:border-indigo-500
                                    focus:ring-4 focus:ring-indigo-500/20
                                    dark:border-slate-700
                                    dark:bg-slate-800
                                    dark:text-white"
                                >

                                {{-- EYE BUTTON --}}
                                <button
                                    type="button"
                                    id="togglePassword"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-500">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012
                                            0 0 1 0-.639C3.423 7.51
                                            7.36 4.5 12 4.5c4.638
                                            0 8.573 3.007 9.963
                                            7.178.07.207.07.431
                                            0 .639C20.577 16.49
                                            16.64 19.5 12
                                            19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 1
                                            1-6 0 3 3 0 0
                                            1 6 0Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- CONFIRM PASSWORD --}}
                        <div>
                            <label for="password_confirmation"
                                class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Confirm Password
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                placeholder="Confirm password"
                                class="w-full rounded-xl border border-slate-300
                                bg-white py-3 px-4
                                text-slate-900 outline-none
                                transition-all duration-300
                                placeholder:text-slate-400
                                focus:border-indigo-500
                                focus:ring-4 focus:ring-indigo-500/20
                                dark:border-slate-700
                                dark:bg-slate-800
                                dark:text-white"
                            >
                        </div>

                        {{-- BUTTON --}}
                        <button
                            type="submit"
                            class="group flex w-full items-center justify-center gap-2
                            rounded-xl bg-orange-500 py-3.5
                            text-lg font-semibold text-white
                            shadow-lg shadow-orange-500/20
                            transition-all duration-300
                            hover:-translate-y-0.5
                            hover:bg-orange-600
                            hover:shadow-orange-500/40"
                        >
                            Create Account
                        </button>

                        {{-- LOGIN LINK --}}
                        <div class="text-center text-sm text-slate-600 dark:text-slate-400">
                            Already have an account?

                            <a href="{{ route('login') }}"
                                class="font-semibold text-indigo-600 transition hover:text-indigo-500 dark:text-indigo-400">
                                Login here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

{{-- SCRIPT --}}
<script>
    const passwordInput =
        document.getElementById('password');

    const togglePassword =
        document.getElementById('togglePassword');

    togglePassword.addEventListener('click', () => {

        const isPassword =
            passwordInput.type === 'password';

        passwordInput.type =
            isPassword ? 'text' : 'password';
    });

    const toastError =
        document.getElementById('toastError');

    if (toastError) {

        setTimeout(() => {

            toastError.style.opacity = '0';
            toastError.style.transform = 'translateY(-8px)';

            setTimeout(() => {
                toastError.remove();
            }, 250);

        }, 3500);
    }
</script>
@endsection