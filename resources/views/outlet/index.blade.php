@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row ">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rumah Sakit</h3>
                <button class="btn-primary btn-sm" onclick="New_outlet();">Tambah</button>
                <button class="btn-primary btn-sm" onclick="refresh_table();">Refresh</button>
            </div>
            <div class="card-body">
                @include('outlet.form')
            </div>

           

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tbl_outlet">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat </th>
                                <th>Email</th>
                                <th>No Tlp</th>
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
        function clear() {

            $('#form_outlet').hide();
            $('#t_nama').val('');
            $('#t_alamat').val('');
            $('#t_email').val('');
            $('#t_telp').val('');
            $('#t_nama').focus();
            refresh_table();
            console.log("Clear");
        }

        function Cancel() {

            $('#form_outlet').hide();
            $('#t_nama').val('');
            refresh_table();
        }

        function refresh_table() {

            //   var table = $('#tbl_outlet').DataTable();
            var table = new DataTable('#tbl_outlet');
            table.ajax.reload();

        }




        $(document).ready(function () {
            $('#tbl_outlet').DataTable({
                processing: true,
                serverSide: true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,

                ajax: '{!! route('list.outlet') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama',
                        name: 'name'
                    },

                    {
                        data: 'alamat',
                        name: 'created_at'
                    },
                    {
                        data: 'email',
                        name: 'updated_at'
                    },
                    {
                        data: 'telp',
                        name: 'updated_at'
                    },
                    {
                        data: 'id',
                        "render": function (data, type, row) {

                            return ' <button onclick="Edit_outlet(' + data +
                                ');" type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i> Edit </button> &nbsp;  <button onclick="SwallDelete(' +
                                data +
                                ');" type="button" class="btn btn-btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Hapus </button> ';



                        },
                        "targets": 6,
                    },
                ]
            });
        });

        function Edit_outlet(id) {
            clear();
            $('#form_outlet').show();
            $('#btn_update').show();
            $('#btn_save').hide();


            var link = "{{ route('outlet.byid') }}";
            $.ajax({
                type: 'GET',
                url: link,
                data: {
                    'id_outlet': id,
                    _token: "{!! csrf_token() !!}"
                },
                success: function (msg) {
                    $('#t_id').val(msg[0]['id']);
                    $('#t_nama').val(msg[0]['nama']);
                    $('#t_alamat').val(msg[0]['alamat']);
                    $('#t_email').val(msg[0]['email']);
                    $('#t_telp').val(msg[0]['telp']);
                    console.log(msg);

                },
                error: function (xhr, textnilai, errorThrown) {

                }
            });

        }

        function update_outlet() {
            var nama = $('#t_nama').val();
            var alamat = $('#t_alamat').val();
            var email = $('#t_email').val();
            var telp = $('#t_telp').val();
            var id_outlet = $('#t_id').val();
            var link = "{{ route('outlet.update') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    nama: nama,
                    alamat: alamat,
                    email: email,
                    telp: telp,
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

        function New_outlet() {
            clear();

            $('#form_outlet').show();
            $('#btn_update').hide();
            $('#btn_save').show();


        }


        function Simpan_outlet() {
            var nama = $('#t_nama').val();
            var alamat = $('#t_alamat').val();
            var email = $('#t_email').val();
            var telp = $('#t_telp').val();
            var link = "{{ route('outlet.store') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    nama: nama,
                    alamat: alamat,
                    email: email,
                    telp: telp,
                    _token: "{!! csrf_token() !!}"
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

        function SwallDelete(id_outlet) {

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
                    Delete_outlet(id_outlet)
                    refresh_table();
                }
            });

        }

        function Delete_outlet(id_outlet) {

            var link = "{{ route('outlet.delete') }}";
            $.ajax({
                type: 'POST',
                url: link,
                data: {
                    'id_outlet': id_outlet,
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
            $('#form_outlet').hide();
        });
    </script>
@endpush