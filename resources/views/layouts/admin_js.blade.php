
    <script src="{{asset('admin_asset/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('admin_asset/assets/js/plugins.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/main.js')}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="{{asset('admin_asset/assets/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/widgets.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/vector-map/country/jquery.vmap.world.js')}}"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('admin_asset/assets/js/lib/data-table/datatables-init.js')}}"></script>    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );

        function checkdelete()
        {
            var chk=confirm('Are You Sure?');
            if(chk)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>