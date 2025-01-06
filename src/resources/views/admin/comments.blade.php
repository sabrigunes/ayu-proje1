@extends('admin.layout')
@section('title', "Yorumlar")

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
                        <h3 class="fw-bold m-0">Yorumlar</h3>
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
                                    <th>Araç</th>
                                    <th>Yorum</th>
                                    <th>Puan</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->car_title }} <a target="_blank"
                                                                     href="{{ route('get_car_page',\App\Models\Car::getUrl($comment->car_id)) }}">

                                                <i class="ki-duotone ki-arrow-up-right" style="font-size: large">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>


                                            </a></td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>
                                            {!!   App\Models\Comment::prepareCommentSectionForAdmin($comment->rate) !!}
                                        </td>
                                        <td>@if($comment->status == '1')
                                                <span class="badge badge-success">Aktif</span>
                                            @elseif($comment->status == '0')
                                                <span class="badge badge-primary">Onay Bekliyor</span>
                                            @else
                                                <span class="badge badge-danger">Deaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-bg-primary"
                                                    data-bs-toggle="modal" style="color: #FFFFFF"
                                                    data-bs-target="#kt_modal_edit_{{ $comment->id }}">
                                                Düzenle
                                            </button>
                                            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == '1')
                                                @if($comment->status == '0' || $comment->status == '-1')
                                                    <a href="{{ route('admin_deactivate_comment', $comment->id) }}"
                                                       class="btn btn-sm btn-bg-success" style="color: #FFFFFF">Aktive
                                                        Et</a>
                                                @else
                                                    <a href="{{ route('admin_deactivate_comment', $comment->id) }}"
                                                       class="btn btn-sm btn-bg-info" style="color: #FFFFFF">Deaktive
                                                        Et</a>
                                                @endif
                                            @endif
                                            <a href="{{ route('admin_delete_comment', $comment->id) }}"
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


    @foreach($comments as $comment)
        <div class="modal fade" tabindex="-1" id="kt_modal_edit_{{ $comment->id }}">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('admin_post_edit_comment') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title">Yorum Düzenle</h3>

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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Yorum</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="hidden" name="id" value="{{$comment->id}}"/>
                                <textarea name="comment" class="form-control form-control-lg form-control-solid"
                                          cols="20" rows="5">{{$comment->comment}}</textarea>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Puan</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <div class="rating">

                                    <!--begin::Star 1-->
                                    <label class="rating-label" for="kt_rating_2_input_1">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </label>
                                    <input class="rating-input" name="rating" value="1" type="radio"
                                           @if($comment->rate == '1') checked="checked"
                                           @endif id="kt_rating_2_input_1"/>
                                    <!--end::Star 1-->

                                    <!--begin::Star 2-->
                                    <label class="rating-label" for="kt_rating_2_input_2">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </label>
                                    <input class="rating-input" name="rating" value="2" type="radio"
                                           @if($comment->rate == '2') checked="checked"
                                           @endif id="kt_rating_2_input_2"/>
                                    <!--end::Star 2-->

                                    <!--begin::Star 3-->
                                    <label class="rating-label" for="kt_rating_2_input_3">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </label>

                                    <input class="rating-input" name="rating" value="3" type="radio"
                                           @if($comment->rate == '3') checked="checked"
                                           @endif id="kt_rating_2_input_3"/>
                                    <!--end::Star 3-->

                                    <!--begin::Star 4-->
                                    <label class="rating-label" for="kt_rating_2_input_4">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </label>
                                    <input class="rating-input" name="rating" value="4" type="radio"
                                           @if($comment->rate == '4') checked="checked"
                                           @endif id="kt_rating_2_input_4"/>
                                    <!--end::Star 4-->

                                    <!--begin::Star 5-->
                                    <label class="rating-label" for="kt_rating_2_input_5">
                                        <i class="ki-duotone ki-star fs-1"></i>
                                    </label>
                                    <input class="rating-input" name="rating" value="5" type="radio"
                                           @if($comment->rate == '5') checked="checked"
                                           @endif id="kt_rating_2_input_5"/>
                                    <!--end::Star 5-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Vazgeç</button>
                        <button type="submit" class="btn btn-primary">Yorum Güncelle</button>
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
