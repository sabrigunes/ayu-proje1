@extends('layout')

@section('title', "Kullanım Şartları | ".$settings->title)

@section('content')
    <!-- tabs-section -->
    <section class="tabs-section layout-radius">
        <div class="boxcar-container">
            <div class="boxcar-title-three">
                <h2>Kullanım Şartları</h2>
            </div>
            <div class="row">
                <div class="tabs-column col-lg-3 col-md-4 col-sm-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Account&Payments-tab" data-bs-toggle="tab" data-bs-target="#Account&Payments" type="button" role="tab" aria-controls="Account&Payments" aria-selected="true">Hesap ve Ödemeler</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ManageOrders-tab" data-bs-toggle="tab" data-bs-target="#ManageOrders" type="button" role="tab" aria-controls="ManageOrders" aria-selected="false">Siparişleri Yönet</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Returns&Refunds-tab" data-bs-toggle="tab" data-bs-target="#Returns&Refunds" type="button" role="tab" aria-controls="Returns&Refunds" aria-selected="false">İadeler ve İade Ödemeleri</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="COVID-19-tab" data-bs-toggle="tab" data-bs-target="#COVID-19" type="button" role="tab" aria-controls="COVID-19" aria-selected="false">COVID-19</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Other-tab" data-bs-toggle="tab" data-bs-target="#Other" type="button" role="tab" aria-controls="Other" aria-selected="false">Diğer</button>
                        </li>

                    </ul>
                </div>
                <div class="content-column col-lg-9 col-md-8 col-sm-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Account&Payments" role="tabpanel" aria-labelledby="Account&Payments-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Giriş</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. AracSat Sitelerinin Kullanımı</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. İçerik ve Fikirler</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ManageOrders" role="tabpanel" aria-labelledby="ManageOrders-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Giriş</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. AracSat Sitelerinin Kullanımı</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. İçerik ve Fikirler</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Returns&Refunds" role="tabpanel" aria-labelledby="Returns&Refunds-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Giriş</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. AracSat Sitelerinin Kullanımı</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. İçerik ve Fikirler</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="COVID-19" role="tabpanel" aria-labelledby="COVID-19-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Giriş</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. AracSat Sitelerinin Kullanımı</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. İçerik ve Fikirler</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Other" role="tabpanel" aria-labelledby="Other-tab">
                            <div class="right-box">
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">1. Giriş</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">2. AracSat Sitelerinin Kullanımı
                                    </h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                                <!-- content-box -->
                                <div class="content-box">
                                    <h6 class="title">3. İçerik ve Fikirler</h6>
                                    <div class="text v2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Risus nascetur morbi nisl,
                                        mi, in semper metus porttitor non. Augue nunc amet fringilla sit. Fringilla eget arcu sodales sed
                                        a, parturient fermentum amet scelerisque. Amet purus urna, dictumst aliquet aliquam natoque non,
                                        morbi pretium. Integer amet fermentum nibh viverra mollis consectetur arcu, ultrices dolor. Gravida
                                        purus arcu viverra eget. Aliquet tincidunt dignissim aliquam tempor nec id. Habitant suscipit sit
                                        semper duis odio amet, at.
                                    </div>
                                    <div class="text">Massa ultricies a arcu velit eget gravida purus ultrices eget. Orci, fames eu facilisi
                                        justo. Lacus netus a at sed justo vel leo leo pellentesque. Nulla ut laoreet luctus cum turpis et amet ac
                                        viverra. Vitae neque orci dui eu ac tincidunt. Egestas placerat egestas netus nec velit gravida consectetur
                                        laoreet vitae. Velit sed enim habitant habitant non diam. Semper tellus turpis tempus ac leo tempor. Ultricies
                                        amet, habitasse adipiscing bibendum consequat amet, sed. Id convallis suspendisse vitae, lacinia mattis cursus
                                        montes, dui. Tortor lobortis dignissim eget egestas. Eget enim auctor nunc eget mattis sollicitudin senectus diam.
                                        Tincidunt morbi egestas dignissim eget id aliquam
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End tabs-section -->
@endsection

