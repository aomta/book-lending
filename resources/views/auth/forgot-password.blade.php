{{-- resources/views/auth/forgot-password.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-white">

    {{-- TOAST SUCCESS --}}
    @if (session('status'))
        <div id="toastSuccess"
            class="fixed right-5 top-5 z-50 max-w-md rounded-2xl border border-emerald-200 bg-emerald-500 px-5 py-4 text-white shadow-2xl shadow-emerald-500/20 transition-all duration-300">

            <div class="flex items-start gap-3">

                {{-- CHECK ICON --}}
                <div class="mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        class="h-5 w-5">

                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75
                            9.75-9.75s9.75 4.365
                            9.75 9.75-4.365 9.75-9.75
                            9.75S2.25 17.385 2.25
                            12Zm13.36-1.814a.75.75 0
                            1 0-1.22-.872l-3.236
                            4.53L9.53 12.22a.75.75
                            0 1 0-1.06 1.06l2.25
                            2.25a.75.75 0 0 0
                            1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <div>
                    <div class="text-sm font-semibold">
                        Success
                    </div>

                    <p class="mt-1 text-sm">
                        {{ session('status') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    {{-- TOAST ERROR --}}
    @if ($errors->any())
        <div id="toastError"
            class="fixed right-5 top-5 z-50 max-w-md rounded-2xl border border-red-200 bg-red-500 px-5 py-4 text-white shadow-2xl shadow-red-500/20 transition-all duration-300">

            <div class="flex items-start gap-3">

                {{-- ERROR ICON --}}
                <div class="mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                        class="h-5 w-5">

                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75
                            9.75-9.75s9.75 4.365
                            9.75 9.75-4.365 9.75-9.75
                            9.75S2.25 17.385 2.25
                            12Zm8.22-3.97a.75.75 0
                            0 0-1.06 1.06L10.94
                            10.5l-1.53 1.53a.75.75
                            0 1 0 1.06 1.06L12
                            11.56l1.53 1.53a.75.75
                            0 0 0 1.06-1.06L13.06
                            10.5l1.53-1.53a.75.75
                            0 0 0-1.06-1.06L12
                            9.44 10.47 7.91Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>

                <div>
                    <div class="text-sm font-semibold">
                        Reset gagal
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
                src="{{ asset('images/pexels-books-1281581.jpg') }}"
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
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                class="h-7 w-7">

                                <path
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
                            Forgot Password
                        </h1>

                        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
                            Enter your email and we'll send you a reset link
                        </p>
                    </div>

                    {{-- FORM --}}
                    <form method="POST"
                        action="{{ route('password.email') }}"
                        class="mt-8 space-y-5">

                        @csrf

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
                                    autofocus
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
                            Send Reset Link
                        </button>

                        {{-- LOGIN LINK --}}
                        <div class="text-center text-sm text-slate-600 dark:text-slate-400">

                            Remember your password?

                            <a href="{{ route('login') }}"
                                class="font-semibold text-indigo-600 transition hover:text-indigo-500 dark:text-indigo-400">
                                Back to login
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
</script>
@endsection