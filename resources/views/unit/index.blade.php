@extends('layouts.app.master')

@section('title', 'Unit')
    
@section('content')
        <!-- Striped Rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Unit</h5>
            <a href="{{ route('units.create') }}" class="btn btn-primary rounded-pill">+ Tambah Unit</a>
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
                  <th>Satuan</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php 
                  $i = 1; 
                @endphp
                @foreach ($units as $unit)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $unit->name_unit }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('units.edit', $unit->id_unit) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <form action="{{ route('units.destroy', $unit->id_unit) }}" method="POST" onsubmit="return confirm('Hapus unit ini?');">
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
