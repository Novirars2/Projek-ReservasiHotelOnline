@extends('layout.admin')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fasilitas Hotel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('fasilitashotels.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Fasilitas</th>
            <th>Keterangan</th>
            <th>Image</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($fasilitashotels as $fasilitashotel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $fasilitashotels->nama_fasilitas }}</td>
            <td>{{ $fasilitashotels->keterangan }}</td>>
            <td>
                <img src="/uploads/{{ $fasilitashotels->image }}" width="100px">
            </td>
            <td>
                <form action="{{ route('fasilitasHotel.destroy',$fasilitashotels->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('fasilitashotels.edit',$fasilitashotels->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $fasilitashotels->links() !!}
        
@endsection