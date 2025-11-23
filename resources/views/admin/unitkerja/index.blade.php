@extends ('template.layouts')
@section ('title', 'unitkerja')
@section ('konten')

<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Unit Kerja</h4>

                    <form action="{{ route('unitkerja.store') }}" method="POST">
                      @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Unit Kerja">
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
                            @foreach ($unitkerja as $j)
                          <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$j['nama']}}</td>
                          <td>
                            <a href="{{route('unitkerja.edit',$j['id'])}}" class="btn btn-warning btn-sm">Edit</a>
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