@extends('layouts.app.master')

@section('title', 'Detail Request')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah Lab</h5>
                    </div>
                    <div class="card-body">
                      <form id="detailRequestForm" action="{{ route('detailRequests.update', $detailRequest->id_detail_request) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @error('id_request')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="id_request" class="form-label">Pengajuan</label>
                        <select class="form-select" id="id_request" name="id_request">
                          <option value="">Open this select menu</option>
                            @foreach ($bhpRequests as $bhpRequest)
                                <option value="{{ $bhpRequest->id_request }}" {{ old('id_request', $detailRequest->id_request) == $bhpRequest->id_request?'selected' : '' }}>{{ $bhpRequest->user->name }} - {{ $bhpRequest->request_date }}</option>
                            @endforeach
                        </select>
                      </div>
                      
                        @error('id_bhp')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="id_bhp" class="form-label">BHP Yang Diajukan</label>
                        <select class="form-select" id="id_bhp" name="id_bhp">
                          <option value="">Open this select menu</option>
                            @foreach ($bhps as $bhp)
                                <option value="{{ $bhp->id_bhp }}" {{ old('id_bhp', $detailRequest->id_bhp) == $bhp->id_bhp?'selected' : '' }}>{{ $bhp->name_bhp }} - {{ $bhp->unit->name_unit }}</option>
                            @endforeach
                        </select>
                      </div>
                      
                        @error('quantity_requested')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Jumlah</label>
                          <input type="number" class="form-control" id="quantity_requested" name="quantity_requested" value="{{ old('quantity_requested', $detailRequest->quantity_requested) }}" />
                        </div>
                        
                        @error('referensi')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Link Referensi</label>
                          <input type="text" class="form-control" id="referensi" name="referensi" value="{{ old('referensi', $detailRequest->referensi) }}" />
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
<a href="{{ route('labs.index') }}" class="btn btn-secondary">Kembali</a>

                      </form>
                    </div>
                  </div>

            <!-- / Content -->
@endsection
