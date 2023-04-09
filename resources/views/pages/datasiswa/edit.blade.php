@extends('templateadmin.layoutadmin')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <a href="/siswa" class="btn btn-outline-warning btn-md"><i
                            class="bi bi-arrow-left-circle"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="/siswa/{{ Crypt::encrypt($dataSiswa->id) }}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row my-3">
                            <label for="inputText" class="col-sm-3 col-form-label">NIS</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nis" id="nis" value="{{ old('nis', $dataSiswa->nis) }}">
                                @error('nis')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="inputText" class="col-sm-3 col-form-label">NISN</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="nisn" id="nisn" value="{{ old('nisn',$dataSiswa->nisn) }}">
                                @error('nisn')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Nama Siswa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="namasiswa" id="namasiswa" value="{{ old('namasiswa', $dataSiswa->namasiswa) }}">
                                @error('namasiswa')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-6">
                                <select name="kelasid" id="kelasid" class="form-select">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($dataKelas as $kelas)
                                        <option value="{{ $kelas->id }}" {{ $dataSiswa->kelasid == $kelas->id ? 'selected' : '' }}>{{ $kelas->namakelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelasid')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="inputText" class="col-sm-3 col-form-label">Status Lulus</label>
                            <div class="col-sm-6">
                                <select name="statuslulus" id="statuslulus" class="form-select">
                                    <option value="">-- Pilih Kelulusan --</option>
                                    <option value="LULUS" {{ $dataSiswa->statuslulus == 'LULUS' ? 'selected' : '' }}>Lulus</option>
                                    <option value="TIDAK LULUS" {{ $dataSiswa->statuslulus == 'TIDAK LULUS' ? 'selected' : '' }}>Tidak Lulus</option>
                                </select>
                                @error('statuslulus')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="inputNumber" class="col-sm-3 col-form-label">Surat Lulus</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="file" id="suratlulus" name="suratlulus">
                                @error('suratlulus')
                                    <small class="text-danger"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-outline-primary w-100"><i class="bi bi-server"></i>
                                    Simpan </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
