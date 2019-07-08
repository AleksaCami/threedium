@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div >
        <a href="/articles/create"><button class="btn btn-primary">Create Article</button></a>
    </div>
    <div class="row py-3">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col" style="width: 100px">Cover image</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="">Description</th>
                    <th scope="col">Open</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><img class="img-fluid" style="height: auto" src="/storage/article_images/{{$article->article_images}}"></td>
                        <td>{{$article->heading}}</td>
                        <td>{{$article->subheading}}</td>
                        <td>
                            <a href="/articles/{{$article->id}}"><button  class="btn btn-block btn-primary float-right">Open</button></a>
                        </td>
                        <td>
                            <a href="/articles/edit/{{$article->id}}"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                        </td>
                        <td>
                                <button id="deleteArticle" class="btn btn-danger btn-xs" data-id="{{$article->id}}"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $('#example').DataTable({
                "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                "iDisplayLength": 5
            }
        );
    </script>
@endsection
