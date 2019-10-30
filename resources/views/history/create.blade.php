@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      @if(isset($edit))
      Edit Data History Pengiriman
      @else
      Input Data History Pengiriman
      @endif
    </h1>
    <ol class="breadcrumb">
      @if(isset($edit))
      <li><a href="{{ url('HistoryController/create') }}" class="active"><i class="fa fa-dashboard"></i> Edit Data History Pengiriman</a></li>
      @else
      <li><a href="{{ url('HistoryController/create') }}" class="active"><i class="fa fa-dashboard"></i> Input Data History Pengiriman</a></li>
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
            <h3 class="box-title">Form Edit Data History Pengiriman</h3>
            @else
            <h3 class="box-title">Form Input Data History Pengiriman</h3>
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
            <form role="form" action="{{ route('history.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
              {{ method_field("PUT") }}
              @else
              <form method="POST" action="{{ url("history") }}" method="POST" enctype="multipart/form-data">
                @endif
                {!! csrf_field() !!}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                     <label>Titik Awal : </label>
                     <select class="form-control" name="awal" id="awal">
                      @foreach($kecamatan as $key => $value)
                      @if($value->nama=="Surabaya")
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
                   <label>Titik Akhir : </label>
                   <select class="form-control" name="akhir" id="akhir">
                    @foreach($kecamatan as $key => $value)
                      <option value="{{ $value->id }}">{{ $value->nama }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                 <label>Nama Kurir : </label>
                 <select class="form-control" name="user_id" id="user_id">
                  @foreach($karyawan as $key => $value)
                  <option value="{{ $value->id }}">{{ $value->nama }}</option>
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