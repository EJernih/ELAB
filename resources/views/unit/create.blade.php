@extends('layouts.app.master')

@section('title', 'Unit')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah Satuan</h5>
                    </div>
                    <div class="card-body">
                      <form id="unitForm" action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @error('name_unit')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Satuan</label>
                          <input type="text" class="form-control" id="name_unit" name="name_unit" placeholder="Isikan Satuan" />
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                  </div>

            <!-- / Content -->
@endsection
