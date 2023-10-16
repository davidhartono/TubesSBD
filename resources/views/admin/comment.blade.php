@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">Comment Data</h1>
    @include('komponen.pesan')
    <h5>Recipe Comments</h5>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Post ID</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipeComments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->author->username }}</td>
                            <td>{{ $comment->recipe->id }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('recipe-comments.destroy', $comment->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $recipeComments->links() }}
        </div>
    </div>
    <h5>Tips Comments</h5>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Post ID</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipComments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->author->username }}</td>
                            <td>{{ $comment->tip->id }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('tip-comments.destroy', $comment->id) }}"
                                    method="post" onsubmit="return deleteData('{{ $comment->comment }}')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tipComments->links() }}
        </div>
    </div>
    <script>
        function deleteData(name) {
            pesan = confirm(`Are you sure on deleting ${name}?`);
            if (pesan) return true;
            else return false;
        }
    </script>
@endsection
