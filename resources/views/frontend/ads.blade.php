@extends('frontend.layouts.adsmaster')

@section('content')

<div class="row" id="rowAdblck">
    <div class="col-xs-12" id="adblck">
        <hr>
        <p>Реклама в номере {{ $nomer->nomgod }}({{ $nomer->nomgaz }}) от {{ $nomer->datavyh }}</p>

        @if ($reklama->web != '')
            <h4><a href="http://{{ $reklama->web }}"><p>Сайт рекламодателя http://{{ $reklama->web }}</p>
                    <img class="img-responsive" src="/img/{{ $reklama->rekname }}.jpg" alt="..."></a><h4>
        @else
            <img class="img-responsive" src="/img/{{ $reklama->rekname }}.jpg" alt="...">
        @endif
    </div>
</div>

@endsection



