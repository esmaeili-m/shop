<!DOCTYPE html>
<html lang="en">

@include('configs.dashboard.head')

<body class="light rtl theme-black logo-white submenu-closed">
<!-- Page Loader -->
{{--<div class="page-loader-wrapper">--}}
{{--    <div class="loader">--}}
{{--        <div class="m-t-30">--}}
{{--            <img class="loading-img-spin" src="../../assets/images/loading.png" alt="admin">--}}
{{--        </div>--}}
{{--        <p>لطفا صبر کنید...</p>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="overlay"></div>

    @include('configs.dashboard.header')

<div>

    @include('configs.dashboard.sidebar')

</div>
    {{$slot}}
{{--@include('configs.dashboard.foot')--}}
<livewire:config.dashboard.foot />

<x-livewire-alert::flash />
</body>
</html>
