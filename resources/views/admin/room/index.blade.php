@extends('layouts.admin.app')

@section('title', 'Ruangan')

{{-- Style for this page --}}
@section('style')

@endsection

{{-- Top JS for this Page --}}
@section('topjs')

@endsection

{{-- Breadcrumb --}}
@section('breadcrumbGroup', 'Perkuliahan')

@section('breadcrumbCategoryUrl', 'room')
@section('breadcrumbCategoryName', 'Ruangan')

@section('breadcrumbPageUrl', '')
@section('breadcrumbPageName','')

{{-- Main Content --}}
@section('content')

@if (session()->get('success'))
{{-- Success Notification --}}
<div class="alert alert-light alert-elevate" role="alert">
  <div class="alert-icon"><i class="la la-check-circle kt-font-success"></i></div>
  <div class="alert-text">A simple dark alert—check it out!</div>
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
        Tabel Ruangan
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <div class="dropdown dropdown-inline">
          <a href="" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Tambah Data</a>
        </div>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">

  </div>
</div>
@endsection

{{-- Bottom JS for this Page --}}
@section('bottomjs')

@endsection
