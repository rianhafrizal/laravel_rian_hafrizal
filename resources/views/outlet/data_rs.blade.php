@extends('layouts.app')

@section('content')
@include('outlet.form')
<div class="container">
    <div class="row ">
        
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Outlet</h3>
        <button class="btn-primary btn-sm" onclick="New_outlet();">Tambah</button>
        <button class="btn-primary btn-sm" onclick="refresh_table();">Refresh</button>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tbl_outlet">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat </th>
                        <th>Email</th>
                        <th>No Tlp</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>

        </div>

    </div>
</div>
</div><!-- /.container-fluid -->
    </div>
</div>
@endsection

@push('script')

<script>

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

        ajax: '{!! route('list.outlet') !!}', // memanggil route yang menampilkan data json
        columns: [{ // mengambil & menampilkan kolom sesuai tabel database
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
              "render" : function(data,type,row){
                
                  return ' <button onclick="Edit_outlet('+data+');"  type="button" class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i> Edit </button>  <button onclick="SwallDelete('+data+');" type="button" class="btn btn-btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i> Hapus </button> ';
               
            
                
             },
                "targets" : 6,
              },
        ]
    });
});

function Edit_outlet(id){
        jQuery.noConflict();
                $('#modal-form-outlet').modal('show');
                $('#modal-outlet-btn-update').show();
                $('#modal-outlet-btn-save').hide();
                $('#modal-form-outlet').modal('show');
                $('#modal-outlet-judul').text('Edit Data');

        var link = "{{ route('outlet.byid') }}";
        $.ajax({
            type: 'GET',
            url: link,
            data: {
                'id_outlet': id,
                _token: "{!! csrf_token() !!}"
            },
            success: function (msg) {
                $('#t_id').val(msg[0]['id_outlet']);
                $('#t_nama').val(msg[0]['nama_outlet']);
             console.log(msg);

            },
            error: function (xhr, textnilai, errorThrown) {
                //  alert('Error : '+errorThrown);
            }
        });

    }


    function New_outlet() {
        clear();
        jQuery.noConflict();
        $('#modal-outlet-btn-update').hide();
        $('#modal-outlet-btn-save').show();
        $('#modal-form-outlet').modal('show');
        $('#modal-outlet-judul').text('Tambah Baru');
        $('#modal-outlet-btn').text('Simpan');

    }


    function Simpan_outlet() {
        var nama = $('#t_nama').val();
        var link = "{{ route('outlet.store') }}";
        $.ajax({
            type: 'POST',
            url: link,
            data: {
                nama: nama,
                _token: "{!! csrf_token() !!}"
            },
            success: function (msg) {
          //      alert(msg);
                 swall_sukses('Tambah Baru',msg);
                clear();
            },
            error: function (xhr, textnilai, errorThrown) {
                //  alert('Error : '+errorThrown);
            }
        });

        refresh_table();
    }

    function SwallDelete(id_outlet){

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

    function Delete_outlet(id_outlet){
        
                var link = "{{ route('outlet.delete') }}";
                $.ajax({
                    type: 'POST',
                    url: link,
                    data: {
                        'id_outlet': id_outlet,
                        _token: "{!! csrf_token() !!}"
                    },
                    success: function (msg) {
                //      alert(msg);
                        swall_sukses('Hapus',msg);
                     
                    },
                    error: function (xhr, textnilai, errorThrown) {
                        //  alert('Error : '+errorThrown);
                    }
                });

    }
</script>
@endpush
