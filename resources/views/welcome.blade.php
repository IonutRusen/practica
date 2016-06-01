@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">FORM</div>

                <div class="panel-body">
                    {!! Form::open(array(
                        'class' => 'form-horizontal',
                        'action' => 'forms\salveaza@salveazaForm'
                    )) !!}
                    <div class="form-group">
                        {!! Form::label('url','URL',array(
                            'class' => 'col-md-4 control-label'
                        )) !!}
                        <div class="col-md-4">
                            {!! Form::text('url',null,array(
                                'class' => 'form-control input-md',
                                 'required' => 'required'
                            )) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('clasa1','Alerta Pret',array(
                            'class' => 'col-md-4 control-label'
                        )) !!}
                        <div class="col-md-4">
                            {!! Form::text('clasa1',null,array(
                                'class' => 'form-control input-md',
                                'required' => 'required'
                            )) !!}
                            <span class="help-block">Primeste alerta pe mail cand pretul scade sub valoarea setata</span>

                        </div>

                    </div>
                    <div class="form-group">
                        {!! Form::label('clasa2','Alerta stoc',array(
                            'class' => 'col-md-4 control-label'
                        )) !!}
                        <div class="col-md-4">
                            {!! Form::text('clasa2',null,array(
                                'class' => 'form-control input-md',
                                 'required' => 'required'
                            )) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            {!! Form::submit('Salveaza',array(
                                'class' => 'btn btn-primary'
                            )) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
