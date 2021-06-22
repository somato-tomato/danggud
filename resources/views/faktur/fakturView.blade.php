<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>INVOICE</title>
    <style>
        @page { size: landscape;

			margin: 0px 0px 0px 0px; }

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

            border:1px solid #000000;
            text-align: center;
            font-family: courier;
        }
		td{
			font-family: courier;
			font-weight: bold;

		}

        .table td {

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
        p{
            font-family: courier;
        }

    </style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <h1>INVOICE</h1>
		<table>
			<tr>
				<td style="width: 50%">ABIDAKY SUPPLIER</td>
				<td>FAKTUR NO</td>
				<td>: {{ $data->invoice }}</td>
			</tr>
			<tr>
				<td>Jl. Menado No.12</td>
				<td>TANGGAL</td>
				<td>: {{ $data->tanggal }}</td>
			</tr>
			<tr>
				<td>Hp. 0812 8459 8219</td>
				<td>ID. PELANGGAN</td>
				<td>: {{ $data->namaOutlet }}</td>
			</tr>
		</table>
        <table >
            <thead>
                <tr>
                    <th style="width: 30px">NO</th>
                    <th style="width: 200px;text-align: center;font-family: courier;">ITEM BARANG</th>
                    <th  style="width: 50px;text-align: center;font-family: courier;" colspan="2">QTY</th>
                    <th  style="width: 100px;text-align: center;font-family: courier;">HARGA</th>
                    <th  style="width: 100px;text-align: center;font-family: courier;">JUMLAH</th>
                </tr>
            </thead>
            <?php $no = 0;?>
            @foreach ($databarang as $V)
                <?php $no++ ;?>
            <tbody>
        <tr>
            	<td>{{ $no }}</td>
						<td>{{ $V->namaBarang }}</td>
						<td style="width: 50px;text-align: right; font-weight: bold;">{{ $V->qty }}</td>
						<td style="width: 50px;text-align: center; font-weight: bold;">{{ $V->satuan }}</td>
						<td style="text-align: center; font-weight: bold;">{{ 	number_format($V->hargaJual,0, ',' , '.') }}</td>
						<td style="text-align: center; font-weight: bold;">{{ 	number_format($V->jumlah_harga,0, ',' , '.') }}</td>
					</tr>
                    @endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td style="text-align: right;"><b>Total</b></td>
						<td style="text-align: center;"><b>{{ 	number_format($data->grandTotal,0, ',' , '.') }}</b></td>
					</tr>
            </tbody>
        </table>
        <p><b>Terbilang : {{ terbilang($data->grandTotal) }} Rupiah</b></p>
        <table border="1">
			<tr>
				<th rowspan="2"><center>Kepala Outlet</center></th>
				<th rowspan="2"><center>Keuangan</center></th>
				<th><center>Hormat Kami,</center></th>
			</tr>
			<tr>
				<th><center>Pengirim</center></th>
			</tr>
			<tr>
				<td style="height: 100px"></td>
				<td></td>
				<td></td>
			</tr>
		</table>
    </section>
</body>
</html>
