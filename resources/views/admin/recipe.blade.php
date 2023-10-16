@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">Recipe Data</h1>
    <div class="card mb-4">

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->author->username }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->image)
                                    <img style="width:200px" src="{{ asset('img/recipe/' . $item->image) }}" alt="">
                                @endif
                            </td>
                            <td>
                                {{-- <button class="btn btn-secondary" onclick="window.location='{{ url('recipes/' . $item->id) }}'"
                                    title="Edit Data"><i class="bi bi-pencil"></i></button> --}}
                                <form onsubmit="return deleteData('{{ $item->fullname }}')"
                                    action="{{ url('recipes/' . $item->id) }}" method="post" style="display: inline"
                                    onsubmit="return deleteData('{{ $item->title }}')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
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
