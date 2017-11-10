@extends('gallery_layouts.app-gallery')

@section('content')

<div class="container-fluid bg-1">
    <h1>Image List</h1>
    @foreach($uploads as $upload)
    <div class="row">
        <br/>
        <div class="col-md-5 col-lg-offset-1">
            <img src="{{ url('/public') . '/images/'.  $upload->filename   }}" style="height: 300px;width:300px;" class="profile-user-img img-responsive">
        </div>
        <div class="col-md-5">
            <div class="panel panel-info">
                <div class="panel-heading">Image Info.</div>
                <div class="panel-body" style="color: black;">
                    <p><code>Filename</code> <span>{{$upload->filename}}</span></p>
                    <p><code>Filesize</code> <span>{{$upload->filesize}}kb</span></p>
                    <p><code>Height</code> <span>{{$upload->height}}</span></p>
                    <p><code>Width</code> <span>{{$upload->width}}</span></p>
                    @foreach(\App\ImageUpload::getTags($upload->id) as $tag)
                        <code>Tag</code> <span class="badge"> {{ $tag->tags }}</span>
                    @endforeach
                </div>
            </div>
    </div>

    @endforeach
</div>




@endsection