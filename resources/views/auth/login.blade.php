{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-slate-50 text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-white">

    {{-- Toast sukses --}}
    @if (session('status'))
        <div id="toastSuccess"
            class="fixed right-5 top-5 z-50 max-w-md rounded-2xl border border-emerald-200 bg-emerald-500 px-5 py-4 text-white shadow-2xl shadow-emerald-500/20 transition-all duration-300">
            <div class="flex items-start gap-3">
                <i data-lucide="check-circle-2" class="mt-0.5 h-5 w-5 shrink-0"></i>
                <div class="text-sm font-medium">{{ session('status') }}</div>
            </div>
        </div>
    @endif

    {{-- Toast error --}}
    @if ($errors->any())
        <div id="toastError"
            class="fixed right-5 top-5 z-50 max-w-md rounded-2xl border border-red-200 bg-red-500 px-5 py-4 text-white shadow-2xl shadow-red-500/20 transition-all duration-300">
            <div class="flex items-start gap-3">
                <i data-lucide="triangle-alert" class="mt-0.5 h-5 w-5 shrink-0"></i>
                <div>
                    <div class="text-sm font-semibold">Login gagal</div>
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
        {{-- background --}}
        <div class="absolute inset-0">
            <img src="{{ asset('images/library.jpg') }}" alt="" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-white/70 dark:bg-slate-950/75"></div>
        </div>

        <main class="relative z-10 flex min-h-screen items-center justify-center px-4 py-10">
            <div class="w-full max-w-md">
                <div class="rounded-3xl border border-slate-200 bg-white/90 p-8 shadow-2xl shadow-slate-900/10 backdrop-blur-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-slate-900/20 dark:border-slate-800 dark:bg-slate-900/90 dark:shadow-black/30">
                    <div class="text-center">
                        <div class="mb-4 inline-flex items-center gap-2 text-indigo-700 dark:text-indigo-400">
                            {{-- BOOK ICON --}}
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-7 w-7">

                                <path stroke-linecap="round"
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
                            <span class="text-2xl font-bold">BookLending</span>
                        </div>

                        <h1 class="text-4xl font-bold tracking-tight text-slate-900 dark:text-white">
                            Welcome Back
                        </h1>
                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                            Sign in to your library account
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
                        @csrf

                        {{-- EMAIL --}}
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-300">
                                Email Address
                            </label>

                            <div class="relative">
                                {{-- ICON EMAIL --}}
                                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-5 w-5">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25
                                            2.25H4.5a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5
                                            0A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0
                                            0 0 2.25 6.75m19.5 0v.243a2.25 2.25 0 0
                                            1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0
                                            1-2.36 0L3.32 8.91a2.25 2.25 0 0
                                            1-1.07-1.916V6.75" />
                                    </svg>
                                </div>

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="name@example.com"
                                    class="w-full rounded-xl border border-slate-300
                                    bg-white py-3 pl-12 pr-4
                                    text-slate-900
                                    outline-none transition-all duration-300
                                    placeholder:text-slate-400
                                    focus:border-indigo-500
                                    focus:ring-4 focus:ring-indigo-500/20
                                    dark:border-slate-700
                                    dark:bg-slate-800
                                    dark:text-white
                                    dark:placeholder:text-slate-500"
                                >
                            </div>

                            @error('email')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label for="password"
                                    class="text-sm font-semibold text-slate-700 dark:text-slate-300">
                                    Password
                                </label>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="text-sm font-semibold text-orange-500 transition hover:text-orange-600 dark:text-orange-400">
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>

                            <div class="relative">

                                {{-- ICON LOCK --}}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                    class="w-full rounded-xl border border-slate-300
                                    bg-white py-3 pl-12 pr-12
                                    text-slate-900
                                    outline-none transition-all duration-300
                                    placeholder:text-slate-400
                                    focus:border-indigo-500
                                    focus:ring-4 focus:ring-indigo-500/20
                                    dark:border-slate-700
                                    dark:bg-slate-800
                                    dark:text-white
                                    dark:placeholder:text-slate-500"
                                >

                                {{-- ICON EYE --}}
                                <button
                                    type="button"
                                    id="togglePassword"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 transition hover:text-indigo-500"
                                >
                                    <i
                                        id="eyeIcon"
                                        data-lucide="eye"
                                        class="h-5 w-5">
                                    </i>
                                </button>
                            </div>

                            @error('password')
                                <p class="mt-2 text-sm text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- REMEMBER --}}
                        <div class="flex items-center gap-2">
                            <input
                                id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 dark:border-slate-700"
                            >

                            <label for="remember_me"
                                class="text-sm text-slate-600 dark:text-slate-400">
                                Remember me
                            </label>
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
                            Login

                            <i
                                data-lucide="arrow-right"
                                class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-1">
                            </i>
                        </button>
                        {{-- REGISTER LINK --}}
                        <div class="mt-6 text-center text-sm text-slate-600 dark:text-slate-400">
                            Belum punya akun?

                            <a
                                href="{{ route('register') }}"
                                class="font-semibold text-indigo-600 transition hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300"
                            >
                                Daftar sekarang
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {

        if (window.lucide) {
            lucide.createIcons();
        }

        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePassword && passwordInput && eyeIcon) {

            togglePassword.addEventListener('click', () => {

                const isPassword =
                    passwordInput.type === 'password';

                passwordInput.type =
                    isPassword ? 'text' : 'password';

                eyeIcon.setAttribute(
                    'data-lucide',
                    isPassword ? 'eye-off' : 'eye'
                );

                if (window.lucide) {
                    lucide.createIcons();
                }
            });
        }

        const toastSuccess =
            document.getElementById('toastSuccess');

        const toastError =
            document.getElementById('toastError');

        [toastSuccess, toastError].forEach((toast) => {

            if (!toast) return;

            setTimeout(() => {

                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-8px)';

                setTimeout(() => {
                    toast.remove();
                }, 250);

            }, 3500);
        });
    });
</script>
@endpush
