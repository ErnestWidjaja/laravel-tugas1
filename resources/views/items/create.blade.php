@extends('items.layout')
  
@section('content')

<a class="btn btn-primary" href="{{ route('items.index') }}" style="margin-bottom: 30px;margin-top: 30px"><i class="fa fa-arrow-left"></i></a>

<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="number" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <input type="text" name="kategori" class="form-control" placeholder="Kategori">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok</strong>
                <input type="number" name="stok" class="form-control" placeholder="Stok">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar</strong>
                <input type="file" name="gambar" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
@endsection