@extends('layouts.app.master')

@section('title', 'Prodi')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah Prodi</h5>
                    </div>
                    <div class="card-body">
                      <form id="prodiForm" action="{{ route('prodis.update', $prodi->id_prodi) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @error('name_prodi')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Program Studi</label>
                          <input type="text" class="form-control" id="name_prodi" name="name_prodi" placeholder="Isikan Program Studi" value="{{ $prodi->name_prodi }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                  </div>

            <!-- / Content -->
@endsection
