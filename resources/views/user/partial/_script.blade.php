
<script src="{{url('')}}/public/frontend/js/jquery-3.3.1.min.js"></script>
<script src="{{url('')}}/public/frontend/styles/bootstrap4/popper.js"></script>
<script src="{{url('')}}/public/frontend/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{url('')}}/public/frontend/plugins/greensock/TweenMax.min.js"></script>
<script src="{{url('')}}/public/frontend/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{url('')}}/public/frontend/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{url('')}}/public/frontend/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{url('')}}/public/frontend/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{url('')}}/public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{url('')}}/public/frontend/plugins/easing/easing.js"></script>
{{--toastr--}}
<script src="{{url('')}}/public/js/toastr.min.js"></script>
{{--sweet alert--}}
<script src="{{url('')}}/public/js/sweetalert.min.js"></script>
@yield('script')
<script>
   @if(Session::has('messege'))
    let type = "{{Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('messege') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('messege') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('messege') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('messege') }}");
            break;
    }
    @endif
</script>
<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Do you Want to delete?",
            text: "Once You Delete, This will be Permanently Deleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script>