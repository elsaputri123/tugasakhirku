@extends('layouts.app-admin')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      @if(isset($edit))
      Edit Data Rute Pengiriman
      @else
      Input Data Rute Pengiriman
      @endif
    </h1>
    <ol class="breadcrumb">
      @if(isset($edit))
      <li><a href="{{ url('rute/create') }}" class="active"><i class="fa fa-dashboard"></i> Edit Data Rute Pengiriman</a></li>
      @else
      <li><a href="{{ url('rute/create') }}" class="active"><i class="fa fa-dashboard"></i> Input Data Rute Pengiriman</a></li>
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
            <h3 class="box-title">Form Edit Data Rute Pengiriman</h3>
            @else
            <h3 class="box-title">Form Input Data Rute Pengiriman</h3>
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

            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
             </ul>
           </div>
           @endif

         </div>
         {{-- Container --}}
         <div class="container-fluid">
          @if(isset($edit))
          <form role="form" action="{{ route('rute.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
            {{ method_field("PUT") }}
            @else
            <form method="POST" action="{{ url("rute") }}" method="POST" enctype="multipart/form-data">
              @endif
              {!! csrf_field() !!}
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                   <label>Kecamatan </label>
                   <select class="form-control" name="kecamatan" id="kecamatan">
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
                  <label>Jenis Rute : </label>
                  <select name="jenis" id="jenis" class="form-control">
                    <option> -- Pilih Jenis --</option>
                    <option value="1">Kecamatan</option>
                    <option value="2">Jalan</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Rute  </label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Rute (Opotional)" 
                  value="@if(isset($edit)) {{ $edit->nama }}  @endif">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                 <label>Koordinat X (longitude) </label>
                 <input type="text" name="koordinat_x" id="koordinat_x" class="form-control" required="required" placeholder="Masukan Longitude" value="@if(isset($edit)) {{ $edit->koordinat_x }}  @endif" >
               </div>
             </div>
           </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
               <label>Koordinat Y (latitude) </label>
               <input type="text" name="koordinat_y" id="koordinat_y" class="form-control" required="required" placeholder="Masukan Latitude" value="@if(isset($edit)) {{ $edit->koordinat_y }}  @endif">
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

@section("script")
<script type="text/javascript">
  @if(isset($edit->jenis))
    $("#jenis").val('{{ $edit->jenis }}');
  @endif

  @if(isset($edit->kecamatan_id))
    $("#kecamatan").val('{{ $edit->kecamatan_id }}');
  @endif
</script>
@endsection