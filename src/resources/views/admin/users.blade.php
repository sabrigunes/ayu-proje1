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
                        <h3 class="fw-bold m-0">Kullanıcılar</h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                            Kullanıcı Ekle
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
                                    <th>Adı</th>
                                    <th>Soyadı</th>
                                    <th>Email</th>
                                    <th>Durum</th>
                                    <th>Yetki</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->surname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>@if($user->status)
                                                <span class="badge badge-success">Aktif</span>
                                            @else
                                                <span class="badge badge-danger">Deaktif</span>
                                            @endif</td>
                                        <td>@if($user->is_admin)
                                                <span class="badge badge-primary">Yönetici</span>
                                            @else
                                                <span class="badge badge-secondary">Kullanıcı</span>
                                            @endif
                                        </td>
                                        <td>{{ date_format($user->created_at,"d.m.Y H:i:s") }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-bg-primary"
                                                    data-bs-toggle="modal" style="color: #FFFFFF"
                                                    data-bs-target="#kt_modal_edit_{{ $user->id }}">
                                                Düzenle
                                            </button>
                                            <a href="{{ route('admin_change_auth_user', $user->id) }}"
                                               class="btn btn-sm btn-bg-dark"
                                               style="color: #FFFFFF">@if($user->is_admin)
                                                    Yetki Düşür
                                                @else
                                                    Yetki Yükselt
                                                @endif </a>
                                            <a href="{{ route('admin_deactivate_user', $user->id) }}"
                                               class="btn btn-sm btn-bg-info" style="color: #FFFFFF">@if($user->status)
                                                    Deaktive Et
                                                @else
                                                    Aktive Et
                                                @endif</a>
                                            <a href="{{ route('admin_delete_user', $user->id) }}"
                                               class="btn btn-sm btn-bg-danger" style="color: #FFFFFF">Sil</a>
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
            <form class="modal-content" method="post" action="{{ route('admin_post_add_user') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Kullanıcı Ekle</h3>

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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kullanıcı Adı</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" required name="user_name"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="John"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kullanıcı Soyadı</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" required name="user_surname"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Doe"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input required type="text" name="user_email"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="johndoe@aracsat.com"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Parola</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input required type="password" name="user_password"
                                   class="form-control form-control-lg form-control-solid"/>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Yetki Türü</span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select name="user_auth" aria-label="Yetki türü seçin" data-control="select2"
                                    data-placeholder="Yetki türü seçiniz..."
                                    class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Yetki türü seçiniz...</option>
                                <option value="1">Yönetici</option>
                                <option value="0">Kullanıcı</option>
                            </select>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                    <button type="submit" class="btn btn-primary">Kullanıcı Ekle</button>
                </div>
            </form>
        </div>
    </div>

    @foreach($users as $user)
        <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $user->id }}">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('admin_post_edit_user') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Kullanıcı Düzenle</h3>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                             aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kullanıcı Adı</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="hidden" required name="user_id" value="{{ $user->id }}"/>
                                <input type="text" required name="user_name"
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{ $user->name }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kullanıcı Soyadı</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" required name="user_surname"
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{ $user->surname }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input required type="text" name="user_email"
                                       class="form-control form-control-lg form-control-solid"
                                       value="{{ $user->email }}"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Parola</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input required type="password" name="user_password"
                                       class="form-control form-control-lg form-control-solid"/>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Durum</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="user_auth" aria-label="Durum seçin" data-control="select2"
                                        data-placeholder="Durum seçiniz..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Durum seçiniz...</option>
                                    <option @if($user->status) selected @endif value="1">Aktif</option>
                                    <option @if(!$user->status) selected @endif value="0">Deaktif</option>
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Yetki</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="user_auth" aria-label="Yetki seçin" data-control="select3"
                                        data-placeholder="Yetki seçiniz..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                    <option value="">Yetki seçiniz...</option>
                                    <option @if($user->is_admin) selected @endif value="1">Yönetici</option>
                                    <option @if(!$user->is_admin) selected @endif value="0">Kullanıcı</option>
                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                        <button type="submit" class="btn btn-primary">Kullanıcı Güncelle</button>
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
