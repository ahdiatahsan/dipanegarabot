@extends('layouts.admin.app')

@section('title', 'Ruangan')

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

@section('breadcrumbCategoryName', 'Ruangan')

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
        Ubah Data Ruangan
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <a href="{{ route('room.index') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-back"></i>Kembali</a>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    {{-- Begin::Contetn --}}
    <form action="{{ route('room.update', $room->id) }}" method="POST">
      <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Nama Ruangan</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="101" value="{{ $room->name }}" required autofocus>
          </div>

          <div class="form-group">
            <label>Lantai</label>
            <select class="custom-select select2 select2-container" name="floor" id="floor">
              <option value="1" {{ ($room->floor == 1) ? 'selected' : '' }}>Lantai 1</option>
              <option value="2" {{ ($room->floor == 2) ? 'selected' : '' }}>Lantai 2</option>
              <option value="3" {{ ($room->floor == 3) ? 'selected' : '' }}>Lantai 3</option>
              <option value="4" {{ ($room->floor == 4) ? 'selected' : '' }}>Lantai 4</option>
              <option value="5" {{ ($room->floor == 5) ? 'selected' : '' }}>Lantai 5</option>
            </select>
          </div>

          <div class="form-group">
            <label>Gedung</label>
            <select class="custom-select select2 select2-container" name="building" id="building">
              <option value="A" {{ ($room->building == 'A') ? 'selected' : '' }}>Gedung A</option>
              <option value="B" {{ ($room->building == 'B') ? 'selected' : '' }}>Gedung B</option>
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
