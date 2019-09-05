@extends('items.layout')
 
@section('content')

<a class="btn btn-primary" href="{{ route('items.create') }}" style="margin-bottom: 30px;margin-top: 30px"><i class="fa fa-plus"></i></a>

<table id="table" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Katagori</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $d)
        <tr>
            <td>{{$d->nama}}</td>
            <td>{{$d->harga}}</td>
            <td>{{$d->kategori}}</td>
            <td>{{$d->stok}}</td>
            <td><img src="{{URL::asset('/gambar/'.$d->gambar)}}" style="width: 150px;height: 150px"></td>
            <td>
                <form action="{{ route('items.destroy',$d->id) }}" method="POST">
                    <a class="btn btn-warning" href="{{ route('items.edit',$d->id) }}" style="color: white"><i class="fa fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#table').DataTable();
    } );
</script>
@endsection