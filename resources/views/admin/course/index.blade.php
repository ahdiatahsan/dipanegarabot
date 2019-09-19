@extends('layouts.admin.app')

@section('title', 'Mata Kuliah')

{{-- Style for this page --}}
@section('style')
<link rel="stylesheet" href="{{ asset('vendors/custom/datatables/datatables.bundle.min.css') }}">
@endsection

{{-- Top JS for this Page --}}
@section('topjs')

@endsection

{{-- Breadcrumb --}}
@section('breadcrumbGroup', 'Perkuliahan')

@section('breadcrumbCategoryUrl', 'course')
@section('breadcrumbCategoryName', 'Mata Kuliah')

@section('breadcrumbPageUrl', '')
@section('breadcrumbPageName','')

{{-- Main Content --}}
@section('content')

@if ($message = session()->get('success'))
{{-- Success Notification --}}
<div class="alert alert-light alert-elevate" role="alert">
  <div class="alert-icon"><i class="la la-check-circle kt-font-success"></i></div>
  <div class="alert-text kt-font-success kt-font-bolder">{{$message}}</div>
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
        Tabel Mata Kuliah
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
          <a href="{{ route('course.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Tambah Data</a>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline"
            id="table" role="grid" aria-describedby="kt_table_1_info">
            <thead>
              <tr role="row">
                <th class="sorting kt-font-primary kt-font-bolder" style="width: 20px">No.</th>
                <th class="sorting kt-font-primary kt-font-bolder">Kode</th>
                <th class="sorting kt-font-primary kt-font-bolder">Nama Mata Kuliah</th>
                <th class="sorting kt-font-primary kt-font-bolder">SKS</th>
                <th class="sorting_disabled kt-font-primary kt-font-bolder kt-align-center" style="min-width: 80px">Tindakan</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- Bottom JS for this Page --}}
@section('bottomjs')
<script src="{{ asset('vendors/custom/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#table').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "{{ route('course.getData') }}",
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex' },
        { data: 'code', name: 'code' },
        { data: 'name', name: 'name' },
        { data: 'credit', name: 'credit' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
      ]
    });
  });
</script>
@endsection
