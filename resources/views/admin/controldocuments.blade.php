@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <div class="col-md-6" style="margin: 12px">
                            <form action="{{ route('control_documents.index') }}" method="get">
                                <select class="custom-select" style="" id="selectBox" required name="competition_id" onchange="this.form.submit()">
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
                                <th scope="col">Upload time</th>
                                <th scope="col">Show documents</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sharedocuments as $sharedocument)
                                <tr>
                                    <th scope="row"> {{$sharedocument->id}} </th>
                                    <td> {{$sharedocument->user->name}} </td>
                                    <td> {{$sharedocument->mydocuments->project_name}} </td>
                                    <td> {{$sharedocument->created_at}} </td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <form action="" method="post">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-laptop"></i></button>
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

@endsection
