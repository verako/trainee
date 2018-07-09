@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if ((Auth::user()->role_id)=='1') 
                <div class="panel-heading">Create an order</div>
                @else
                <div class="panel-heading">List of applications</div>
                @endif

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
