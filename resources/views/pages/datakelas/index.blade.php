@extends('templateadmin.layoutadmin')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <button onclick="showModalImport()" class="btn btn-outline-success btn-md"><i class="bi bi-download"></i> Import Data Kelas</button>
                        <a href="{{ url('') }}/kelas/export" class="btn btn-outline-success btn-md"><i class="bi bi-upload"></i> Export data Kelas</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 table-responsive">
                                <table id="example5" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                @csrf
                                <h5 class="mt-3">Tambah Data Kelas</h5>
                                <div class="form-group">
                                    <input type="text" name="textKelas" id="textKelas" class="form-control">
                                    <div id="text-information"></div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-outline-primary w-100" id="btn-confirm"><div id="text-button-information">Tambah Data Kelas</div> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Modal Hapus Data --}}
    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="bi bi-exclamation-triangle"></i> Informasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah anda yakin akan menghapus data tersebut.?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Close</button>
              <button type="button" class="btn btn-primary" onclick="yaHapus()"><i class="bi bi-check2-circle"></i> Ya</button>
            </div>
          </div>
        </div>
    </div>
    {{-- Modal Import Kelas --}}
    <div class="modal fade" id="modalImport" tabindex="-1">
        <form action="/kelas/import-data" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-exclamation-triangle"></i> Import Data Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <label for="">Import data Kelas</label>
                    <input type="file" name="importexcel" id="importexcel" class="form-control" required>
                    <hr>
                    <small class="text-danger">Import data Kelas sesuai dengan format yang sudah di tentukan</small>
                    <hr>
                    <a href="{{ asset('format-import-kelas.xlsx') }}" class="btn btn-outline-primary btn-xs"><i class="bi bi-download"></i> Download format di sini.!</a>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Close</button>
                <button type="submit" class="btn btn-primary" ><i class="bi bi-check2-circle"></i> Ya Import</button>
                </div>
            </div>
            </div>
        </form>
    </div>
@endsection
@push('addon-js')
<script stype="text/javascript">
    let confirmButton = [{add:"Yes", id:"",namakelas:""}]
    let iHapus = [{id:""}]
    console.log(confirmButton)
    // let filterStatus = $('#selectFilterStatus').val()
        const table = $('#example5').DataTable({
            "pageLength": 10,
            "length0Menu": [
                [1, 25, 50, 100],
                [01, 25, 50, 100]
            ],
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing": true,
            "bServerSide": true,
            ajax: {
                url: "{{ url('') }}/getDataKelas",
                type: "POST",
                data:function(res){
                    // console.log(res)
                }
            },
            columnDefs: [{
                    targets: "_all",
                    visible: true,
                },
                {
                    "targets": 0, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return meta.row + 1
                    }
                },
                {
                    "targets": 1, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return row.namakelas
                    }
                },
                {
                    "targets": 2, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return row.siswa_count
                    }
                },
                {
                    "targets": 3, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return `
                            <button class="btn btn-outline-primary btn-sm" onclick="ubahKelas(this,${row.id},'${row.namakelas}')"><i class="bi bi-card-checklist"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapusData(${row.id})"><i class="bi bi-trash2"></i></button>
                        `
                    }
                }
            ]
        })
        function addKelas(){
            $.ajax({
                url: '{{ url('') }}/kelas/AddKelas',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: $('input[name="_token"]').val(),
                    namakelas: $('#textKelas').val()
                },
                success:function(res){
                    if(res.jsonData.statuscode == 500){
                        console.log(res)
                        $('#text-information').html('<small class="text-danger">'+res.jsonData.data.namakelas[0]+'</small>')
                    }else{
                        defaultFunction()
                    }
                }
            })
        }
        function hapusData(id){
            iHapus=[]
            iHapus.push({id: id})
            $('#verticalycentered').modal('show')
        }
        function yaHapus(){
            $.ajax({
                url: '{{ url('') }}/kelas/Hapus',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: $('input[name="_token"]').val(),
                    id: iHapus[0].id
                },
                success: function(res){
                    $('#verticalycentered').modal('hide')
                    defaultFunction()
                }
            })
        }
        function ubahDatakelas(){
            $.ajax({
                url: '{{ url('') }}/kelas/Ubah',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: $('input[name="_token"]').val(),
                    id: confirmButton[0].id,
                    namakelas: confirmButton[0].namakelas,
                    namaKelas: $('#textKelas').val()
                },
                success: function(res){
                    defaultFunction()
                }
            })
        }
        function ubahKelas(txt,id,namakelas){
            console.log(confirmButton)
            confirmButton=[]
            confirmButton.push({add: "No", id:id, namakelas:namakelas})
            $('#textKelas').val(namakelas)
            $('#text-button-information').html('Ubah Data Kelas')
        }
        $('#btn-confirm').on('click', function(){
            if(confirmButton[0].add == "Yes"){
                addKelas()
            }
            if(confirmButton[0].add == 'No'){
                ubahDatakelas()
            }
        })
        function defaultFunction(){
            confirmButton = [{add:"Yes", id:"",namakelas:""}]
            iHapus = [{id:""}]
            $('#text-button-information').html('Tambah Data Kelas')
            $('#textKelas').val('')
            table.ajax.reload(null, false)
        }
        function showModalImport(){
            $('#modalImport').modal('show')
        }
</script>
@endpush
