@include('layouts.admin.header')
@stack('style')
@include('layouts.admin.navbar')
<div id="layoutSidenav">

    {{-- sidebar --}}
    @include('layouts.admin.sidebar')
    {{-- sidebar --}}

    <div id="layoutSidenav_content">

        {{-- body --}}
        {{-- @include('layouts.admin.body') --}}
        @yield('content')
        {{-- body --}}

        {{-- footer --}}
        @include('layouts.admin.footer')
        {{-- footer --}}

    </div>
</div>

@stack('script')