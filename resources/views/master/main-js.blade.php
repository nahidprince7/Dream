@section('main-js')

    <script src="{{asset('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js')}}"></script>
    <!--[if IE]><!-->
    <script src="{{asset('node_modules/@coreui/icons/js/svgxuse.min.js')}}"></script>
    <!--<![endif]-->
    <!-- Plugins and scripts required by this view-->
    <script src="{{asset('node_modules/@coreui/chartjs/dist/js/coreui-chartjs.bundle.js')}}"></script>
    <script src="{{asset('node_modules/@coreui/utils/dist/coreui-utils.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

@endsection
