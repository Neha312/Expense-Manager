@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"></div>
    @auth
        <button class="btn btn-light"><a href="{{ route('home') }}"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a></button>

        <button class="btn btn-light"><a href="{{ route('logout') }}"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a></button>
        {{-- <button class="btn
                btn-warning"><a href="{{ url('account') }}">Invite User</a></button>
        <button class="btn btn-warning"><a href="{{ url('expense') }}">Expense Manager </a></button>
        <button class="btn btn-warning"><a href="{{ url('accountUser') }}">User Account </a></button>
        <button class="btn btn-warning"><a href="{{ url('transaction') }}">Transaction Manager </a></button> --}}
        <button class="btn btn-warning"><a href="{{ url('show_account') }}">Account</a></button>
        {{-- <button class="btn btn-warning header-right">{{ Auth::user()->name }}</button> --}}
    @else
        <button class="btn btn-light "><a href="{{ url('login') }}"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a></button>
        @if (Route::has('register'))
            <button class="btn btn-light"><a href="{{ route('register') }}"
                    class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a></button>
        @endif
    @endauth
    </div>

@endif
