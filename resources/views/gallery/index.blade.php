@extends('gallery_layouts.app-gallery')

    @section('content')

        <!-- First Container -->
        <div class="container-fluid bg-1">

            <div class="row">
                <div class="col-lg-12">

                    {!! Form::open(['route' => 'image.upload', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'class'=>'form-inline']) !!}

                    {{ Form::token() }}

                    <div class="panel panel-default">
                        <div class="panel-body">


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('status'))
                                {!! session('status') !!}
                            @endif



                            <div class="col-md-6">
                                <div class='form-group'>
                                    <label class="" for="inputWarning1"></label>

                                    {{Form::file('filename[]', ['class'=>'form-control', 'multiple'])}}

                                </div>

                                <div class="form-group">

                                    {{Form::submit('Upload', ['class'=>'btn btn-success'])}}

                                </div>

                            </div>

                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>

                    @include('gallery/data')

            {{ $uploads->appends(['sort' => 'filename'])->render() }}

        </div>

@endsection

