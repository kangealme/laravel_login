@extends('user.template.user.main')

@section('title','Daftar Pengguna')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session()->has('pesan'))
                    <div class="alert alert-success">
                        {{session('pesan')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Daftar Pengguna</h2>
                <hr>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">NO HP</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $row)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$row->name}}</td>
                                <td>{{$row->username}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->nohp}}</td>
                                <td>
                                    <a href="{{url('/edituser')}}" class="badge badge-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
