@extends('admin.layout')

@section('title', "Yeni İlan Oluştur")

@section('content')


                <!--begin::Content-->
                <div class="content flex-row-fluid" id="kt_content">
                    <!--begin::Basic info-->
                    <div class="card mb-5 mb-xl-12">
                        <!--begin::Card header-->
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                            <!--begin::Card title-->
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">İlan Detayları</h3>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card header-->
                        <!--begin::Content-->
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <!--begin::Form-->
                            <form id="kt_account_profile_details_form" class="form" method="post" action="{{ route('admin_post_edit_car') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $car->id }}">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">

                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">İlan Başlığı</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="title" value="{{ $car->title }}" class="form-control form-control-lg form-control-solid" placeholder="Sahibinden Satılık Hatasız Araç"/>
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
                                            <input type="text" name="keywords" value="{{ $car->keywords }}" class="form-control form-control-lg form-control-solid" placeholder="sahibinden, satilik, otomatik"/>
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
                                            <textarea class="form-control form-control-solid" name="desc" placeholder="İlan ile ilgili detaylı açıklamanızı bu alana girin." style="height: 100px">{{ $car->description }}</textarea>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Marka</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="brand" aria-label="Select a Country" data-control="select2" data-placeholder="Marka seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Marka seçiniz...</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" @if($brand->id == $car->brand_id) selected @endif>{{ $brand->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">İl</span>

                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="city" aria-label="Select a Country" data-control="select2" data-placeholder="İl seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">İl seçiniz...</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" @if($city->id == $car->city) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Ücret</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="number"  name="price" value="{{ $car->price }}" class="form-control form-control-lg form-control-solid" placeholder="100000"/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Model Yılı</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="number" min="1900" max="2024" name="year" value="{{ $car->year }}" class="form-control form-control-lg form-control-solid" placeholder="2024"/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Yakıt Tipi</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="fuel_type" aria-label="Select a Country" data-control="select2" data-placeholder="Yakıt seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Yakıt seçiniz...</option>
                                                <option value="Benzin" @if($car->fuel_type == "Benzin") selected @endif>Benzin</option>
                                                <option value="Benzin & LPG" @if($car->fuel_type == "Benzin & LPG") selected @endif>Benzin & LPG</option>
                                                <option value="Dizel" @if($car->fuel_type == "Dizel") selected @endif>Dizel</option>
                                                <option value="Hybrid" @if($car->fuel_type == "Hybrid") selected @endif>Hybrid</option>
                                                <option value="Elektrik" @if($car->fuel_type == "Elektrik") selected @endif>Elektrik</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Vites Türü</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="transmission" aria-label="Select a Country" data-control="select2" data-placeholder="Vites türü seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="" >Vites türü seçiniz...</option>
                                                <option value="Otomatik" @if($car->transmission == "Otomatik") selected @endif>Otomatik</option>
                                                <option value="Manuel" @if($car->transmission == "Manuel") selected @endif>Manuel</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kilometre</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="number" name="kilometers" value="{{ $car->kilometers }}" class="form-control form-control-lg form-control-solid" placeholder="100.000"/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Kasa Tipi</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="body_type" aria-label="Select a Country" data-control="select2" data-placeholder="Kasa tipi seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Kasa tipi seçiniz...</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $car->category_id) selected @endif>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Çekiş</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="drivetrain" aria-label="Select a Country" data-control="select2" data-placeholder="Çekiş tipi seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Çekiş tipi seçiniz...</option>
                                                <option value="Önden Çekiş" @if($car->drivetrain == "Önden Çekiş") selected @endif>Önden Çekiş</option>
                                                <option value="Arkadan İtiş" @if($car->drivetrain == "Arkadan İtiş") selected @endif>Arkadan İtiş</option>
                                                <option value="4WD (Sürekli)" @if($car->drivetrain == "4WD (Sürekli)") selected @endif>4WD (Sürekli)</option>
                                                <option value="AWD (Elektronik)" @if($car->drivetrain == "AWD (Elektronik)") selected @endif>AWD (Elektronik)</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Renk</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select name="color" aria-label="Select a Country" data-control="select2" data-placeholder="Renk seçiniz..." class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Renk seçiniz...</option>
                                                <option value="Beyaz" @if($car->color == "Beyaz") selected @endif>Beyaz</option>
                                                <option value="Siyah" @if($car->color == "Siyah") selected @endif>Siyah</option>
                                                <option value="Gri" @if($car->color == "Gri") selected @endif>Gri</option>
                                                <option value="Kırmızı" @if($car->color == "Kırmızı") selected @endif>Kırmızı</option>
                                                <option value="Mavi" @if($car->color == "Mavi") selected @endif>Mavi</option>
                                                <option value="Yeşil" @if($car->color == "Yeşil") selected @endif>Yeşil</option>
                                                <option value="Sarı" @if($car->color == "Sarı") selected @endif>Sarı</option>
                                                <option value="Turuncu" @if($car->color == "Turuncu") selected @endif>Turuncu</option>
                                                <option value="Bordo" @if($car->color == "Bordo") selected @endif>Bordo</option>
                                                <option value="Pembe" @if($car->color == "Pembe") selected @endif >Pembe</option>
                                                <option value="Gümüş" @if($car->color == "Gümüş") selected @endif>Gümüş</option>
                                                <option value="Altın" @if($car->color == "Altın") selected @endif>Altın</option>
                                                <option value="Mor" @if($car->color == "Mor") selected @endif>Mor</option>
                                                <option value="Bronz" @if($car->color == "Bronz") selected @endif>Bronz</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Motor Gücü (hp)</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="number" name="engine_power" value="{{ $car->engine_power }}" class="form-control form-control-lg form-control-solid" placeholder="110"/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Motor Hacmi (cc)</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="number" name="engine_size" value="{{ $car->engine_size }}" class="form-control form-control-lg form-control-solid" placeholder="1398"/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Ortalama Yakıt Tüketimi</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <input type="number" name="avg_fuel_com" value="{{ $car->avg_fuel_consumption }}" class="form-control form-control-lg form-control-solid" placeholder="6.7" step=".1"/>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <div class="form-text">İlana fotoğraf ekleme/düzenleme işlemleri "İlan Fotoğrafları" sayfasından gerçekleştirilmektedir.</div>
                                </div>
                                <!--end::Card body-->
                                <!--begin::Actions-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">

                                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">İlanı Kaydet</button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Basic info-->

                </div>
                <!--end::Content-->



@endsection
