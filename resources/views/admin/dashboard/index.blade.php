@extends('layouts.admin.app')

@section('title', 'Dashboard')

{{-- Style for this page --}}
@section('style')

@endsection

{{-- Top JS for this Page --}}
@section('topjs')

@endsection

{{-- Breadcrumb --}}
@section('breadcrumbGroup', 'Dashboard')

@section('breadcrumbCategoryUrl', 'dashboard')
@section('breadcrumbCategoryName', 'Dashboard')

@section('breadcrumbPageUrl', '')
@section('breadcrumbPageName','')

{{-- Main Content --}}
@section('content')

<div class="col-xl-12">

  <!--begin:: Widgets/Activity-->
  <div
    class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
    <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
      <div class="kt-portlet__head-toolbar">
      </div>
    </div>
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-widget17">
        <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides"
          style="background-image: url({{ asset('media/pattern.svg') }}); background-repeat:repeat">
          <div class="kt-widget17__chart" style="height:50px;">
          </div>
        </div>
        <div class="kt-widget17__stats">
          <div class="kt-widget17__items">
            <div class="kt-widget17__item text-center">
              <h1 class="kt-font-danger kt-font-bolder" id="clock">
              </h1>
              <h3 class="kt-font-info kt-font-bolder">
                {{ date("d F Y") }}
              </h3>
            </div>
          </div>

          <!-- Begin::Row 2 -->
          <div class="kt-widget17__items">

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/lecture">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/perkuliahan.svg') }}" alt="" width="90px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                  {{ $lecture }} Perkuliahan
                </h3>
              </a>
            </div>

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/lecturer">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/dosen.svg') }}" alt="" width="90px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                    {{ $lecturer }} Dosen
                </h3>
              </a>
            </div>

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/course">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/matakuliah.svg') }}" alt="" width="75px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                    {{ $course }} Mata Kuliah
                </h3>
              </a>
            </div>

          </div>
          <!-- End::Row 2 -->

          <!-- Begin::Row 3 -->
          <div class="kt-widget17__items">

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/lectureHour">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/jamKuliah.svg') }}" alt="" width="100px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                    {{ $lectureHour }} Jam Perkuliahan
                </h3>
              </a>
            </div>

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/information">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/informasi.svg') }}" alt="" width="100px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                    {{ $information }} Informasi
                </h3>
              </a>
            </div>

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/informationCategory">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/kategoriInformasi.svg') }}" alt="" width="100px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                    {{ $informationCategory }} Kategori Informasi
                </h3>
              </a>
            </div>

          </div>
          <!-- End::Row 3 -->

          <!-- Begin::Row 4 -->
          <div class="kt-widget17__items">

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/room">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/ruangan.svg') }}" alt="" width="100px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                  {{ $room }} Ruangan
                </h3>
              </a>
            </div>

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/file">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/file.svg') }}" alt="" width="100px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                  {{ $file }} File
                </h3>
              </a>
            </div>

            <div class="kt-widget17__item hover btn btn-outline-hover-info">
              <a href="/user">
                <span class="kt-widget17__icon">
                  <img class="img-fluid img-responsive" src="{{ asset('media/user.svg') }}" alt="" width="100px">
                </span>
                <h3 class="kt-widget17__subtitle kt-font-bolder">
                  {{ $user }} User
                </h3>
              </a>
            </div>

          </div>
          <!-- End::Row 4 -->
        </div>
      </div>
    </div>
  </div>

  <!--end:: Widgets/Activity-->
</div>

@endsection

{{-- Bottom JS for this Page --}}
@section('bottomjs')
<script type="text/javascript">
  setInterval(function () {
    var date = new Date();
    $('#clock').html(
      date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
    );
  }, 1000);
</script>
@endsection
