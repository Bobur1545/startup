@extends('admin.layout.app')
@section('content')


    <div class="container" style="max-width: 900px; margin: 40px;  padding: 20px; text-align: center;">

        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
            <img src="{{asset('images/'.$add_news->image)}}" class="img-fluid" />
        </div>

        <div class="col-md-12 mb-4" style="margin-top: 30px;">
            <h4><strong>{{$add_news->title}}</strong></h4>
            <p class="text-muted">
                {{$add_news->text}}
            </p>
        </div>


    </div>


@endsection
