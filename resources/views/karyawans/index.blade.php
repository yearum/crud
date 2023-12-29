<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
</head>
<body>
    <h1>Daftar Karyawan</h1>

    <a href="{{ route('karyawans.create') }}">Tambah Karyawan</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->id }}</td>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->alamat }}</td>
                    <td>
                        <a href="{{ route('karyawans.show', $karyawan->id) }}">Detail</a>
                        <a href="{{ route('karyawans.edit', $karyawan->id) }}">Edit</a>
                        <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada karyawan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
