@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">BACK-END RITEMPO</div>

                <div class="panel-body">
                 {{ Auth::user()->name }}  Ya estas Logueado en el Sistema Presiona en comenzar
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
