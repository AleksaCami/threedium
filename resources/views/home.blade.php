@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div >
        <a href="/articles/create"><button class="btn btn-primary">Create Article</button></a>
    </div>
    @if(count($articles) == 0)
        <div class="container py-3">
            <div class="align-content-center" style="text-align: center">
                <span>You don't have any articles. Try writing one!</span>
            </div>
        </div>
    @else
        <div class="row py-4">
            <div id="myData"></div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 100px">Cover image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
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
                            <td>{{$article->title}}</td>
                            <td>{{$article->description}}</td>
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

        const articles = 'http://127.0.0.1:8000/api/data'
        const response = fetch(articles);

        response.then(function(response) {
            return response.json();
        }).then(function(data) {
            appendData(data);
        }).catch(function (err) {
           console.log(err);
        });
        //
        // function appendData(data) {
        //     let mainContainer = document.getElementById("myData");
        //     for (let i = 0; i < data.length; i++) {
        //         let div = document.createElement("div");
        //         div.innerHTML = data[i].heading;
        //         mainContainer.appendChild(div);
        //     }
        // }

        $('#example').DataTable({
                "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                "iDisplayLength": 5
            }
        );

        $(document).on('click', '#deleteArticle', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let $tr = $(this).closest('tr');

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
                            Swal.fire(
                                `${data.responseJSON.title} successfully deleted!`,
                                '',
                                'success'
                            );
                            $tr.find('td').fadeOut(1000, function(){
                                $tr.remove();
                                window.location.reload();
                            });
                        }
                    });
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
