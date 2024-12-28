@extends('admin.layout')

@section('content')

<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-12">

        <!--begin::Deactivate Acc ount-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                 data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">İlanlarım</h3>


                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin_get_add_car') }}" target="_parent" class="btn btn-dark">İlan Ekle</a>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_deactivate" class="collapse show">
                <!--begin::Form-->
                <form id="kt_account_deactivate_form" class="form">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="table-responsive">
                            <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                                <thead>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <th>İlan No</th>
                                    <th>Oluşturma Tarihi</th>
                                    <th>İlan Başlığı</th>
                                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')
                                        <th>Kullanıcı</th>
                                    @endif
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{ $car->id + 10000 }}</td>
                                        <td>{{ \Carbon\Carbon::parse($car->created_at)->format('d.m.Y') }}</td>
                                        <td>{{ $car->title }}</td>
                                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')
                                            <td>{{ $car->user_id }}</td>
                                        @endif
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')
                                                <a href="{{ route('admin_confirm_car', $car->id) }}" class="btn btn-sm @if($car->status != '1') btn-bg-success @else btn-bg-info @endif"  style="color: #FFFFFF">@if($car->status != '1') Onayla @else Devre Dışı Bırak @endif</a>
                                            @endif
                                            <a href="{{ route('admin_get_car_images', $car->id) }}" class="btn btn-sm btn-bg-dark" style="color: #FFFFFF">Fotoğraflar</a>
                                            <a href="{{ route('admin_get_edit_car', $car->id) }}" class="btn btn-sm btn-bg-primary" style="color: #FFFFFF">Düzenle</a>
                                            <a href="{{ route('admin_delete_car', $car->id) }}" class="btn btn-sm btn-bg-danger" style="color: #FFFFFF">Sil</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--end::Card body-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Deactivate Account-->


    </div>
    <!--end::Col-->

</div>
<!--end::Row-->


@endsection

@section('js')
    <script>
    $("#kt_datatable_zero_configuration").DataTable();
    </script>
@endsection
