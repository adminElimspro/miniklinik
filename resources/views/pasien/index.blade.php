@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Pasien</h4>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary btn-sm">+ Tambah Pasien</a>
</div>

@if(session('ok'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('ok') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>No. RM</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>JK</th>
                    <th>No. HP</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pasien as $p)
                <tr>
                    <td><span class="badge bg-secondary">{{ $p->no_rm }}</span></td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->tgl_lahir ? \Carbon\Carbon::parse($p->tgl_lahir)->format('d/m/Y') : '-' }}</td>
                    <td>
                        @if($p->jenis_kelamin === 'L')
                            <span class="badge bg-info text-dark">Laki-laki</span>
                        @elseif($p->jenis_kelamin === 'P')
                            <span class="badge bg-pink" style="background:#e91e8c;color:#fff">Perempuan</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $p->no_hp ?? '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('pasien.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pasien.destroy', $p) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus pasien ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data pasien.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $pasien->links() }}
</div>
@endsection
