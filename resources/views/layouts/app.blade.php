<html lang="tr">
@include('partials.head')

@if (isAdmin())
    @include('partials.admin.menu')
@else
    @include('partials.customer.menu')

@endif



@yield('content')
@include('partials.footer')
</html>
