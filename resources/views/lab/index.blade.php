@extends('layouts.app.master')

@section('title', 'Lab')
    
@section('content')
        <!-- Striped Rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Lab</h5>
            <a href="{{ route('labs.create') }}" class="btn btn-primary rounded-pill">+ Tambah Lab</a>
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
                  <th>Nama lab</th>
                  <th>Prodi</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php 
                  $i = 1; 
                @endphp
                @foreach ($labs as $lab)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $lab->name_lab }}</td>
                  <td>{{ $lab->prodi->name_prodi }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('labs.edit', $lab->id_lab) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <form action="{{ route('labs.destroy', $lab->id_lab) }}" method="POST" onsubmit="return confirm('Hapus lab ini?');">
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
