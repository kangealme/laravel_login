@extends('user.template.admin.main')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($pesan = Session::get('pesan'))
                    <div class="alert alert-success">{{$pesan}}</div>
                @endif
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <h1> Daftar Pengguna</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">No. HP</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $userRow)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$userRow->name}}</td>
                                <td>{{$userRow->username}}</td>
                                <td>{{$userRow->email}}</td>
                                <td>{{$userRow->nohp}}</td>
                                <td>
                                    @if ($userRow->is_admin)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="{{$userRow->is_admin}}" checked>
                                        </div>
                                    @else
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="is_admin" id="is_admin" value="{{$userRow->is_admin}}">
                                        </div>
                                    @endif

                                </td>
                                <td>
                                    @if ($userRow->is_active)
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="{{$userRow->is_active}}" checked>
                                        </div>
                                    @else
                                         <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="{{$userRow->is_active}}">
                                        </div>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{url('/editUserAdmin/'. $userRow->id)}}" class="btn badge bg-warning">Edit</a>
                                    <form action="{{url('/delUserAdmin/'. $userRow->id)}}" method="POST"  class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn badge bg-danger" type="submit">Hapus</button>
                                    </form>
                                    <a href="{{url('/detailUserAdmin/'. $userRow->id)}}" class="badge bg-success">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
