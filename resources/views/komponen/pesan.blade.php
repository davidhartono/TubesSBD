@if ($errors->any())
    <div class="alert alert-danger my-2">
        <ul class="list-unstyled my-2">
            @foreach ($errors->all() as $item)
                <li> {{$item}} </li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('success'))
    <div class="alert alert-success">{{Session::get('success')}} </div>
@endif

@if (Session::get('error'))
    <div class="alert alert-danger">{{Session::get('error')}} </div>
@endif