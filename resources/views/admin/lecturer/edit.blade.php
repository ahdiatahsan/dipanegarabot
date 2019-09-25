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
        Ubah Data Dosen
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
    <form action="{{ route('lecturer.update', $lecturer->id) }}" method="POST">
      <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
          @csrf
          @method('PUT')

          @if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
          <div class="form-group">
              <label>NIDN</label>
              <input class="form-control" type="text" name="nidn" id="nidn" placeholder="0797123456" value="{{ old('nidn', $lecturer->nidn) }}" required autofocus>
            </div>

            <div class="form-group">
              <label>Nama Dosen</label>
              <input class="form-control" type="text" name="name" id="name" placeholder="John Doe" value="{{ old('name', $lecturer->name) }}" required>
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="custom-select select2 select2-container" name="gender" id="gender">
                <option value="L" {{ ($lecturer->gender == 'L') ? 'selected' : '' }}>Laki-Laki</option>
                <option value="P" {{ ($lecturer->gender == 'P') ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Pendidikan Tertinggi</label>
              <select class="custom-select select2 select2-container" name="degree" id="degree">
                <option value="S1" {{ ($lecturer->degree == 'S1') ? 'selected' : '' }}>S1 - Sarjana</option>
                <option value="S2" {{ ($lecturer->degree == 'S2') ? 'selected' : '' }}>S2 - Magister</option>
                <option value="S3" {{ ($lecturer->degree == 'S3') ? 'selected' : '' }}>S3 - Doktor</option>
              </select>
            </div>
          @endif

          <div class="form-group">
            <label>Kehadiran</label>
            <select class="custom-select select2 select2-container" name="status" id="status">
              <option value="H" {{ ($lecturer->status == 'H') ? 'selected' : '' }}>Hadir</option>
              <option value="A" {{ ($lecturer->status == 'A') ? 'selected' : '' }}>Tidak Hadir</option>
            </select>
          </div>

        </div>
      </div>

      <div class="kt-portlet__foot">
        <div class="kt-form__actions">
          <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
              <button type="submit" class="btn btn-primary"><i class="flaticon2-pen"></i> Ubah</button>
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
