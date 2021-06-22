<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cetak stok all</title>
    <style>
        @page { size: A4 }
      
        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
            font-family: courier;
        }
      
        table {
            border-collapse: collapse;
            width: 100%;
        }
      
        .table th {
            padding: 8px 8px;
            border:1px solid #000000;
            text-align: center;
            font-family: courier;
        }
      
        .table td {
            padding: 3px 3px;
            border:1px solid #000000;
            font-family: courier;
        }
      
        .text-center {
            text-align: center;
            font-family: courier;
        }
        h1{
            font-family: courier;
        }
        
    </style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <h1>STOK BARANG ALL</h1>
  
        <table>
            <thead>
                <tr>
                    <th style="width: 50px">NO</th>
                    <th style="width: 100px;text-align: left;font-family: courier;">Kode Barang</th>
                    <th  style="width: 200px;text-align: left;font-family: courier;">Nama Barang</th>
                    <th  style="width: 50px;text-align: left;font-family: courier;">stok</th>
                    <th  style="width: 50px;text-align: left;font-family: courier;">minStok</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0;?>
                @foreach ($stokall as $V)
                <?php $no++ ;?>
                <tr>
                    <td style="text-align: center;font-family: courier;">{{ $no }}</td>
                    <td style="font-family: courier;"> {{ $V->kodeBarang }}</td>
                    <td style="font-family: courier;">{{ $V->namaBarang }}</td>
                    <td style="font-family: courier;">{{ $V->stok }}</td>
                    <td style="font-family: courier;">{{ $V->minStok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>