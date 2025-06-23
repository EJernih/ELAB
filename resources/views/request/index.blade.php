@extends('layouts.app.master')

@section('title', 'Request')
    
@section('content')
        <!-- Striped Rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Pengajuan</h5>
            <a href="{{ route('bhpRequests.create') }}" class="btn btn-primary rounded-pill">+ Tambah</a>
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
                  <th>Semester</th>
                  <th>Tahun Ajaran</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Diajukan Oleh</th>
                  <th>Laboratorium</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php 
                  $i = 1; 
                @endphp

                @php
                    $badgeClasses = [
                      'pending' => 'bg-label-dark',
                      'approved_by_kalab' => 'bg-label-warning',
                      'approved_by_kajur' => 'bg-label-warning',
                      'approved' => 'bg-label-success', 
                      'on_process' => 'bg-label-info',
                      'done' => 'bg-label-primary',
                      'rejected' => 'bg-label-danger',
                    ];
                @endphp

                @foreach ($bhpRequests as $bhpRequest)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $bhpRequest->semester == 1? 'Ganjil' : 'Genap' }}</td>
                  <td>{{ $bhpRequest->academic_year }}</td>
                  <td>{{ $bhpRequest->request_date }}</td>
                  <td>{{ $bhpRequest->user->name }}</td>
                  <td>{{ $bhpRequest->lab->name_lab }}</td>
                  <td>
                      <span class="badge {{ $badgeClasses[$bhpRequest->status] ?? 'bg-label-secondary' }} me-1">
                          {{ ucfirst($bhpRequest->status) }}
                      </span>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('bhpRequests.edit', $bhpRequest->id_request) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <form action="{{ route('bhpRequests.destroy', $bhpRequest->id_request) }}" method="POST" onsubmit="return confirm('Hapus request ini?');">
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
