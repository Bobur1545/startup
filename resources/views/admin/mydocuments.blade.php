@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <!-- Button trigger modal -->
                        <button type="button" style="margin: 30px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add documents
                        </button>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name of project</th>
                                <th scope="col">Type of project</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mydocuments as $mydocument)
                                <tr>
                                    <th scope="row">{{$mydocument->id}}</th>
                                    <td>{{$mydocument->project_name}}</td>
                                    <td>{{$mydocument->project_type}}</td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <form action="{{route('admin.mydocument_control', $mydocument->id)}}" method="get">
                                                <input type="hidden" value="{{$mydocument->id}}">
                                                <button type="submit" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-user"></i></button>
                                            </form>

                                            <form action="{{route('mydocuments.destroy', $mydocument->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for store-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Save</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('mydocuments.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label class="form-label">Name of project</label>
                            <input type="text" class="form-control" name="project_name" placeholder="Enter project name" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Type of project</label>
                            <input type="text" class="form-control" name="project_type" placeholder="Enter project type" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Fields of project</label>
                            <input type="text" class="form-control" name="project_field" placeholder="Enter project fields" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Github address of project (*optional)</label>
                            <input type="text" class="form-control" name="project_github" placeholder="Enter project github address">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Presentation of project (*ppt)</label>
                            <input type="file" class="form-control" name="project_ppt" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Image of project (*optional)</label>
                            <input type="file" class="form-control" name="project_images">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

