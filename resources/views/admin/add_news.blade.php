@extends('admin.layout.app')
@section('content')


    <div role="document">
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col p-md-0" >

                        <!-- Button trigger modal -->
                        <button type="button" style="margin: 30px;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add news
                        </button>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Text</th>
                                <th scope="col">Image</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($add_news as $news)
                                <tr>
                                    <th scope="row">{{$news->id}}</th>
                                    <td>{{$news->title}}</td>
                                    <td>{{$news->text}}</td>
                                    <td>
                                        <img src="{{asset('images/'.$news->image)}}" style=" width: 150px; height: 150px;">
                                    </td>
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <button onclick="func({{$news}}, '{{ route('add_news.update', $news->id) }}')"

                                                    id="showModal" class="btn btn-warning" style="margin-right: 5px;" data-toggle="modal" data-target="#exampleModal2"><i class="fa fa-pencil"></i></button>

                                            <form action="{{route('add_news.destroy', $news->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
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

                                            <form  action="{{route('add_news.update', $news->id)}}" enctype="multipart/form-data" id="update_form" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <input id="fid" type="hidden" name="id" required>

                                                    <label for="name">Title of news</label>
                                                    <input type="text" id="ftitle" name="title" value="" class="form-control" required>

                                                    <label for="phone">Text of news</label>
                                                    <textarea id="ftext" class="form-control" name="text" style="height: 300px" required></textarea>

                                                    <label for="address">Competition day</label>
                                                    <input id="fimage" type="file" class="form-control" name="image">

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
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


    <!-- Modal for store-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Save</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('add_news.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label class="form-label">Title of news</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Text of news</label>
                            <textarea class="form-control" name="text" placeholder="Enter text" style="height: 300px" required></textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Main image of news</label>
                            <input type="file" class="form-control" name="image">
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
    function func(news, route){
        console.log(news.title);
        document.getElementById('fid').value = news.id;
        document.getElementById('ftitle').value = news.title;
        console.log(news.text);
        document.getElementById('ftext').value = news.text;
        document.getElementById('fimage').value = news.image;
        var form = document.getElementById('update_form');
        form.setAttribute('action', route);
    }
</script>
