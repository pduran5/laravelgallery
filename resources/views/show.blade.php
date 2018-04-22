@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Show Images</div>

                <div class="panel-body">
                    <ul>
                    @foreach($images as $image)
                    <li>
                            <p>{{ $image->original }}</p>
                            <img width="300px" src="storage/{{ $image->filename }}" />
                    </li>
                    <br>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
