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

@section('breadcrumbCategoryName', 'File')

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
        Lihat Detail File
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <a href="{{ route('file.index') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-back"></i>Kembali</a>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    {{-- Begin::Contetn --}}
    <div class="kt-portlet__body">
      <div class="kt-section kt-section--first">
        <div class="form-group">
          <label>Judul File</label>
          <input class="form-control" value="{{$file->title}}" readonly>
        </div>

        @if ($file->filetype == 'jpeg' || $file->filetype == 'jpg' || $file->filetype == 'png')
        <div class="col-xl-12 d-flex justify-content-center">
          <div class="card" style="max-width: 600px">
            <img class="card-img-top" src="{{ Storage::url($file->filename) }}" alt="Card image cap">
            <div class="card-body text-center">
              <a class="btn btn-danger" href="{{ Storage::url($file->filename) }}" target="_blank"><i class="flaticon2-image-file"></i> Lihat Gambar</a>
            </div>
          </div>
        </div>
        @else
        <div class="text-center">
          <a class="btn btn-danger btn-lg" href="{{ Storage::url($file->filename) }}" target="_blank"><i class="flaticon2-file"></i> Lihat File</a>
        </div>
        @endif

      </div>
    </div>
    {{-- End::Content --}}
  </div>
</div>
@endsection

{{-- Bottom JS for this Page --}}
@section('bottomjs')

@endsection
