@extends('templateadmin.layoutadmin')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table datatable table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Kelas</th>
                                            <th>Jumlah Siswa</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>XII RPL 1</td>
                                            <td>33 siswa</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm"><i
                                                        class="bi bi-card-checklist"></i></button>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    onclick="hapus()"><i class="bi bi-trash2"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mt-3">Tambah Data Kelas</h5>
                                <div class="form-group">
                                    <input type="text" name="textKelas" id="textKelas" class="form-control">
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-outline-primary w-100"><i class="bi bi-server"></i> Tambah Data
                                        Kelas</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
