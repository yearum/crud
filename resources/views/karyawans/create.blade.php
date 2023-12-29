<!-- resources/views/karyawans/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Tambah Karyawan</h2>

    <form action="{{ route('karyawans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Karyawan:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Karyawan:</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <hr>

    <h2>Hapus Karyawan</h2>
    <form action="{{ route('karyawans.destroy', 1) }}" method="POST" id="deleteForm">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label for="karyawan_id">Pilih Karyawan:</label>
            <select name="karyawan_id" id="karyawan_id" class="form-control">
                @foreach ($karyawanData as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
@endsection

@section('scripts')
    <script>
        // Handle submit form penghapusan
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const confirmDelete = confirm('Anda yakin ingin menghapus karyawan ini?');
            if (confirmDelete) {
                this.submit();
            }
        });
    </script>
@endsection
