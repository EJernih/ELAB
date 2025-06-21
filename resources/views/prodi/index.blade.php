@extends('layouts.app.master')

@section('title', 'Prodi')
    
@section('content')
        <!-- Striped Rows -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Prodi</h5>
            <a href="{{ route('prodis.create') }}" class="btn btn-primary rounded-pill">+ Tambah Prodi</a>
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
                  <th>Program Studi</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php 
                  $i = 1; 
                @endphp
                @foreach ($prodis as $prodi)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $prodi->name_prodi }}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('prodis.edit', $prodi->id_prodi) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <form action="{{ route('prodis.destroy', $prodi->id_prodi) }}" method="POST" onsubmit="return confirm('Hapus prodi ini?');">
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
