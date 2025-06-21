@extends('layouts.app.master')

@section('title', 'BHP')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah BHP</h5>
                    </div>
                    <div class="card-body">
                      <form id="bhpForm" action="{{ route('bhps.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @error('name_bhp')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama BHP</label>
                          <input type="text" class="form-control" id="name_bhp" name="name_bhp" placeholder="Isikan Nama BHP" />
                        </div>

                        @error('description')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div>
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                      </div>

                        @error('minimum_stock')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Minimal Stok</label>
                          <input type="text" class="form-control" id="minimum_stock" name="minimum_stock" placeholder="Isikan Satuan" />
                        </div>

                        @error('id_unit')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="id_unit" class="form-label">Satuan</label>
                        <select class="form-select" id="id_unit" name="id_unit">
                          <option value="">Open this select menu</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id_unit }}">{{ $unit->name_unit }}</option>
                            @endforeach
                        </select>
                      </div>

    
                        <button type="submit" class="btn btn-primary">Tambah</button>
<a href="{{ route('units.index') }}" class="btn btn-secondary">Kembali</a>

                      </form>
                    </div>
                  </div>

            <!-- / Content -->
@endsection
