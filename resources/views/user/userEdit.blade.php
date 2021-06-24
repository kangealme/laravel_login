@extends('user.template.user.main')

@section('title', 'Edit User')

@section('content')
    <div id="content">
    <style>
        .card-horizontal {
            display: flex;
            flex: 1 1 auto;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> --}}
        <div class="row">
            <div class="mx-auto">
                <div class="card" style="width: 60rem;">
                    <form action="{{url('/updateUser')}}" class="user" method="post" enctype="multipart/form-data">
                    @csrf
                         <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <div class="row">
                                     <img class="rounded pt-1 pl-3" src="{{url(Session::get('foto'))}}" style="max-width:200px" alt="">
                                </div>
                                <div class="row">
                                    <input type="file" name="file" class="form-control mt-4 mx-3 ">
                                </div>

                            </div>
                            <div class="card-body" style="background-color:#CDF0EA">
                                {{-- <h4 class="card-title">{{$user['name']}}</h4>
                                <p class="card-text">{{$user['email']}}</p> --}}
                                <div class="row ml-4">
                                    <div class="col-6">
                                        <label for="name"><strong>Nama</strong></label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$user['name'] ? $user['name'] : old('name')}}">
                                    </div>
                                    <div class="col-6">
                                        <label for="username"><strong>Username</strong></label>
                                        <input type="text" class="form-control" name="username" id="username" value="{{$user['username'] ? $user['username'] : old('username')}}">
                                    </div>
                                </div>
                                <div class="row ml-4 mt-5">
                                    <div class="col-4">
                                        <label for="email"><strong>Email</strong></label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$user['email'] ? $user['email'] : old('email')}}">
                                    </div>
                                    <div class="col-8">
                                        <label for="nohp"><strong>nohp</strong></label>
                                        <input type="text" class="form-control" name="nohp" id="nohp" value="{{$user['nohp'] ? $user['nohp'] : old('nohp')}}">
                                    </div>
                                </div>
                                <div class="row ml-4 mt-5">
                                    <div class="col-12">
                                        <label for="alamat"><strong>Alamat</strong></label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" value="{{$user['alamat'] ? $user['alamat'] : old('alamat')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
                            <div class="float-right">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

