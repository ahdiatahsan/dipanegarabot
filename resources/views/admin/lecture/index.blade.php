@extends('layouts.admin.app')

@section('title', 'Perkuliahan')

{{-- Style for this page --}}
@section('style')
<link rel="stylesheet" href="{{ asset('vendors/custom/datatables/datatables.bundle.min.css') }}">
@endsection

{{-- Top JS for this Page --}}
@section('topjs')

@endsection

{{-- Breadcrumb --}}
@section('breadcrumbGroup', 'Perkuliahan')

@section('breadcrumbCategoryUrl', 'lecturer')
@section('breadcrumbCategoryName', 'Perkuliahan')

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
        Tabel Perkuliahan
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
          @if (Auth::check() && Auth::user()->role_id == 2 || Auth::user()->role_id == 1)
          <a href="{{ route('lecture.create') }}" class="btn btn-brand btn-icon-sm"><i class="flaticon2-plus"></i>Tambah Data</a>
          @endif
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
                <th class="sorting kt-font-primary kt-font-bolder">Ruangan</th>
                <th class="sorting kt-font-primary kt-font-bolder">Jam Kuliah</th>
                <th class="sorting kt-font-primary kt-font-bolder">Dosen</th>
                <th class="sorting kt-font-primary kt-font-bolder">Mata Kuliah</th>
                {{-- <th class="sorting kt-font-primary kt-font-bolder">Status Perkuliahan</th> --}}
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
      ajax: "{{ route('lecture.getData') }}",
      columns: [
        { data: 'DT_RowIndex', name: 'id' },
        { data: 'name', name: 'rooms.name' },
        { data: 'time', name: 'lecture_hours.time' },
        { data: 'lecturers', name: 'lecturers.name' },
        { data: 'courses', name: 'courses.name'},
        // { data: 'status', name: 'status'},
        { data: 'action', name: 'action', orderable: false, searchable: false },
      ]
    });
  });
</script>
@endsection
