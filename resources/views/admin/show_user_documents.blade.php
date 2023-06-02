@extends('admin.layout.app')
@section('content')

    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <div class="col-md-12 mb-4" style="margin-top: 30px;">

                            <div style="margin-bottom: 15px;">
                                <h4>Participant's name</h4>
                                <p style=" color: red;"><strong> {{$mydocuments->user->name}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Participant's group</h4>
                                <p style=" color: red;"><strong> {{$mydocuments->user->group}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Name of the project</h4>
                                <p style=" color: blue;"><strong> {{$mydocuments->project_name}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Type of the project</h4>
                                <p style=" color: blue;"><strong> {{$mydocuments->project_type}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Fields of the project</h4>
                                <p style=" color: blue;"><strong> {{ $mydocuments->project_field}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Github address of the project</h4>
                                <a href="{{$mydocuments->project_github}}">  <p style=" color: blue;"><strong> {{ $mydocuments->project_github}} </strong></p></a>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Presentation of the project (*ppt)</h4>
                                {{--                                <iframe src="{{ asset('presentation/' .  $mydocuments->project_ppt) }}" width='80%' height='565px' frameborder='0'> </iframe>--}}
                                {{--                                <iframe src="https://docs.google.com/gview?url={{ asset('presentation/' . $mydocuments->project_ppt) }}&embedded=true" frameborder="0" width="100%" height="600"></iframe>--}}
                                <a href="{{ route('user_download.file', ['id' => $mydocuments->id]) }}"><h5 class="text-muted" style="text-transform: none;">Download File</h5></a><br>
                                <span class="fa fa-download"></span>
                                {{ $mydocuments->project_ppt }}
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Image of the project</h4>
                                <img src="{{asset('images/'. $mydocuments->project_images)}}" class="img-fluid" style="width: 150px; height: 100px" />
                            </div>

                        </div>
                    </div>
                </div>
{{--                <a href="{{route('mydocuments.index')}}" class="btn btn-primary">⬅️ Back</a>--}}
                  </div>
        </div>
    </div>

@endsection
