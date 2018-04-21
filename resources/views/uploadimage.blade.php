@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload Image</div>

                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your image.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{session('success')}}</strong>
                    </div>
                    @endif

                    <form action="upload" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="uploadFormControlFile">Select image to upload</label>
                            <input type="file" class="form-control-file" id="uploadFormControlFile" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
