<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Warga RW 02 Tlogomas</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}"/>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        button{
            background-color: #0d6efd;
            border: none;
            color: white;
            padding: 10px 35px 10px 35px;
            border-radius: 8px;
        }

        .button-back{
            background-color: #6c757d;
            border: none;
            color: white;
            padding: 10px 35px 10px 35px;
            border-radius: 8px;
        }

        .button-back:hover{
            color: white;
        }
    </style>

</head>
<body>
    
    <main>
        <div class="container mt-4">
            <a href="/data-rt" class="button-back">Kembali</a>
        </div>
        <div class="container mt-3">
           
            <table id="datatablesSimple" class="display mt-4" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Nomor KK</th>
                        <th>Alamat</th>
                        <th>Rukun Tetangga</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Perkawinan</th>
                        <th>Pekerjaan</th>
                        <th>Kewarganegaraan</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataset as $data)  
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->number_of_kk }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->neighbourhood->neighbourhood_name }}</td>
                        <td>{{ $data->religion->religion_name }}</td>
                        <td>{{ $data->gender->gender_name }}</td>
                        <td>{{ $data->place_of_birth }}</td>
                        <td>{{ $data->date_of_birth }}</td>
                        <td>{{ $data->status->status_name }}</td>
                        <td>{{ $data->proffesion }}</td>
                        <td>{{ $data->state->state_name }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>
    $(document).ready(function() {
    var table = $('#datatablesSimple').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    } );
    table.buttons().container()
        .appendTo( '#datatablesSimple .col-md-6:eq(0)' );
</script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
</html>