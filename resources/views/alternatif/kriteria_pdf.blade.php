<!DOCTYPE html>
<html>

<head>
    <title>Master Data Alternatif</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Master Data Alternatif</h4>
    </center>
    <hr>

    <table class='table table-bordered'>
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th>
                <!-- <th>No KK</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>RT/RT</th> -->
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($data as $p)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                <td>{{$p->kode_alternatif}}</td>
                <td>{{ ucfirst($p->nama_alternatif) }}</td>
                <!-- <td>{{ $p->no_kk }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->rt == null ? '000' : $p->rt }} / {{ $p->rw == null ? '000' : $p->rw }}</td> -->
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
