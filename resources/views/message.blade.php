@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Application submitted</div>
                   <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h4>Ваше сообщение отправлено менеджеру, следующую завку Вы сможете отправить через 24 часа</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
