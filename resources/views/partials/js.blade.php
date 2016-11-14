<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="/vendors/fastclick/lib/fastclick.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/js/bootstrap-datepicker.min.js"></script>
<script src="/js/datepicker/daterangepicker.js"></script>
<script src="/js/moment/moment.min.js"></script>
@if(str_contains(\Route::current()->getPath(),'admin/bundle/'))
    <!-- jQuery Smart Wizard -->
    <script src="/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script src="/js/smartwiz.js"></script>
    <script src="/js/addrow.js"></script>
@endif
@if(str_contains(\Route::current()->getName(),'tryoutUser.doTPA') || str_contains(\Route::current()->getName(),'tryoutUser.doTBI'))
    <script src="/vendors/FlipClock/compiled/flipclock.min.js"></script>
    <script src="/js/clock.js"></script>
@elseif(str_contains(\Route::current()->getName(),'tryoutUser.doTKD'))
    <script src="/vendors/FlipClock/compiled/flipclock.min.js"></script>
    <script src="/js/clockTKD.js"></script>
@endif
@if(str_contains(\Route::current()->getName(),'soal.'))
    {{--uploading-soal--}}
    <script src="/js/tinymce/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
    <script src="/js/tinymce/tinymce/tinymce.min.js"></script>
    <script src="/js/tinySetting.js"></script>
@endif
@if(\Route::current()->getName() == 'dashboard.user' || \Route::current()->getName() == 'dashboard.admin')
    {{--dasboard juga--}}
    <script src="/vendors/canvasjs/jquery.canvasjs.min.js"></script>
    <!-- Chart.js for dahsboard-->
    <script src="/vendors/chart.js/dist/Chart.min.js"></script>
    <script src="/js/canvasChart.js"></script>
@endif
{{--our--}}
<script src="/js/modals.js"></script>
<script src="/js/custom.min.js"></script>
