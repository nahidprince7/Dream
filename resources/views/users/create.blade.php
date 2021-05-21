@extends('master.master')
@section('title','Create User')
@section('guest-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header"><strong>ADD NEW USER</strong>
            </div>
            @include('partials.flashMessages')
            @yield('flashError')
            <form method="post" action="{{route('user-store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="card-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-2">
                        <img id="preview" class="" height="100px" width="100px" src="{{asset('storage/avatar.jpg/')}}" alt="Profile picture">
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="col-md-6 col-form-label" for="file-input">Upload Profile Picture</label>
                        <div class="col-md-6">
                            <input type="file" id="picture" name="picture"
                                   onchange="loadFile(event)">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Name</label>
                        <input class="form-control @error('name') is-invalid @enderror "
                               name="name" value="{{ old('name') }}" type="text" placeholder="Enter your name"
                        >
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Role</label>
                        <select class="form-control" id="roles" name="role_ids[]" multiple>
                            @foreach(ROLES as $k=>$role)
                                <option value="{{ $k }}" {{ (collect(old('role_ids'))->contains($k)) ? 'selected':'' }}>
                                    {{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label >Email</label>
                        <input class="form-control @error('email') is-invalid @enderror "
                               name="email" type="email" placeholder="Enter email" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="country">Mobile Number</label>
                        <input class="form-control @error('number') is-invalid @enderror "
                               value="{{ old('number') }}"
                               name="number" type="number" placeholder="Enter your mobile number">
                        @error('number')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-3">
                        <label >Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="{{ old('gender') }}">Select Gender</option>
                            @foreach(GENDER as $k=>$gender)

                                <option value="{{ $k }}" {{ (collect(old('gender'))->contains($k)) ? 'selected':'' }}>
                                    {{ $gender }}</option>

{{--                                @if(old('gender') == $k )--}}
{{--                                <option value="{{$k}}" selected>{{$gender}}</option>--}}
{{--                                @else--}}
{{--                                    <option value="{{$k}}">{{$gender}}</option>--}}
{{--                                @endif--}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label >Password</label>
                        <input class="form-control @error('number') is-invalid @enderror " name="password"
                               type="password" placeholder="Enter your password">
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-sm-3">
                        <label >Confirm Password</label>
                        <input class="form-control" name="password_confirmation"  type="password" placeholder="Enter your password">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('guest-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        var loadFile = function (event) {
            var output = document.getElementById('preview');
            // console.log(output);
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        $("#roles").select2({
            multiple: true,
            placeholder: "Select Roles",
            allowClear: true,
        })
    </script>
@endsection
