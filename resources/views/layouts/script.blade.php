{{-- Bootstrap’s JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

{{-- jQuery --}}
<script src="{{ asset('js/jquery.js') }}"></script>

{{-- Sweet Alert JS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>

{{-- AOS Animation --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
   AOS.init({
      once: 'true'
   });
</script>

{{-- jQuery Extra --}}
<script>
   $(document).ready(function() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
   });
</script>