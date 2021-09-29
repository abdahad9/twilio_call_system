        <script src="/backend/assets/js/jquery-3.5.1.min.js"></script>

                <!-- Bootstrap4 js-->
                <script src="/backend/assets/plugins/bootstrap/popper.min.js"></script>
                <script src="/backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

                <!--Othercharts js-->
                <script src="/backend/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

                <!-- Circle-progress js-->
                <script src="/backend/assets/js/circle-progress.min.js"></script>

                <!-- Jquery-rating js-->
                <script src="/backend/assets/plugins/rating/jquery.rating-stars.js"></script>

                <!--Sidemenu js-->
                <script src="/backend/assets/plugins/sidemenu/sidemenu.js"></script>

                <!-- P-scroll js-->
                <script src="/backend/assets/plugins/p-scrollbar/p-scrollbar.js"></script>
                <script src="/backend/assets/plugins/p-scrollbar/p-scroll1.js"></script>

                <!-- INTERNAL Data tables -->
                <script src="/backend/assets/plugins/datatable/js/jquery.dataTables.js"></script>
                <script src="/backend/assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
                <script src="/backend/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
                <script src="/backend/assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
                <script src="/backend/assets/plugins/datatable/js/jszip.min.js"></script>
                <script src="/backend/assets/plugins/datatable/js/pdfmake.min.js"></script>
                <script src="/backend/assets/plugins/datatable/js/vfs_fonts.js"></script>
                <script src="/backend/assets/plugins/datatable/js/buttons.html5.min.js"></script>
                <script src="/backend/assets/plugins/datatable/js/buttons.print.min.js"></script>
                <script src="/backend/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
                <script src="/backend/assets/plugins/datatable/dataTables.responsive.min.js"></script>
                <script src="/backend/assets/plugins/datatable/responsive.bootstrap4.min.js"></script>
                <script src="/backend/assets/js/datatables.js"></script>

                <!-- INTERNAL Select2 js -->
                <script src="/backend/assets/plugins/select2/select2.full.min.js"></script>

                <!-- Loader js-->
                <script src="/backend/assets/js/loader.js"></script>

                <!-- Custom js-->
                <script src="/backend/assets/js/custom.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
        //Authorization popup window code
$.oauthpopup = function(options)
{
    options.windowName = options.windowName ||  'ConnectWithOAuth'; // should not include space for IE
    options.windowOptions = options.windowOptions || 'location=0,status=0,width=350,height=550';
    options.callback = options.callback || function(){ window.location.reload(); };
    var that = this;
    console.log(options.path);
    that._oauthWindow = window.open(options.path, options.windowName, options.windowOptions);
    that._oauthInterval = window.setInterval(function(){
        if (that._oauthWindow.closed) {
            window.clearInterval(that._oauthInterval);
            options.callback();
        }
    }, 1000);
};
//create new oAuth popup window and monitor it
 $(document).ready(function(){
        $('.floating-chat').on('click', function(){
            $.oauthpopup({
                    path: "{{ route('dialer') }}",
                    callback: function()
                    {
                        console.log('callback');
                        //do callback stuff
                    }
                });

        });
    });
</script>

        
        @yield('scripts')