<!DOCTYPE html>
<html lang="fa">

@include('configs.home.head')

<body class="royal_preloader">

<div id="royal_preloader"></div>
@include('configs.home.header')
{{$slot}}
@include('configs.home.footer')
@include('configs.home.foot')
</body>

</html>
