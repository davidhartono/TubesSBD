@extends('layout.admin')

@section('konten')
    <h1 class="mt-4">Challenge Data</h1>
    <div class="card mb-4">

        <div class="card-body">
            <a href="/challenges/create" class="btn btn-primary">+ Add Challenge</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Desciption</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                @if ($item->image)
                                    <img style="max-width:50px; max-height:50px"
                                        src="{{ url($item->image)}}" alt="">
                                @endif
                            </td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->description }}</td>
                            <td><button class="btn btn-secondary" onclick="window.location='{{ url('challenges/' . $item->id . '/edit') }}'"><i
                                        class="bi bi-pencil"></i></button>
                                <form class="d-inline" action="{{ url('challenges/' . $item->id) }}" method="post"
                                    onsubmit="return deleteData('{{ $item->title }}')">
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
