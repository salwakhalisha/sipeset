@extends ('template.layouts')
@section ('title', 'Pegawai')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Pegawai</h4>
                        <a href="{{route('pegawai.create')}}" class="btn btn-primary btn-icon-text">
                        <i class="mdi mdi-upload btn-icon-prepend"></i> Upload</a>
                    
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
                            <th> NIP </th>
                            <th> Nama </th>
                            <th> Alamat </th>
                            <th> Jabatan </th>
                            <th> Unit Kerja </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $pgw)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$pgw['nip']}}</td>
                          <td>{{$pgw['nama']}}</td>
                          <td>{{$pgw['alamat']}}</td>
                          <td>{{ $pgw->jabatan ? $pgw->jabatan->nama : 'Data tidak ditemukan' }}</td>
                          <td>{{ $pgw->unitkerja ? $pgw->unitkerja->nama : 'Data tidak ditemukan' }}</td>

                          <td>
                            <a href="{{route('pegawai.edit',$pgw['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route('pegawai.show',$pgw['id'])}}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{route('pegawai.delete',$pgw['id'])}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
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