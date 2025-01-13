@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pasien</h3>
                <button class="btn-primary btn-sm" onclick="New_pasien();">Tambah</button>
                <button class="btn-primary btn-sm" onclick="refresh_table();">Refresh</button>
            </div>
            <div class="card-body">
                @include('pasien.form')
            </div>


            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tbl_pasien">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat </th>
                            <th>Email</th>
                            <th>Rumah Sakit</th>
                            <th width="15%">Options</th>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>

    </div><!-- /.container-fluid -->
</div>
</div>
@endsection

@push('script')

    <script>
        function getRs() {
            url = '/outlet/all';
            $.ajax({
                url: url,
                success: function (data) {
                    $('#t_id_outlet').empty();
                    $('#t_id_outlet').append($('<option />')
                        .text('Pilih RS')
                        .val(0)
                    );
                    console.log(data);
                    for (i = 0; i < data.length; i++) {
                        $('#t_id_outlet').append(
                            $('<option />')
                            .text(data[i]['nama'])
                            .val(data[i]['id'])

                        );
                    }
                },
                dataType: 'json'
            });
        }

        function clear() {

            $('#form_pasien').hide();
            $('#t_nama').val('');
            $('#t_alamat').val('');
            $('#t_telp').val('');
            $('#t_nama').focus();
            refresh_table();
            getRs();
            console.log("Clear");
        }

        function Cancel() {

            $('#form_pasien').hide();
            $('#t_nama').val('');
            refresh_table();
        }

        function refresh_table() {

            //   var table = $('#tbl_pasien').DataTable();
            var table = new DataTable('#tbl_pasien');
            table.ajax.reload();

        }




        $(document).ready(function () {
            $('#tbl_pasien').DataTable({
                processing: true,
                serverSide: true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,

                ajax: "{!! route('list.pasien') !!}",
                columns: [{
                        data: 'id_pasien',
                        name: 'id'
                    },
                    {
                        data: 'nama',
                        name: 'name'
                    },

                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'nama_rs',
                        name: 'nama_rs'
                    },
                    {
                        data: 'id_pasien',
                        "render": function (data, type, row) {

                            return ' <button onclick="Edit_pasien(' + data +
                                ');" type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i> Edit </button> &nbsp;  <button onclick="SwallDelete(' +
                                data +
                                ');" type="button" class="btn btn-btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Hapus </button> ';



                        },
                        "targets": 6,
                    },
                ]
            });
        });

        function Edit_pasien(id) {
            clear();
            $('#form_pasien').show();
            $('#btn_update').show();
            $('#btn_save').hide();


            var link = "{{ route('pasien.byid') }}";
            $.ajax({
                type: 'GET',
                url: link,
                data: {
                    'id_pasien': id,
                    _token: "{!! csrf_token() !!}"
                },
                success: function (msg) {

                    $('#t_id').val(msg[0]['id_pasien']);
                    $('#t_nama').val(msg[0]['nama']);
                    $('#t_alamat').val(msg[0]['alamat']);
                    //   $('#t_id_outlet').text(msg[0]['nama_rs']);
                    $('#t_id_outlet').val(msg[0]['id_outlet']);
                    $('#t_telp').val(msg[0]['telp']);
                    console.log(msg);

                },
                error: function (xhr, textnilai, errorThrown) {

                }
            });

        }

        function add_pasien() {
            var id_outlet = $('#t_id_outlet').val();
            var nama = $('#t_nama').val();
            var alamat = $('#t_alamat').val();
            var telp = $('#t_telp').val();
            var id_pasien = $('#t_id').val();
            var link = "{{ route('pasien.store') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    nama: nama,
                    alamat: alamat,
                    telp: telp,
                    'id_pasien': id_pasien,
                    'id_outlet': id_outlet,
                    _token: "{!! csrf_token() !!}"
                },
                success: function (msg) {
                    //      alert(msg);
                    swall_sukses('Tambah !', msg);
                    clear();
                },
                error: function (xhr, textnilai, errorThrown) {
                    //  alert('Error : '+errorThrown);
                }
            });

            refresh_table();
        }

        function update_pasien() {
            var id_outlet = $('#t_id_outlet').val();
            var nama = $('#t_nama').val();
            var alamat = $('#t_alamat').val();
            var email = $('#t_email').val();
            var telp = $('#t_telp').val();
            var id_pasien = $('#t_id').val();
            var link = "{{ route('pasien.update') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    nama: nama,
                    alamat: alamat,
                    email: email,
                    telp: telp,
                    'id_pasien': id_pasien,
                    'id_outlet': id_outlet,
                    _token: "{!! csrf_token() !!}"
                },
                success: function (msg) {
                    //      alert(msg);
                    swall_sukses('Update !', msg);
                    clear();
                },
                error: function (xhr, textnilai, errorThrown) {
                    //  alert('Error : '+errorThrown);
                }
            });

            refresh_table();
        }

        function New_pasien() {
            clear();

            $('#form_pasien').show();
            $('#btn_update').hide();
            $('#btn_save').show();


        }


        function save_pasien() {
            var nama = $('#t_nama').val();
            var alamat = $('#t_alamat').val();
            var id_outlet = $('#t_id_outlet').val();
            var telp = $('#t_telp').val();
            var link = "{{ route('pasien.store') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    _token: "{!! csrf_token() !!}",
                    'nama': nama,
                    'alamat': alamat,
                    't_id_outlet': t_id_outlet,
                    'telp': telp
                },
                success: function (msg) {
                    //      alert(msg);
                    swall_sukses('Tambah Baru', msg);
                    clear();
                },
                error: function (xhr, textnilai, errorThrown) {

                }
            });

            refresh_table();
        }

        function SwallDelete(id_pasien) {

            Swal.fire({
                title: "Anda yakin ?",
                text: "Anda tidak akan dapat mengembalikannya!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus saja!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Delete_pasien(id_pasien)
                    refresh_table();
                }
            });

        }

        function Delete_pasien(id_pasien) {

            var link = "{{ route('pasien.delete') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    'id_pasien': id_pasien,
                    _token: "{!! csrf_token() !!}"
                },
                success: function (msg) {

                    swall_sukses('Hapus', msg);

                },
                error: function (xhr, textnilai, errorThrown) {

                }
            });

        }

        function swall_sukses(pesan, text) {
            Swal.fire({
                icon: "success",
                title: pesan,
                text: text,
                showConfirmButton: false,
                timer: 1500
            });
        }

        $(window).on("load", function () {
            $('#form_pasien').hide();
            getRs();
        });
    </script>
@endpush