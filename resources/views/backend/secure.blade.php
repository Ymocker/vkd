@extends('backend.layouts.master')

@section('content')
    <h3 class="box-title">{{ trans('bnewsec.mailpass') }}.</h3>

    {!! Form::open(['url' => 'admin/security', 'class' => 'form-horizontal', 'role' => 'form']) !!}

        <div class="form-group form-group-lg">
            <div class="col-sm-4">
                {!! Form::label('adminemail', 'e-mail') !!}
                {!! Form::input('email', 'adminemail', $admail, ['class' => 'form-control', 'required' => true]) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('pass', trans('bnewsec.pass')) !!}
                {!! Form::input('text', 'pass', '', ['class' => 'form-control', 'required' => true, 'minlength' => 6]) !!}
            </div>
        </div>

        {!! Form::submit(trans('bnewsec.save') ,['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection
