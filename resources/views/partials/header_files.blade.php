
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('public/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">

    <!-- donut Chart CSS -->
    <link href="{{ asset('public/css/donut.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	
	<!-- Date picker -->
	 <link href="{{ asset('public/css/jquery-ui.css') }}" rel="stylesheet">
  
    <!-- jQuery -->
    <script src="{{ asset('public/jquery/jquery.min.js') }}"></script>
   
	<style>
    	td,th{
    	 	text-align:center;
    	 }
    </style>
   
   <!-- Date picker --> 
    <script>
		$( function() {
        	$( "input.datepicker" ).datepicker({
        	      dateFormat: 'dd/mm/yy'
        	});
		} );
     </script>