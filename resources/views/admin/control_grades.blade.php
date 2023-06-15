@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <div class="col-md-6" style="margin: 12px">
                            <form action="{{ route('control_documents.index_grades') }}" method="get">
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
                                <th scope="col">Grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach($show_grades as $show_grade)
                                <tr>
                                    <th scope="row"> {{$i++}} </th>
                                    <td> {{$show_grade->user->name}} </td>
                                    <td> {{$show_grade->category_all}} </td>

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
