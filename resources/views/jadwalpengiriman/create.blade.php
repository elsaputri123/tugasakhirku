@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      @if(isset($edit))
      Edit Data Jadwal Pengiriman
      @else
      Input Data Jadwal Pengiriman
      @endif
    </h1>
    <ol class="breadcrumb">
      @if(isset($edit))
      <li><a href="{{ url('jadwalpengiriman/create') }}" class="active"><i class="fa fa-dashboard"></i> Edit Data Jadwal Pengiriman</a></li>
      @else
      <li><a href="{{ url('jadwalpengiriman/create') }}" class="active"><i class="fa fa-dashboard"></i> Input Data Jadwal Pengiriman</a></li>
      @endif
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            @if(isset($edit))
            <h3 class="box-title">Form Edit Data Jadwal Pengiriman</h3>
            @else
            <h3 class="box-title">Form Input Data Jadwal Pengiriman</h3>
            @endif
            <h3 style="color: green" id="hari" ></h3>

            @if (session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

          </div>
          {{-- Container --}}
          <div class="container-fluid">
            @if(isset($edit))
            <form role="form" action="{{ route('jadwalpengiriman.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
              {{ method_field("PUT") }}
              @else
              <form method="POST" action="{{ url("jadwalpengiriman") }}" method="POST" enctype="multipart/form-data">
                @endif
                {!! csrf_field() !!}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                     <label>Hari : </label>
                     <select class="form-control" name="hari" id="hari">
                      @foreach($hari as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                   <label>Nama Karyawan : </label>
                   <select class="form-control" name="id_karyawan" id="id_karyawan">
                    @foreach($karyawan as $key => $value)
                    @if(isset($edit) and $value->id==$edit->id)
                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                    @else
                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                 <label>Kendaraan : </label>
                 <select class="form-control" name="kendaraan" id="kendaraan">
                  @foreach($kendaraan as $key => $value)
                  <option value="{{ $value->id }}">{{ $value->nama." - ".$value->no_polisi }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row pull-right">
            <div class="col-md-12">
              <div class="form-group">
               <button class="btn btn-success btn-md" type="submit">Simpan</button>
             </div>
           </div>
         </div>
       </form>
     </div>
     {{-- Container --}}
   </div>
 </div>
</div>
</section>
</div>

<footer class="main-footer">
  <strong>Copyright &copy; 2019 <a href="{{ url('/') }}">CV. Karya Anugerah Ekspedisi</a>.</strong> All rights
  reserved.
</footer>
</div>
@endsection