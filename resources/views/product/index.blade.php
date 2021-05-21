@extends('master.master')
@section('title','Product')

@section('guest-css')

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>
                                All Products
                            </h3>
                        </div>
                        <div class="col-md-4">
{{--                            <form action="{{route('user-index')}}" method="get">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input class="form-control" id="" name="searchKey" size="16" type="text" value="">--}}
{{--                                    <span class="input-group-append">--}}
{{--                            <button class="btn btn-secondary" type="submit">Search</button></span>--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div>




                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
{{--                            <th>Email</th>--}}
{{--                            <th>Role</th>--}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @if($users)--}}
{{--                            @php($sl = $users->perPage() * ($users->currentPage() - 1)+1)--}}
{{--                            @foreach($users as $user)--}}
{{--                                <tr>--}}
{{--                                    <td>{{$sl}}</td>--}}
{{--                                    <td>{{$user->name}}</td>--}}
{{--                                    <td>{{$user->email}}</td>--}}
{{--                                    <td>--}}
{{--                                        @foreach($user->userRoles as $roler)--}}
{{--                                            --}}{{--                        {{isset(ROLES[$roler->role_id])?ROLES[$roler->role_id]:''}}--}}
{{--                                            @foreach(ROLES as $k=>$roles)--}}
{{--                                                {{($k == $roler->role_id)?$roles:''}}--}}
{{--                                            @endforeach--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="dropdown" style="max-width: 50px;">--}}
{{--                                            <button class="btn btn-secondary dropdown-toggle" id="dropdownMenu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>--}}
{{--                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 34px, 0px); top: 0px; left: 0px; will-change: transform;">--}}
{{--                                                <button class="dropdown-item" type="button">Action</button>--}}
{{--                                                <button class="dropdown-item" type="button">Another action</button>--}}
{{--                                                <button class="dropdown-item" type="button">Something else here</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @php($sl++)--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
                        </tbody>
                    </table>
{{--                    {{$users->links()}}--}}
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@endsection
@section('guest-js')
@endsection
