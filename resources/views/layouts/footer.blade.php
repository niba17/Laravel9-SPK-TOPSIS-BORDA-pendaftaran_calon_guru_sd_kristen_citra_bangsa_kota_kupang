<aside class="control-sidebar control-sidebar-dark">
</aside>

<!-- HIDDEN / POP-UP DIV -->
<div id="pop-up">
    Klik kolom untuk melihat scan file.
</div>

<style>
    div#pop-up {
        display: none;
        position: absolute;
        width: 280px;
        padding: 10px;
        background: #eeeeee;
        color: #000000;
        border: 1px solid #1a1a1a;
        font-size: 90%;
    }
</style>

<script>
    $('.info-box').on('mouseenter', function() {
        $(this).css('background-color', '#343A40').children('div').removeClass('text-dark').addClass(
            'text-white')
    })
    $('.info-box').on('mouseleave', function() {
        $(this).css('background-color', '').children('div').removeClass('text-white').addClass('text-dark')
    })

    $(function() {
        var moveLeft = 5;
        var moveDown = -35;

        $('td.trigger').hover(function(e) {
            $('div#pop-up').show();
            //.css('top', e.pageY + moveDown)
            //.css('left', e.pageX + moveLeft)
            //.appendTo('body');
        }, function() {
            $('div#pop-up').hide();
        });

        $('td.trigger').css('cursor', 'pointer');
        $('div#trigger').css('cursor', 'pointer');

        $('td.trigger').mousemove(function(e) {
            $("div#pop-up").css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
    });

    $('th').addClass('text-center').css('vertical-align', 'middle')
    $('th').css('font-size', '14px')
    $('tbody').addClass('fs-6 text-center')
    $('td').css('vertical-align', 'middle')
    $('td').css('font-size', '14px')

    function popUpFoto(gambar) {
        Swal.fire({
            imageUrl: "{{ asset('storage') }}" + "/images/" + gambar,
            title: gambar,
            imageHeight: 400,
            imageWidth: 700,
            imageAlt: gambar
        })
    }



    $('#login').hover(() => {
        $('#login').toggleClass('text-primary')
    })

    $('#myTable').DataTable();
    $('#myTable2').DataTable();

    @if (Session::has('succMessage'))
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('succMessage') }}',
            timer: 3000
        })
    @elseif (Session::has('errMessage'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('errMessage') }}'
            // timer: 3000
        })
    @endif

    function hapus(id, controller, table = null) {
        Swal.fire({
            title: 'Yakin ingin Menghapus?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                if (table == null) {

                    window.location.replace('/' + controller + '-destroy/' + id);
                } else {

                    window.location.replace('/' + controller + '-destroy/' + id + '/' + table);
                }

            }
        })
    }

    function logout() {
        Swal.fire({
            title: 'Yakin ingin Logout?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.replace('/logout');
            }
        })
    }
</script>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('template') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- ChartJS -->
{{-- <script src="{{ asset('template') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('template') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('template') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('template') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('template') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('template') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('template') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('template') }}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('template') }}/dist/js/pages/dashboard.js"></script> --}}



{{-- <script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script> --}}

{{-- <script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

<script src="{{ asset('template') }}/plugins/select2/js/select2.full.min.js"></script>

<script src="{{ asset('template') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script src="{{ asset('template') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('template') }}/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.js"></script>

<script src="{{ asset('template') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

{{-- <script src="{{ asset('template') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> --}}

<script src="{{ asset('template') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>

{{-- <script src="{{ asset('template') }}/plugins/dropzone/min/dropzone.min.js"></script> --}}

{{-- <script src="{{ asset('template') }}/dist/js/adminlte.min.js?v=3.2.0"></script> --}}

{{-- <script src="{{ asset('template') }}/dist/js/demo.js"></script> --}}
</body>

</html>
