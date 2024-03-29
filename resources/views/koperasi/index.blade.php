@extends('koperasi.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Koperasi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('koperasi.create') }}"> Create New koperasi</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No Registrasi</th>
            <th>Nama Koperasi</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th>Jenis Produk</th>
            <th>Jumlah Anggota</th>
        </tr>
        @foreach ($koperasis as $koperasi)
        <tr>
            <td>{{ $koperasi->no_registrasi }}</td>
            <td>{{ $koperasi->nama_koperasi }}</td>
            <td>{{ $koperasi->alamat_koperasi }}</td>
            <td>{{ $koperasi->notelepon_koperasi }}</td>
            <td>{{ $koperasi->email_koperasi }}</td>
            <td>{{ $koperasi->jenis_produk }}</td>
            <td>{{ $koperasi->jumlah_anggota }}</td>
            <td>
                <form action="{{ route('koperasi.destroy',$koperasi->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('koperasi.show',$koperasi->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('koperasi.edit',$koperasi->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $koperasis->links() !!}
        
@endsection