@extends('admin.layout.app')
@section('content')

    @foreach($add_news as $news)
    <div class="container" style="max-width: 900px; margin: 40px;  padding: 20px; text-align: center;">
        <form action="{{route('admin.show_news', $news->id)}}" >
            <div class="row gx-5">
                <div class="col-md-6 mb-4">
                    <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                        <img src="{{asset('images/'.$news->image)}}" class="img-fluid" />
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <span class="badge bg-danger px-2 py-1 shadow-1-strong mb-3">News of the day</span>
                    <h4><strong>{{$news->title}}</strong></h4>
                    <p class="text-muted">
                        {{$news->limitedText}}...
                    </p>
                    <button type="submit" class="btn btn-primary">Read more</button>
                </div>
            </div>
        </form>
    </div>
    @endforeach

    {{ $add_news->links() }}

@endsection












