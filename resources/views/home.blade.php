@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to AcadGILD - {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in <b>{{ $loginCount }}</b> Times and Logget out <b>{{ $logoutCount }}</b> Times
                    <br/>
                    <br/>
                    
                    
                    <div><h3>Login Statastics</h3></div>
                    
                    <table class="table table-bordered">
                    	<tr>
                    		<th>Activity</th>
                    		<th>Date</th>
                    	</tr>
                    	@foreach($activities as $activity)
	                    	<tr>
	                    		<td>{{ $activity->activity }}</td>
	                    		<td>{{ $activity->created_at }} </td>
	                    	</tr>
                    	@endforeach
                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
