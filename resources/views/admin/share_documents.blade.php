@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <!-- Button trigger modal -->
                        <button type="button" style="margin: 30px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Select document
                        </button>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">My document</th>
                                <th scope="col">Competition</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sharedocuments as $sharedocument)
                                <tr>
                                    <th scope="row">{{$sharedocument->id}}</th>
                                    <td>{{$sharedocument->mydocuments->project_name}}</td>
                                    <td>{{$sharedocument->competition->name}}</td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <form action="{{route('share_documents.destroy', $sharedocument->id)}}" method="post">
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
                <form action="{{route('share_documents.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <label for="title">Select documents</label>
                        <select class="custom-select" style="" id="selectBox" required name="mydocuments_id"  onchange= "desc()">
                            @foreach($mydocuments as $mydocument)
                                <option value="{{$mydocument->id}}">{{$mydocument->project_name}}</option>
                            @endforeach
                        </select>

                        <label for="title">Select competition</label>
                        <select class="custom-select" style="" id="selectBox" required name="competition_id"  onchange= "desc()">
                            @foreach($competitions as $competition)
                                <option value="{{$competition->id}}">{{$competition->name}}</option>
                            @endforeach
                        </select>


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
{{--<script>--}}
{{--    function func(news, route){--}}
{{--        console.log(news.title);--}}
{{--        document.getElementById('fid').value = news.id;--}}
{{--        document.getElementById('ftitle').value = news.title;--}}
{{--        console.log(news.text);--}}
{{--        document.getElementById('ftext').value = news.text;--}}
{{--        document.getElementById('fimage').value = news.image;--}}
{{--        var form = document.getElementById('update_form');--}}
{{--        form.setAttribute('action', route);--}}
{{--    }--}}
{{--</script>--}}
