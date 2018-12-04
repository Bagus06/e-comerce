<link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
<script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>

<script type="text/javascript">
  toastr.options = {
      "closeButton": true,
      "debug": true,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
  }
  
  @if(Session::has('success'))
  		toastr.success("{{ Session::get('success') }}");
      @php
       Session::forget('success');
     @endphp
  @endif


  @if(Session::has('info'))
  		toastr.info("{{ Session::get('info') }}");
      @php
       Session::forget('info');
     @endphp
  @endif


  @if(Session::has('warning'))
  		toastr.warning("{{ Session::get('warning') }}");
      @php
       Session::forget('warning');
     @endphp
  @endif


  @if(Session::has('error'))
  		toastr.error("{{ Session::get('error') }}");
      @php
       Session::forget('error');
     @endphp
  @endif


</script>