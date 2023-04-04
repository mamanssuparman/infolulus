@extends('templateadmin.layoutadmin')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <a href="data" class="btn btn-outline-primary btn-md"><i class="bi bi-plus-circle"></i> Tambah Data
                            Siswa</a>
                    </div>
                    <div class="card-body">
                        <table class="table datatable">
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
                                <tr>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
