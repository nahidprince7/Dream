@section("flashError")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section("flashSuccess")
    @if(Session::has('message'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('message') }}
        </div>
    @endif
@endsection

