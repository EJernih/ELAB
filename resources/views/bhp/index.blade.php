@extends('layouts.app.master')

@section('title', 'BHP')
    
@section('content')
        <!-- Striped Rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar BHP</h5>
            <a href="{{ route('bhps.create') }}" class="btn btn-primary rounded-pill">+ Tambah BHP</a>
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
                  <th>Nama BHP</th>
                  <th>Deskripsi</th>
                  <th>Stok Minimum</th>
                  <th>Satuan</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php 
                  $i = 1; 
                @endphp
                @foreach ($bhps as $bhp)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $bhp->name_bhp }}</td>
                  <td>{{ $bhp->description }}</td>
                  <td>{{ $bhp->minimum_stock }}</td>
                  <td>{{ $bhp->unit->name_unit }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('bhps.edit', $bhp->id_bhp) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <form action="{{ route('bhps.destroy', $bhp->id_bhp) }}" method="POST" onsubmit="return confirm('Hapus bhp ini?');">
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
