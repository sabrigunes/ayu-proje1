@extends('admin.layout')

@section('content')

    <!--begin::Row-->
    <div class="row g-5 g-xl-12">
        <!--begin::Col-->
        <div class="col-xl-12">

            <!--begin::Deactivate Account-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                     data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">Markalar</h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                            Marka Ekle
                        </button>
                    </div>

                </div>
                <!--end::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_deactivate" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <div class="table-responsive">
                            <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                                <thead>
                                <tr class="fw-semibold fs-6 text-muted">
                                    <th>Marka Adı</th>
                                    <th>Anahtar Kelimeler</th>
                                    <th>Fotoğraf</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->title }}</td>
                                        <td>{{ $brand->keywords }}</td>
                                        <td>
                                            <img src="{{ $brand->image }}" alt=""
                                                 style="height: 2.5rem;">
                                        </td>
                                        <td>@if($brand->status)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Deaktif</span>
                                            @endif</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-bg-primary" data-bs-toggle="modal" style="color: #FFFFFF" data-bs-target="#kt_modal_edit_{{ $brand->id }}">
                                                Düzenle
                                            </button>
                                            <a href="{{ route('admin_deactivate_brand', $brand->id) }}" class="btn btn-sm btn-bg-info" style="color: #FFFFFF">Deaktive Et</a>
                                            <a href="{{ route('admin_delete_brand', $brand->id) }}" class="btn btn-sm btn-bg-danger" style="color: #FFFFFF">Sil</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!--end::Card body-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Deactivate Account-->
            <!--begin::Deactivate Account-->


        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->


    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <form class="modal-content" method="post" action="{{ route('admin_post_add_brand') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Marka Ekle</h3>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Marka Adı</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" required name="brand_name"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Hyundai"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Anahtar Kelimeler</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input required type="text" name="brand_keywords"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="hyundai, ioniq"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Açıklama</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" required name="brand_desc" class="form-control form-control-lg form-control-solid"
                                   placeholder="Marka Açıklaması"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Fotoğraf</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input required type="file" name="brand_image"
                                   class="form-control form-control-lg form-control-solid"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-primary">Marka Ekle</button>
                </div>
            </form>
        </div>
    </div>

    @foreach($brands as $brand)
        <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $brand->id }}">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('admin_post_edit_brand') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Marka Ekle</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                             aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Marka Adı</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="hidden" name="id" value="{{$brand->id}}"/>
                                <input type="text" required name="brand_name"
                                       class="form-control form-control-lg form-control-solid"
                                       placeholder="Hyundai" value="{{$brand->title}}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Anahtar Kelimeler</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input required type="text" name="brand_keywords"
                                       class="form-control form-control-lg form-control-solid"
                                       placeholder="hyundai, ioniq" value="{{$brand->keywords}}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Açıklama</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" required name="brand_desc" class="form-control form-control-lg form-control-solid"
                                       placeholder="Marka Açıklaması" value="{{$brand->description}}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Güncel Fotoğraf</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <img src="{{ $brand->image }}" alt="" style="height: 2.5rem;">
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Yeni Fotoğraf</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input required type="file" name="brand_image"
                                       class="form-control form-control-lg form-control-solid"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                        <button type="submit" class="btn btn-primary">Marka Güncelle</button>
                    </div>
                </form>
            </div>
        </div>

    @endforeach
@endsection

@section('js')
    <script>
        $("#kt_datatable_zero_configuration").DataTable();
    </script>
@endsection
