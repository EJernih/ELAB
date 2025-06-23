@extends('layouts.app.master')

@section('title', 'Request')
    
@section('content')
              <!-- Basic Layout -->

                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Tambah Lab</h5>
                    </div>
                    <div class="card-body">
                      <form id="bhpRequestForm" action="{{ route('bhpRequests.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @error('semester')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <select class="form-select" id="semester" name="semester" aria-label="Default select example">
                          <option value="">Pilih Semester</option>
                          <option value="1">Ganjil</option>
                          <option value="2">Genap</option>
                        </select>
                      </div>

                        @error('academic_year')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Tahun Ajaran</label>
                          <input type="text" class="form-control" id="academic_year" name="academic_year" placeholder="Isikan Tahun Ajaran" />
                        </div>

                        @error('request_date')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3 row">
                        <label for="request_date" class="form-label">Tangal Pengajuan</label>
                        <div class="col-md-12">
                          <input class="form-control" type="date" name="request_date" id="request_date" />
                        </div>
                      </div> 

                        @error('id_user')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <p>Diajukan oleh: <strong>{{ auth()->user()->name }}</strong></p>
                        </div>


                        @error('id_lab')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                      <div class="mb-3">
                        <label for="id_lab" class="form-label">Laboratorium</label>
                        <select class="form-select" id="id_lab" name="id_lab">
                          <option value="">Open this select menu</option>
                            @foreach ($labs as $lab)
                                <option value="{{ $lab->id_lab }}">{{ $lab->name_lab }}</option>
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
