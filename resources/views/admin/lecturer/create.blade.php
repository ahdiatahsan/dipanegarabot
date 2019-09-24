@extends('layouts.admin.app')

@section('title', 'Dosen')

{{-- Style for this page --}}
@section('style')
<link rel="stylesheet" href="{{ asset('vendors/custom/datatables/datatables.bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/general/select2/dist/css/select2.min.css') }}">
@endsection

{{-- Top JS for this Page --}}
@section('topjs')

@endsection

{{-- Breadcrumb --}}
@section('breadcrumbGroup', 'Perkuliahan')

@section('breadcrumbCategoryName', 'Dosen')

@section('breadcrumbPageUrl', '')
@section('breadcrumbPageName','')

{{-- Main Content --}}
@section('content')

@if ($errors->any())
{{-- Success Notification --}}
<div class="alert alert-light alert-elevate" role="alert">
  <div class="alert-icon"><i class="la la-exclamation-circle kt-font-danger"></i></div>
  <div class="alert-text kt-font-danger kt-font-bold align-self-center">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <div class="alert-close">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true"><i class="la la-close"></i></span>
    </button>
  </div>
</div>
@endif

<div class="kt-portlet kt-portlet--mobile">
  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-list-1"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Tambah Data Dosen
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <a href="{{ route('lecturer.index') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-back"></i>Kembali</a>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    {{-- Begin::Contetn --}}
    <form action="{{ route('lecturer.store') }}" method="POST">
      <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
          @csrf
          <div class="form-group">
            <label>NIDN</label>
            <input class="form-control" type="text" name="nidn" id="nidn" placeholder="0797123456" value="{{ old('nidn') }}" required autofocus>
          </div>

          <div class="form-group">
            <label>Nama Dosen</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="John Doe" value="{{ old('name') }}" required>
          </div>

          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="custom-select select2 select2-container" name="gender" id="gender">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label>Pendidikan Tertinggi</label>
            <select class="custom-select select2 select2-container" name="degree" id="degree">
              <option value="S1">S1 - Sarjana</option>
              <option value="S2">S2 - Magister</option>
              <option value="S3">S3 - Doktor</option>
            </select>
          </div>

          <div class="form-group">
            <label>Kehadiran</label>
            <select class="custom-select select2 select2-container" name="status" id="status">
              <option value="H">Hadir</option>
              <option value="A">Tidak Hadir</option>
            </select>
          </div>

        </div>
      </div>

      <div class="kt-portlet__foot">
        <div class="kt-form__actions">
          <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
              <button type="submit" class="btn btn-primary"><i class="flaticon2-plus"></i> Tambah</button>
              <button type="reset" class="btn btn-dark"><i class="flaticon2-refresh"></i> Batal</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    {{-- End::Content --}}
  </div>
</div>
@endsection

{{-- Bottom JS for this Page --}}
@section('bottomjs')
<script src="{{ asset('vendors/general/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
@endsection
