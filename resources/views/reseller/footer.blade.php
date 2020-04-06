<script data-cfasync="false" src="{{ asset('cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js') }}"></script><script type="text/javascript" src="{{ asset('files\bower_components\jquery\js\jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\jquery-ui\js\jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\popper.js\js\popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\bootstrap\js\bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\bower_components\modernizr\js\modernizr.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src='bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('files\assets\pages\widget\amchart\amcharts.js') }}"></script>
    <script src="{{ asset('files\assets\pages\widget\amchart\serial.js') }}"></script>
    <script src="{{ asset('files\assets\pages\widget\amchart\light.js') }}"></script>
    <script src="{{ asset('files\assets\js\jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\assets\js\SmoothScroll.js') }}"></script>
    <script src="{{ asset('files\assets\js\pcoded.min.js') }}"></script>
    <script src="{{ asset('files\assets\js\vartical-layout.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\assets\pages\dashboard\custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('files\assets\js\script.min.js') }}"></script>
    <script src="https://beta.lokermuslim.com/assets/js/key.min.js"></script>
    @include('sweetalert::alert')
    <script>
        $(document).ready( function () {
            $('.datatable').DataTable();
        } );
    </script>

    @stack('script')
    
    <script>
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '-3d'
        });
    </script>
</body>

</html>
