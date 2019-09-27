@extends('layouts.user.app')

@section('body')
<div class="kt-portlet kt-portlet--mobile">
  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <h3 class="kt-portlet__head-title">
        Daftar Ruangan
      </h3>
    </div>
  </div>
  <div class="kt-portlet__body">
    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-striped- table-bordered table-hover dataTable no-footer dtr-inline "
            id="table" role="grid" aria-describedby="kt_table_1_info">
            <thead>
              <tr role="row">
                <th class="sorting kt-font-primary kt-font-bolder" style="width: 20px">No.</th>
                <th class="sorting kt-font-primary kt-font-bolder">Nama Ruangan</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendors/general/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/general/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/scripts.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/custom/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#table').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      ajax: "{{ route('room.getList') }}",
      columns: [
        { data: 'DT_RowIndex', name: 'id' },
        { data: 'name', name: 'name' },
      ]
    });
  });
</script>
@endsection

