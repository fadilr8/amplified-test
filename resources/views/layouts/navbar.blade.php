<nav class="bg-white fixed flex flex-wrap top-0 left-0 items-center justify-between w-full shadow-lg z-50">
    <a class="navbar-brand my-0 mx-auto w-4/5 h-auto inline-block whitespace-nowrap" href="/">
        <img src="https://www.ibunda.id/tespsikologi/assets/img/icon/ibunda.png" width="120" style="margin: .5rem 1rem;display: block;">
    </a>
    @if (Auth::user())
    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="{{ route('dashboard') }}">Dashboard</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
    @else
    <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="/login">Login</a>
    @endif
</nav>
