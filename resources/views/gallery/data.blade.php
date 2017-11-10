<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Image List</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Preview</th>
                        <th>Filename</th>
                        <th >Filesize</th>
                        <th>Height</th>
                        <th>Width</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($uploads as $upload)
                    <tr>
                        <!-- <td></td> -->
                            <td style="width: 150px;">
                                <a href="#Imagepreview-{{$upload->id}}" data-toggle="modal">
                                    <img style="height:128px; width:128px;" src="{{ url('/public') . '/images/'.  $upload->filename   }}" alt="profile Pic" class="img-responsive img-circle">
                                    <div style="text-align: center; font-size: 16px;">Add Tag</div>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="Imagepreview-{{$upload->id}}" tabindex="-1" role="dialog" aria-labelledby="Imagepreview">
                                    <div class="modal-dialog ">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Image Preview</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div style="text-align: center;">
                                                    <img src="{{ url('/public') . '/images/'.  $upload->filename   }}" class="img-responsive">
                                                </div><br/>

                                                {!! Form::open(['route' => 'image.tag','method'=>'POST']) !!}
                                                    {{ Form::token() }}
                                                    <div class="form-group">
                                                        {{Form::input('text', 'tag', null, ['class'=>'form-control', 'placehoder'=>'Input tag'])}}
                                                        {{Form::input('hidden', 'image_id', $upload->id, ['class'=>'form-control', 'placehoder'=>'Input tag'])}}
                                                    </div>

                                                    <div class="form-group">
                                                         {{Form::submit('Add tag', ['class'=>'btn btn-success pull-right'])}}
                                                    </div>
                                                {!! Form::close() !!}


                                            </div><br/><br/>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">{{$upload->filename}}</td>
                            <td>{{$upload->filesize}}kb</td>
                            <td>{{$upload->height}}</td>
                            <td>{{$upload->width}}</td>

                            <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                                @foreach(\App\ImageUpload::getTags($upload->id) as $tag)
                                    <span class="badge"> {{ $tag->tags }}</span>
                                @endforeach
                            </td>

                            <td>
                                    <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#ConfirmDeleteImage-{{$upload->id}}" data-title="Delete" data-message="Are you sure you want to delete this item ?"><i class="glyphicon glyphicon-trash"></i> Delete</button>

                                <div class="modal fade" id="ConfirmDeleteImage-{{$upload->id}}" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                    <div class="modal-dialog">

                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Delete Parmanently</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this?</p>
                                            </div>
                                            <div class="modal-footer">

                                                {!! Form::open(['route' => 'image.destroy','method'=>'POST']) !!}
                                                    {{Form::input('hidden', 'filename', $upload->filename)}}
                                                    {{Form::input('hidden', 'image_id', $upload->id)}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                                {!! Form::close() !!}

                                            </div>
                                        </div>

                                    </div>

                                </div>




                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
