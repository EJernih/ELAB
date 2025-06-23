@extends('layouts.app.master')

@section('title', 'Detail Request')
    
@section('content')

@php
    
@endphp
        <!-- Striped Rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Pengajuan</h5>
            <a href="{{ route('detailRequests.create') }}" class="btn btn-primary rounded-pill">+ Tambah</a>
          </div>
          @if (session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('message') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
          @endif
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pengajuan</th>
                  <th>Nama BHP</th>
                  <th>Jumlah</th>
                  <th>Link Referensi</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php 
                  $i = 1; 
                @endphp

                @foreach ($detailRequests as $detailRequest)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $detailRequest->bhpRequest->user->name }} - {{ $detailRequest->bhpRequest->request_date }}</td>
                  <td>{{ $detailRequest->bhp->name_bhp }} - {{ $detailRequest->bhp->unit->name_unit }}</td>
                  <td>{{ $detailRequest->quantity_requested }}</td>
                  <td>
                    <a href="{{ $detailRequest->referensi }}" target="_blank" rel="noopener noreferrer">{{ Str::limit($detailRequest->referensi, 30) }}</a>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('detailRequests.edit', $detailRequest->id_detail_request) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <form action="{{ route('detailRequests.destroy', $detailRequest->id_detail_request) }}" method="POST" onsubmit="return confirm('Hapus request ini?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="dropdown-item text-danger">
                            <i class="bx bx-trash me-1"></i> Delete
                          </button>
                        </form>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        <!--/ Striped Rows -->
@endsection
