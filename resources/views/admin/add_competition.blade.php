@extends('admin.layout.app')
@section('content')


        <div role="document">
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row page-titles mx-0">
                        <div class="col p-md-0" >

                            <!-- Button trigger modal -->
                            <button type="button" style="margin: 30px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add competition
                            </button>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Last day of application </th>
                                    <th scope="col">Competition day</th>
                                    <th scope="col">Operation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($add_competitions as $add_competition)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$add_competition->name}}</td>
                                        <td>{{$add_competition->last_document_day}}</td>
                                        <td>{{$add_competition->competition_day}}</td>
                                        <td>
                                            <div style="display: flex; align-items: center;">
                                                <button onclick="func({{$add_competition}}, '{{ route('add_competition.update', $add_competition->id) }}')"
                                                   id="showModal" class="btn btn-warning" style="margin-right: 5px;" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i></button>

                                                <form action="{{route('add_competition.destroy', $add_competition->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>

{{--                                    update data--}}
                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ma'lumotlarni yangilash</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form  action="{{route('add_competition.update', $add_competition->id)}}"  id="update_form" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <input id="fid" type="hidden" name="id" required>

                                                        <label for="name">Name of competition</label>
                                                        <input type="text" id="fname" name="name" value="" class="form-control" required>

                                                        <label for="phone">Last day of application</label>
                                                        <input type="text" id="flast_document_day" name="last_document_day" value="" class="form-control" required>

                                                        <label for="address">Competition day</label>
                                                        <input type="text" id="fcompetition_day" name="competition_day" class="form-control" value=""  required>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
{{--                                    update data end--}}

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $add_competitions->links() }}
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
                    <form method="post" action="{{route('add_competition.store')}}">
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label class="form-label">Name of competition</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Last day of application</label>
                                <input type="date" class="form-control" name="last_document_day" placeholder="Enter date" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Competition day</label>
                                <input type="date" class="form-control" name="competition_day" placeholder="Enter date" required>
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
<script>
    function func(competition, route){
        console.log(competition.name);
        document.getElementById('fid').value = competition.id;
        document.getElementById('fname').value = competition.name;
        console.log(competition.last_document_day);
        document.getElementById('flast_document_day').value = competition.last_document_day;
        console.log(competition.competition_day);
        document.getElementById('fcompetition_day').value = competition.competition_day;
        var form = document.getElementById('update_form');
        form.setAttribute('action', route);
    }
</script>
