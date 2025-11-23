
<!DOCTYPE html>
<html>
<head>
    <title>Data Aset</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h3>Data Aset</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($asets as $index => $aset)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $aset->nama }}</td>
                <td>{{ $aset->kategori ? $aset->kategori->nama : '-' }}</td>
                <td>{{ $aset->status }}</td>
                <td>{{ $aset->lokasi }}</td>
                <td>{{ $aset->kondisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
