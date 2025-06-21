@extends('layouts.app.master')

@section('title', 'BHP')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah BHP</h5>
                    </div>
                    <div class="card-body">
                      <form id="bhpForm" action="{{ route('bhps.update', $bhp->id_bhp) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @error('name_bhp')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Nama BHP</label>
                          <input type="text" class="form-control" id="name_bhp" name="name_bhp" placeholder="Isikan Nama BHP" value="{{ $bhp->name_bhp }}" />
                        </div>
                        
                        @error('description')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div>
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Isikan Deskripsi BHP">{{ old('description', $bhp->description) }}</textarea>
                      </div>

                        @error('minimum_stock')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Minimal Stok</label>
                          <input type="text" class="form-control" id="minimum_stock" name="minimum_stock" placeholder="Isikan Minimum Stol" value="{{ $bhp->minimum_stock }}" />
                        </div>

                        @error('id_unit')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="id_unit" class="form-label">Satuan</label>
                        <select class="form-select" id="id_unit" name="id_unit">
                          <option value="">Open this select menu</option>
                @if ($units->isEmpty())
                    <option value="">Tidak ada satuan yang tersedia</option>
                @else
                    @foreach ($units as $unit)
					    <option value="{{ $unit->id_unit }}"
                            {{ $bhp->id_unit == $unit->id_unit?'selected' : '' }}>
                            {{ $unit->name_unit }}
                        </option>
                    @endforeach
                @endif
                        </select>
                      </div>

    
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                  </div>

            <!-- / Content -->
@endsection
