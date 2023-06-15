@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <div class="col-md-6" style="margin: 12px">
                            <form action="{{ route('evaluation.index') }}" method="get">
                                <select class="custom-select" style="" id="selectBox" required name="competition_id" onchange="this.form.submit()">
                                    <option value="" > Select one of competitions </option>
                                    @foreach($competitions as $competition)
                                        <option value="{{ $competition->id }}" {{ $selectedCompetitionId == $competition->id ? 'selected' : '' }}>
                                            {{ $competition->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>



                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Project name</th>
                                <th scope="col">Show documents</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($sharedocuments as $sharedocument)
                                <tr>
                                    <th scope="row"> {{$i++}} </th>
                                    <td> {{$sharedocument->user->name}} </td>
                                    <td> {{$sharedocument->mydocuments->project_name}} </td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <form style="margin-right: 8px;" action="{{route('control_documents.show_user_documents', $sharedocument->mydocuments_id)}}" method="get">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-file"></i></button>
                                            </form>

                                            <button onclick="func({{$sharedocument}}, '{{ route('evaluation.store') }}')"
                                                    id="showModal" class="btn btn-warning" style="margin-right: 5px;" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-hourglass-end"></i></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>

                                {{--    modal for update--}}
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{ route('evaluation.store') }}" id="save_form" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input id="fuser_id" type="hidden" class="form-control" name="user_id" value="{{$sharedocument->user_id}}" required>
                                                    <input id="fcompetition_id" type="hidden" class="form-control" name="competition_id" value="{{$sharedocument->competition_id}}" required>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Scientific and innovative novelty of the project</label>
                                                        <input id="fcategory_1" type="number" class="form-control" name="category_1" placeholder="Put a score" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Orientation of the project to the solution of a specific problem</label>
                                                        <input id="fcategory_2" type="number" class="form-control" name="category_2" placeholder="Put a score" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">Business model, monetization and expected results of the project</label>
                                                        <input id="fcategory_3" type="number" class="form-control" name="category_3" placeholder="Put a score" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label">The existence of a model of the project (with a video) or a technical base (prototype)</label>
                                                        <input id="fcategory_4" type="number" class="form-control" name="category_4" placeholder="Put a score" required>
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
                                {{--                                modal update end--}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function func(sharedocument, route){
            console.log(sharedocument.title);
            document.getElementById('fuser_id').value = sharedocument.user_id;
            console.log(sharedocument.user_id);
            document.getElementById('fcompetition_id').value = sharedocument.competition_id;
            console.log(sharedocument.competition_id);
            document.getElementById('fcategory_1').value = sharedocument.category_1;
            document.getElementById('fcategory_2').value = sharedocument.category_2;
            document.getElementById('fcategory_3').value = sharedocument.category_3;
            document.getElementById('fcategory_4').value = sharedocument.category_4;
            var form = document.getElementById('save_form');
            form.setAttribute('action', route);
        }
    </script>
@endsection
