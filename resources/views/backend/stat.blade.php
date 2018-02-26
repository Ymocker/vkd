@extends('backend.layouts.master')

@section('content')
    <h3 class="box-title">{{ trans('bnewsec.stat') }}</h3>

        <div class="form-group form-group-lg">
            <div class="col-sm-4">
                <p><b>{!! trans('bnewsec.vis') !!}</b></p>
                <p>
                @foreach ($pages as $page)
                    {{ $page->hit }}&nbsp;-&nbsp;{{ $page->name }}<br />
                @endforeach
                </p>
            </div>

            <div class="col-sm-8">
                <b>Ref</b>
                <p>
                @foreach ($refs as $ref)
                    {{ $ref->hit }}&nbsp;-&nbsp;{{ $ref->ref }}<br />
                @endforeach
                </p>
            </div>

            <div class="col-sm-12">
                <b>Agents</b>
                <p>
                @foreach ($agents as $agent)
                    {{ $agent->hit }}&nbsp;-&nbsp;{{ $agent->agent }}<br />
                @endforeach
            </p>

        </div>

@endsection
