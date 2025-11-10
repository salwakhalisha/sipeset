@extends ('template.layouts')
@section ('title', 'Data Aset')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Aset</h4>

                    
                        <a href="{{route('aset.create')}}" class="btn btn-danger btn-icon-text">
                        <i class="mdi mdi-upload btn-icon-prepend"></i> Upload</a>
                    
                    
                    <div class="table-responsive pt-3">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> No</th>
                            <th> Nama </th>
                            <th> Kategori </th>
                            <th> Status </th>
                            <th> Lokasi </th>
                            <th> Kondisi </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($asets as $at)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$at['nama']}}</td>
                          <td>{{ $at->kategori ? $at->kategori->nama : 'Kategori tidak ditemukan' }}</td>
                          <td>{{$at['status']}}</td>
                          <td>{{$at['lokasi']}}</td>
                          <td>{{$at['kondisi']}}</td>
                          <td>
                            <a href="{{route('aset.edit',$at['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{route('aset.delete',$at['id'])}}" method="POST" class="d-inline">
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