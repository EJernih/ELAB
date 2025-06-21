@extends('layouts.app.master')

@section('title', 'Lab')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah Lab</h5>
                    </div>
                    <div class="card-body">
                      <form id="labForm" action="{{ route('labs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @error('name_lab')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama lab</label>
                          <input type="text" class="form-control" id="name_lab" name="name_lab" placeholder="Isikan Nama lab" />
                        </div>

                        @error('id_prodi')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="id_prodi" class="form-label">Prodi</label>
                        <select class="form-select" id="id_prodi" name="id_prodi">
                          <option value="">Open this select menu</option>
                            @foreach ($prodis as $prodi)
                                <option value="{{ $prodi->id_prodi }}">{{ $prodi->name_prodi }}</option>
                            @endforeach
                        </select>
                      </div>

    
                        <button type="submit" class="btn btn-primary">Tambah</button>
<a href="{{ route('labs.index') }}" class="btn btn-secondary">Kembali</a>

                      </form>
                    </div>
                  </div>

            <!-- / Content -->
@endsection
