@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">Activity Data</h1>
    <div class="card mb-4">

        <div class="card-body">
            <a href="/activity/create" class="btn btn-primary">+ Add Message</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->author->username }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->message }}</td>
                            <td style="width: 150px;">
                                <div class="d-flex">
                                    <button class="btn btn-secondary me-2"
                                        onclick="window.location='{{ url('activity/' . $item->id . '/edit') }}'">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <form class="d-inline" action="{{ url('activity/' . $item->id) }}" method="post"
                                        onsubmit="return deleteData('{{ $item->title }}')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
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
