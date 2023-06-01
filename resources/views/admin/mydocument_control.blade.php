@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <div class="col-md-12 mb-4" style="margin-top: 30px;">

                            <div style="margin-bottom: 15px;">
                                <h4>Name of project</h4>
                                <p style=" color: blue;"><strong> {{$mydocuments->project_name}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Type of project</h4>
                                <p style=" color: blue;"><strong> {{$mydocuments->project_type}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Fields of project</h4>
                                <p style=" color: blue;"><strong> {{ $mydocuments->project_field}} </strong></p>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Github address of project</h4>
                                <a href="{{$mydocuments->project_github}}">  <p style=" color: blue;"><strong> {{ $mydocuments->project_github}} </strong></p></a>
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Presentation of project (*ppt)</h4>
                                {{--                                <iframe src="{{ asset('presentation/' .  $mydocuments->project_ppt) }}" width='80%' height='565px' frameborder='0'> </iframe>--}}
                                {{--                                <iframe src="https://docs.google.com/gview?url={{ asset('presentation/' . $mydocuments->project_ppt) }}&embedded=true" frameborder="0" width="100%" height="600"></iframe>--}}
                                <a href="{{ route('user_download.file', ['id' => $mydocuments->id]) }}"><h5 class="text-muted" style="text-transform: none;">Download File</h5></a><br>
                                <span class="fa fa-download"></span>
                                {{ $mydocuments->project_ppt }}
                            </div>

                            <div style="margin-bottom: 15px;">
                                <h4>Image of project</h4>
                                <img src="{{asset('images/'. $mydocuments->project_images)}}" class="img-fluid" style="width: 150px; height: 100px" />
                            </div>

                        </div>
                    </div>
                </div>
                <a href="{{route('mydocuments.index')}}" class="btn btn-primary">⬅️ Back</a>
                <!-- Button trigger modal -->
                <button onclick="func({{$mydocuments}}, '{{ route('mydocuments.update', $mydocuments->id) }}')" id="showModal" class="btn btn-warning" style="margin: 15px;" data-toggle="modal" data-target="#exampleModal2">Update</button>
            </div>
        </div>
    </div>
    </div>


        modal for update
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form  action="{{route('mydocuments.update', $mydocuments->id)}}" enctype="multipart/form-data" id="update_form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input id="fid" type="hidden" name="id" required>

                            <div class="col-md-12">
                                <label class="form-label">Name of project</label>
                                <input type="text" class="form-control" id="fproject_name" name="project_name" placeholder="Enter project name" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Type of project</label>
                                <input type="text" class="form-control" id="fproject_type" name="project_type" placeholder="Enter project type" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Fields of project</label>
                                <input type="text" class="form-control" id="fproject_field" name="project_field" placeholder="Enter project fields" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Github address of project (*optional)</label>
                                <input type="text" class="form-control" id="fproject_github" name="project_github" placeholder="Enter project github address">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Presentation of project (*ppt)</label>
                                <input type="file" class="form-control" id="fproject_ppt" name="project_ppt">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Image of project (*optional)</label>
                                <input type="file" class="form-control" id="fproject_images" name="project_images">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



@endsection
<script>
    function func(documents, route){
        console.log(documents.project_name);
        document.getElementById('fid').value = documents.id;
        document.getElementById('fproject_name').value = documents.project_name;

        console.log(documents.project_type);
        document.getElementById('fproject_type').value = documents.project_type;

        console.log(documents.project_field);
        document.getElementById('fproject_field').value = documents.project_field;

        console.log(documents.project_github);
        document.getElementById('fproject_github').value = documents.project_github;

        document.getElementById('fproject_ppt').value = documents.project_ppt;
        document.getElementById('fproject_images').value = documents.project_images;
        var form = document.getElementById('update_form');
        form.setAttribute('action', route);
    }
</script>
