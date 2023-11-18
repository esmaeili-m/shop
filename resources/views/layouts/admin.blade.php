<!DOCTYPE html>
<html lang="en">

@include('configs.home.head')

<body class="light rtl theme-black logo-white submenu-closed">
<!-- Page Loader -->
<div class="page-loader-wrapper">
{{--    <div class="loader">--}}
{{--        <div class="m-t-30">--}}
{{--            <img class="loading-img-spin" src="../../assets/images/loading.png" alt="admin">--}}
{{--        </div>--}}
{{--        <p>لطفا صبر کنید...</p>--}}
{{--    </div>--}}
</div>
<div class="overlay"></div>

    @include('configs.home.header')

<div>

    @include('configs.home.sidebar')

</div>
    {{$slot}}
@include('configs.home.foot')

<x-livewire-alert::flash />
</body>

</html>
