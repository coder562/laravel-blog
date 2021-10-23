<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{url('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{url('admin/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{url('admin/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
             integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
             integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->
    @yield('sidebar')
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    @yield('right')<!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{url('admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('admin/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('admin/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('admin/assets/js/main.js')}}"></script>


    <script src="{{url('admin/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{url('admin/assets/js/dashboard.js')}}"></script>
    <script src="{{url('admin/assets/js/widgets.js')}}"></script>
    <script src="{{url('admin/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{url('admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{url('admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    {{-- input image script code start --}}
<script>
    var loadFilee=function(event){
    var output= document.getElementById('output');
    output.src=URL.createObjectURL(event.target.files[0]);
    };
</script>
{{-- input image script code end --}}




{{-- edit image script code start --}}
<script>
   var loadFile=function(event){
   document.getElementById('demo').style.display='none';
   var outpu= document.getElementById('outpu');
   outpu.src=URL.createObjectURL(event.target.files[0]);
   };
</script>
{{-- edit image script code end --}}

</body>

</html>
