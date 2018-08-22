	@extends('layouts.masters.main')
	@section('page-content')

    <div class="container">

    	@include('layouts.partials.nav')

    	<form action="search">
    		Email <input type="text" name="email"><br />
    		Unique Id<input type="text" name="id"><br />
    		<input type="submit" name="btnsubmit">
    	</form>

    </div> <!-- /container -->
@stop

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
