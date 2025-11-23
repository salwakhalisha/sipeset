@extends ('template.layouts')
@section ('title', 'Kategori Aset')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Kategori Aset</h4>

                    <form action="{{ route('kategori.store') }}" method="POST">
                      @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kategori Aset">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> No</th>
                            <th> Nama </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $kg)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$kg['nama']}}</td>
                          <td>
                            <a href="{{route('kategori.edit',$kg['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- <form action="{{route('kategori.delete',$kg['id'])}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form> -->
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              @endsection