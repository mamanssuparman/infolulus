@extends('templateadmin.layoutadmin')
@section('content')
    <section class="section">
        <div class="row">
            @csrf
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <a href="/siswa/Add" class="btn btn-outline-primary btn-md"><i class="bi bi-plus-circle"></i> Tambah Data
                            Siswa</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Status Kelulusan</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>123456</td>
                                        <td>Maman Suparman</td>
                                        <td>XII RPL 1</td>
                                        <td>Lulus</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm"><i
                                                    class="bi bi-card-checklist"></i></button>
                                            <button type="button" class="btn btn-outline-danger btn-sm"><i
                                                    class="bi bi-trash2"></i></button>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Modal Hapus Siswa --}}
    <div class="modal fade" id="modalHapus" tabindex="-1">
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
@endsection
@push('addon-js')
<script type="text/javascript">
    let data = [{id:""}]
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
                url: "{{ url('') }}/getDataSiswa",
                type: "POST",
                data:function(res){
                    console.log(res)
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
                        return row.nisn
                    }
                },
                {
                    "targets": 2, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return row.namasiswa
                    }
                },
                {
                    "targets": 3, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return row.kelas.namakelas
                    }
                },
                {
                    "targets": 4, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        return row.statuslulus
                    }
                },
                {
                    "targets": 5, //Untuk urutan data di dalam kolom
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta) {
                        const encoded= btoa(row.id)
                        return `
                            <a class="btn btn-outline-primary btn-sm" href="{{ url('/siswa/edit/${encoded}') }}"><i class="bi bi-card-checklist"></i></a>
                            <button type="button" class="btn btn-outline-danger btn-sm" onclick="hapus(this,${row.id})"><i class="bi bi-trash2"></i></button>
                        `
                    }
                }
            ]
        })
        function hapus(txt,id){
            data=[];
            data.push({id:id})
            console.log(data)
            $('#modalHapus').modal('show')
        }
        function yaHapus(){
            $.ajax({
                url: '{{ url('') }}/siswa/Hapus',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: $('input[name="_token"]').val(),
                    dataId: data[0].id
                },
                success: function(res){
                    console.log(res)
                    $('#modalHapus').modal('hide')
                    table.ajax.reload(null, false)
                }
            })
        }
</script>
@endpush
