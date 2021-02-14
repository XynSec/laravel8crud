@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tutorial CRUD Laravel 8 untuk Pemula - xynsec.my.id</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('barangs.create') }}"> Input barang</a>
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
            <th width="20px" class="text-center">No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($barangs as $barang)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $barang->nama }}</td>
            <td>{{ $barang->harga }}</td>
            <td class="text-center">
                <form action="{{ route('barangs.destroy',$barang->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('barangs.show',$barang->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('barangs.edit',$barang->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $barangs->links() !!}

@endsection
