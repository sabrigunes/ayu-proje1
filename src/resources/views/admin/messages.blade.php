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
                        <h3 class="fw-bold m-0">Mesajlar</h3>
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
                                    <th>Ad Soyad</th>
                                    <th>Eposta</th>
                                    <th>Telefon</th>
                                    <th>Konu</th>
                                    <th>Mesaj</th>
                                    <th>IP Adresi</th>
                                    <th>Mesaj Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ $message->ip }}</td>
                                        <td>{{ $message->created_at }}</td>

                                        <td>@if($message->status)
                                                <span class="badge badge-success">Tamamlandı</span>
                                            @else
                                                <span class="badge badge-danger">Beklemede</span>
                                            @endif</td>
                                        <td>
                                            @if(!$message->status)
                                                    <button type="button" class="btn btn-sm btn-bg-primary" data-bs-toggle="modal" style="color: #FFFFFF" data-bs-target="#kt_modal_edit_{{ $message->id }}">
                                                        Cevapla
                                                    </button>
                                                    <a href="{{ route('admin_deactivate_message', $message->id) }}" class="btn btn-sm btn-bg-dark" style="color: #FFFFFF">Okundu İşaretle</a>
                                            @endif
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


    @foreach($messages as $message)
        <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $message->id }}">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Mesaj Cevapla</h3>

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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Konu</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="hidden" name="id" value="{{$message->id}}"/>
                                <input type="text"  disabled
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{$message->subject}}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Mesaj</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea class="form-control form-control-solid" disabled placeholder="Mesaja vereceğiniz cevabı bu alana girin." style="height: 100px">{{$message->message}}</textarea>

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Cevap Metni</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <textarea class="form-control form-control-solid" name="answer" placeholder="Mesaja vereceğiniz cevabı bu alana girin." style="height: 100px"></textarea>

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                        <button type="submit" class="btn btn-primary" disabled>Mesajı Cevapla</button>
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
