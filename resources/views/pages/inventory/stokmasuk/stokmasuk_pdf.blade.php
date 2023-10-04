<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Stok Masuk</h4>
	</center>
	
	<table class='table table-bordered'>
		<thead>
			<tr>
        <th class="cell">No.</th>
				<th class="cell">Staff</th>
				<th class="cell">Tanggal</th>
				<th class="cell">Catatan</th>
				<th class="cell">Harga</th>
				<th class="cell">Diterima Oleh</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($cetakPertanggal as $p)
            <tr>
                <td class="cell">{{ $i++ }}</td>
                <td class="cell">{{$p->nama_staff}}</td>
								<td class="cell">{{ date('d M Y', strtotime($p->tgl_masuk)) }}</td>
                <td class="cell">{{$p->catatan}}</td>
								<td class="cell">Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                <td class="cell">{{$p->penerima}}</td>
            </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>










