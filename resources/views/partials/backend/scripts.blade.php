
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/backend/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('assets/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/backend/dist/js/demo.js')}}"></script>
{{-- FontAwsom Start --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
{{-- FontAwsom End --}}
{{-- Yajra DataTable Start --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 {{-- Yajra DataTable End --}}

 {{-- custem ajax and js statr --}}

 <script src="{{ asset('assets/backend/custom/moment.js') }}"></script>
 {{-- custem ajax and js end --}}

 {{-- sweetAler2 start --}}
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 {{-- sweetAlert2 end --}}
 <script>
    const userId = {{ auth()->id() }}

 </script>

@vite(['resources/js/app.js'])
<script>

</script>
 <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

 <script src="{{ asset('assets/backend/custom/script.js') }}"></script>
@stack('scripts')
