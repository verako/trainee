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

                    
                    @if ((Auth::user()->role_id)=='1')  
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('teme') ? ' has-error' : '' }}">
                                <label for="teme" class="col-md-4 control-label">Teme</label>
                                <div class="col-md-6">
                                    <input id="teme" type="text" class="form-control" name="teme" required autofocus>

                                    @if ($errors->has('teme'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('teme') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                <label for="message" class="col-md-4 control-label">Message</label>

                                <div class="col-md-6">
                                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                                    <!-- <input id="message" type="textarea" class="form-control" name="message" required> -->

                                    @if ($errors->has('message'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                             <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <label for="file" class="col-md-4 control-label">File</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control" name="file" value="file" required>

                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        send
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                    <table class="table table-striped task-table">
                    <!-- Table Headings -->
                        <thead>
                            <th>id</th>
                            <th>teme</th>
                            <th>message</th>
                            <th>customer name</th>
                            <th>email</th>
                            <th>file</th>
                            <th>time of creation</th>
                            <th>reply sent</th>
                        </thead>
                     <!-- Table Body -->
                        <tbody>
                            <tr>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>
                                <td>
        
                                </td>
                                <td>
                                   
                                </td>
                            </tr>
                           </tbody>
                    </table>            
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
