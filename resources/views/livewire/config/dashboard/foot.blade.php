<div>

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
    document.addEventListener('livewire:init', () => {
        Livewire.on('errorHandling', (data) => {
            let ul = document.createElement('ul');
            ul.classList.add('mb-0')
            let errorMessages = document.getElementById('errorMessages');
            errorMessages.innerHTML="";
            for (let key in data[0]) {
                if (data.hasOwnProperty(key)) {
                    let value = data[key];
                    let li = document.createElement('li');
                    li.textContent =value;
                    ul.appendChild(li);
                }
            }
            errorMessages.appendChild(ul);
            errorMessages.classList.remove('d-none')
        });
        Livewire.on('alert', (data) => {
            Swal.fire({
                position: "center",
                icon: data.icon,
                title: data.message,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 2000,
                customClass: {
                    popup: 'my-swal-with',
                },
            });
        });
        Livewire.on('closeModal', (data)=>{
            document.getElementById(data.type).click();
        })
        Livewire.on('errorHandlingclose', (data)=>{
            document.getElementById(data.type).classList.add('d-none');
        })
    });
</script>
</div>
