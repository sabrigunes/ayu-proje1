@extends('admin.layout')

@section('title', "İlan Fotoğrafları")

@section('content')

    <!--begin::Content-->
    <div class="content flex-row-fluid" id="kt_content" style="margin-top: -2rem;">
        <div class="d-flex flex-wrap flex-stack my-5">
            <!--begin::Heading-->
            <h2 class="fs-2 fw-semibold my-2">İlan Fotoğrafları
                <span class="fs-6 text-gray-500 ms-1">{{ $car->title }}</span></h2>
            <!--end::Heading-->
            <!--begin::Controls-->
            <div class="d-flex flex-wrap my-1" data-select2-id="select2-data-114-kbt5">
                <!--begin::Select wrapper-->
                <div class="m-0" data-select2-id="select2-data-113-sv0n">
                    <!--begin::Select-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                        Yeni Fotoğraf Ekle
                    </button>

                </div>
                <!--end::Select wrapper-->
            </div>
            <!--end::Controls-->
        </div>

        <div class="row">
            @foreach($images as $image)
                <div class="col-4">
                    <div class="card shadow-sm mb-7">
                        <div class="card-header">
                            <h3 class="card-title">{{ $image->title }}</h3>
                            <div class="card-toolbar">
                                <a href="{{ route('admin_delete_car_image', $image->id) }}" class="btn btn-sm btn-danger">
                                    Fotoğrafı Sil
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="card-p mb-10">
                                <div class="text-center px-4">
                                    <img class="mw-100 mh-300px card-rounded-bottom" alt="{{ $image->title }}" src="{{ '/uploads/'.$image->image }}"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach



    </div>
    <!--end::Content-->
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <form class="modal-content" method="post" enctype="multipart/form-data" action="{{ route('admin_post_add_images') }}"
                  enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $car->id }}" name="car_id">
                <div class="modal-header">
                    <h3 class="modal-title">Fotoğraf Ekle</h3>

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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Fotoğraf Başlığı</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="title" class="form-control form-control-lg form-control-solid"/>
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
                            <input required type="file" multiple="multiple" name="image[]"
                                   class="form-control form-control-lg form-control-solid"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-primary">Fotoğraf Ekle</button>
                </div>
            </form>
        </div>
    </div>

@endsection
