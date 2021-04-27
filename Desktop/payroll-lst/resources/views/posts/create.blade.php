@extends('template')
 
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create Akun Pengguna </h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nama Depan </strong>
                <input type="text" id="nama_depan" name="nama_depan" class="form-control" placeholder="Nama Depan">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nama Tengah </strong>
                <input type="text" id="nama_tengah" name="nama_tengah" class="form-control" placeholder="Nama Tengah">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Nama Belakang </strong>
                <input type="text" id="nama_belakang" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Kata Sandi </strong>
                <input type="password" class="form-control" name="kata_sandi" placeholder="Password">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Level Akun</strong>
                <select class="form-control" id="id_level_akun" name="id_level_akun">
                  <option value="Maker">Maker</option>
                  <option value="Cheker 1">Ceker 1</option>
                  <option value="Cheker 2">Ceker 2</option>
                  <option value="Approval">Approval</option>
                  <option value="Releaser">Releaser</option>
                </select>
            </div>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Foto</strong>
                <input class="form-control" type="file" name="foto">
            </div>
        </div>
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-left mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection

