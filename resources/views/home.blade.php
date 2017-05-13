@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload file</div>

                <div class="panel-body">
                    {{ Form::open(array('url' => '/store','files'=>'true')) }}
                    {{ Form::file('file') }}
                    <br />
                    {{ Form::submit('Upload') }}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your files</div>

                <div class="panel-body">
                    @foreach ($files as $file)
                            <a href="/get/{{ $file->hash }}">{{ $file->name }}</a>
                            <br />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
