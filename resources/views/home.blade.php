@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div >
        <a href="/articles/create"><button class="btn btn-primary">Create Article</button></a>
    </div>
    @if(count($articles) == 0)
        <span>You don't have any articles. Try writing one!</span>
    @else
        <div class="row py-3">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 100px">Cover image</th>
                        <th scope="col">Title</th>
                        <th scope="col" class="">Description</th>
                        <th scope="col">Author</th>
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
                            <td>{{$article->user->name}}</td>
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
    @endif
</div>
    <script type="text/javascript">
        $('#example').DataTable({
                "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                "iDisplayLength": 5
            }
        );

        $(document).on('click', '#deleteArticle', function(e) {
            e.preventDefault();
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "This action is irreversible!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then(function(result) {
                if(result.value){
                    $.ajax({
                        type: "POST",
                        url: 'http://127.0.0.1:8000/api/articles/destroy/' + id,
                        data: {id:id},
                        complete: function (data) {
                          window.location.reload();
                        }
                    });

                    console.log(result.value);
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire(
                        'Canceled',
                        'Your files are safe!',
                        'error'
                    )
                }
            })
        });
    </script>
@endsection
