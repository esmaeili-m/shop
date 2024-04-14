<script src="{{asset('dashboard/assets/js/app.min.js')}}"></script>
<script src="{{asset('dashboard/assets/js/chart.min.js')}}"></script>
{{--<script src="{{asset('dashboard/assets/js/bundles/echart/echarts.js')}}"></script>--}}
<script src="{{asset('dashboard/assets/js/admin.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/dashboard/dashboard2.js')}}"></script>
<script src="{{asset('dashboard/assets/js/sweetalert2.js')}}"></script>

@stack('scripts')
<script src="{{asset('dashboard/assets/js/livewire-sortable.js')}}"></script>
@livewireScripts
<script>

    // document.addEventListener('livewire:initialized', () => {
    //     @this.on('create', (event) => {
    //         Swal.fire({
    //             position: "center",
    //             icon: "success",
    //             title: event.message,
    //             showConfirmButton: false,
    //             timerProgressBar: true,
    //             timer: 2000,
    //             customClass: {
    //                 popup: 'my-swal-with',
    //             },
    //         });
    //     });
    // });

</script>
