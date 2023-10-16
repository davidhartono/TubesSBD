@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">User Data</h1>
    <div class="card mb-4">
        
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td style="width: 150px;">
                                <div class="d-flex">
                                    {{-- <button class="btn btn-secondary me-2"
                                        onclick="window.location='{{ url('profile/' . $item->id . '/edit') }}'">
                                        <i class="bi bi-pencil"></i>
                                    </button> --}}
                                    <form class="d-inline" action="{{ url('profile/' . $item->id) }}" method="post"
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
