@extends('user.template.admin.main')

@section('title', 'Pengguna')

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
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="rounded" src="{{url('/assets/img/pengguna/'.Session::get('foto'))}}" style="max-width:200px" alt="">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$user['name']}}</h4>
                            <p class="card-text">{{$user['email']}}</p>
                            <p class="card-text">{{$user['nohp']}}</p>
                            <p class="card-text">{{$user['alamat']}}</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{-- <small class="text-muted">Last updated 3 mins ago</small> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

