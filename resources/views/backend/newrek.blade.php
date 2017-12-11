@extends('backend.layouts.master')

@section('after-scripts')
    <script type="text/javascript" src="/js/vendor/ajaxupload.3.5.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var button = $("#butUpload"), interval, file;
            new AjaxUpload(button, {
                action: "picupload",
                data: {_token : "{{ csrf_token() }}"},
                name: "userfile",
                //_token : "{{ csrf_token() }}",
                onSubmit: function(file, ext){
                    if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                    // extension is not allowed
                        button.text("{{ trans('bnewrek.ext') }}");
                        return false;
                    }
                    button.text("{{ trans('bnewrek.download') }}");
                    this.disable();

                    var text = button.text();
                    if(text.length < 11){
                        button.text(text + ".");
                    }else{
                        button.text("{{ trans('bnewrek.download') }}");
                    }
                },
                onComplete: function(file, response){
                    if(response==="error"){
                        $("#fileUpload").html("{{ trans('bnewrek.err') }}");
                    } else {
                        button.text("{{ trans('bnewrek.change') }}");
                        var fileInfo = JSON.parse(response);

                        $("#fileImg").html('<img src="/img/tmp/'+'work.'+fileInfo.ext+'?'+Math.random()+'" alt=""/><br />');

                        //$("#fileImg").html('<img id="loadPic" src="" alt=""/><br />');
                        //$("#loadPic").attr('src','/img/tmp/'+'work.jpg?'+Math.random());

                        $("#fileInfo").html(fileInfo.name + ' / ' + fileInfo.type + ' / ' + fileInfo.size + ' / ' + fileInfo.dimensions);
                    }
                    this.enable();
                }
            });
        });

        function checkKs() {
            var sel = $("#kw :selected").map(function(){ return this.text }).get().join("{{ $delimiter }} ");
            //sel = $("#kw :selected").text();
            $("#kscontrol").html(sel);
        }

    </script>
@endsection

@section('content')

    <h3 class="box-title">{{ trans('bnewrek.addnew') }}.</h3>

    <div class="form-group form-group-lg">
        <div id="butUpload" class="btn btn-primary">{{ trans('bnewrek.selectfile') }}</div>
        <div id="fileImg"></div>
        <div id="fileInfo"></div>
    </div>

    {!! Form::open(['url' => 'admin/add', 'class' => 'form-horizontal', 'role' => 'form']) !!}
        <div class="form-group form-group-lg">
            <div class="col-sm-2">
                {!! Form::label('razmer', trans('bnewrek.imgsize')) !!}
                {!! Form::select('razmer', ['800' => '800', '1000' => '1000', '1200' => '1200', '0' => trans('bnewrek.othersize')], null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::label('mrazmer', trans('bnewrek.othersize')) !!}
                {!! Form::input('number', 'mrazmer', 777, ['class' => 'form-control', 'min' => 400, 'max' => 2000]) !!}
            </div>
        </div>

        <div class="form-group form-group-lg">
            <div class="col-sm-4">
                {!! Form::label('name', trans('bnewrek.name')) !!}
                {!! Form::input('text', 'name', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Name of ad']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('polosa', trans('bnewrek.page')) !!}
                {!! Form::select('polosa', ['1' => trans('bnewrek.page1'), '2' => trans('bnewrek.page23'), '4' => trans('bnewrek.page4'), '0' => trans('bnewrek.page0')], 1, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-sm-4">
                {!! Form::label('kw', trans('bnewrek.kwords')) !!}
                {!! Form::select('kw[]', $kw, null, ['class' => 'form-control', 'id' => 'kw', 'multiple' => 'multiple', 'size' => '10', 'onchange' => 'checkKs()']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('kscontrol', trans('bnewrek.selkwords')) !!}
                {!! Form::textarea('kscontrol', '', ['class' => 'form-control', 'readonly' => 'readonly', 'rows' => 10]) !!}
            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-sm-8">
                {!! Form::label('newks', trans('bnewrek.addkwords') . ' « ' . $delimiter . ' »') !!}
                {!! Form::input('text', 'newks', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-sm-8">
                {!! Form::label('ooo', trans('bnewrek.namedoc')) !!}
                {!! Form::input('text', 'ooo', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group form-group-lg">
            <div class="col-sm-8">
                {!! Form::label('web', trans('bnewrek.web')) !!}
                {!! Form::input('text', 'web', '', ['class' => 'form-control', 'placeholder' => 'www']) !!}
            </div>
        </div>

        {!! Form::submit(trans('bnewrek.add'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
