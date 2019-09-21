@extends('layouts.admin.app')

@section('title', 'Kategori Informasi')

{{-- Style for this page --}}
@section('style')
<link rel="stylesheet" href="{{ asset('vendors/custom/datatables/datatables.bundle.min.css') }}">
@endsection

{{-- Top JS for this Page --}}
@section('topjs')

@endsection

{{-- Breadcrumb --}}
@section('breadcrumbGroup', 'Informasi Umum')

@section('breadcrumbCategoryName', 'Kategori Informasi')

@section('breadcrumbPageUrl', '')
@section('breadcrumbPageName','')

{{-- Main Content --}}
@section('content')

<div class="kt-portlet kt-portlet--mobile">
  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-list-1"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Lihat Detail Kategori Informasi
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <a href="{{ route('informationCategory.index') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-back"></i>Kembali</a>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    {{-- Begin::Contetn --}}
    <div class="kt-portlet__body">
      <div class="kt-section kt-section--first">
        <div class="form-group">
          <label>Nama Kategori</label>
          <input class="form-control" value="{{$informationCategory->name}}" readonly>
        </div>

        <div class="form-group">
          <label>Detail</label>
          <textarea class="form-control" readonly>{{ $informationCategory->detail }}</textarea>
        </div>

      </div>
    </div>
    {{-- End::Content --}}
  </div>
</div>
@endsection

{{-- Bottom JS for this Page --}}
@section('bottomjs')

@endsection
