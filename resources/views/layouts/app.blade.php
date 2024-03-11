@extends('layouts.base')

@section('body')
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="text-black fixed top-[1rem] right-[3rem]" type="submit">{{ __('Logout') }}</button>
    </form>

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
