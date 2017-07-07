<!--   Core JS Files   -->
    <script src="{{ url('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{url('assets/js/bootstrap-checkbox-radio.js')}}"></script>

	<!--  Charts Plugin -->
	<script src="{{url('assets/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{url('assets/js/bootstrap-notify.js')}}"></script>

    <!--  Moment Javascript    -->
    <script src="{{url('assets/js/moment.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> 

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{url('assets/js/paper-dashboard.js')}}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{url('assets/js/demo.js')}}"></script>
        
    <!--   plugins   -->
    <script src="{{url('assets/js/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
    
    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="{{url('assets/js/jquery.validate.min.js')}}"></script>
    
    <!--  methods for manipulating the wizard and the validation -->
    <script src="{{url('assets/js/wizard.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>

	<!-- <script type="text/javascript">
            $(document).ready(function(){
    
                demo.initChartist();
    
                $.notify({
                    icon: 'ti-gift',
                    message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."
    
                },{
                    type: 'success',
                    timer: 4000
                });
    
            });
    </script> -->

    <script type="text/javascript">
        function validate(date){
            var fourteenYearsAgo = moment().subtract(14, "years");
            /*var dobi = document.forms["myForm"]["fname"].value;*/
            var dob = moment(date).document.forms["myForm"]["dob"];

            if (!dob.isValid()) {
                return "invalid date";
            }
            else if (fourteenYearsAgo.isAfter(birthday)) {
                return "success";
            }
            else {
                return "sorry, enter valid date of birth";
            }
        }

        jsprint(validate);
    </script>