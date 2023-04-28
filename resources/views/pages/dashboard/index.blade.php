@extends('templateadmin.layoutadmin')
@section('content')
<section class="section">
    <div class="row">
      {{-- Card User / Siswa --}}
      <div class="col-xxl-3 col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Jumlah Siswa</h3>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-circle"></i>
                </div>
                <div class="ps-5">
                  <h6 id="jumlahSiswa"></h6> Orang
                </div>
              </div>
          </div>
        </div>
      </div>
      {{-- Card Kelas --}}
      <div class="col-xxl-3 col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Jumlah Kelas</h3>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bank2"></i>
                </div>
                <div class="ps-5">
                  <h6 id="jumlahKelas"></h6> Kelas
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
@push('addon-js')
    <script type="text/javascript">
      // Get Data JSON
      $(document).ready(function(){
        $.ajax({
          url: '{{ url('') }}/dashboard/getDataJson',
          type: 'POST',
          dataType: 'JSON',
          data: {
            _token: $('input[name="_token"]').val(),
          },
          success: function(res){
            if(res.dataKelas.statuscode == 200){
              $('#jumlahKelas').html(res.dataKelas.jumlahkelas)
            } else {
              $('#jumlahKelas').html('0')
            }
            if(res.dataSiswa.statuscode == 200){
              $('#jumlahSiswa').html(res.dataSiswa.jumlahsiswa)
            } else {
              $('#jumlahSiswa').html('0')
            }
          }
        })
      })
    </script>
@endpush
