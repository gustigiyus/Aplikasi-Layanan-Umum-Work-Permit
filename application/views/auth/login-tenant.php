<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Content-->
        <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
            <!--begin::Wrapper-->
            <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                <!--begin::Logo-->
                <a href="#" class="login-logo pb-xl-20 pb-15">
                    <img src="<?= base_url('assets/img/logo/') ?>logo_inti.png" class="max-h-50px" alt="" />
                </a>
                <!--end::Logo-->
                <?= $this->session->flashdata('message'); ?>
                <!--begin::Signin-->
                <div class="login-form">
                    <!--begin::Form-->
                    <form class="form" id="kt_login_singin_form" method="post" action="<?= base_url('auth/loginTenant'); ?>">
                        <!--begin::Title-->
                        <div class="pb-5 pb-lg-15">
                            <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Masuk ke aplikasi</h3>
                            <div class="text-muted font-weight-bold font-size-h4">Baru disini?
                                <a href="<?= base_url('auth/registrtionTenant'); ?>" class="text-primary font-weight-bolder">Buat Akun Sekarang</a>
                            </div>
                        </div>
                        <!--begin::Title-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Alamat Email</label>
                            <input autocomplete="off" type="text" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" id="email" name="email" placeholder="Masukan Email" value="<?= set_value('email'); ?>">
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Kata Sandi</label>
                                <a href="<?= base_url('auth/forgetpassword'); ?>" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Tidak ingat kata sandi ?</a>
                            </div>
                            <input autocomplete="off" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" id="password" name="password" placeholder="Masukan Password">
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="pb-lg-0 pb-5">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 float-left">Masuk</button>
                            <a href="<?= base_url('landingpage/login'); ?>" type="button" class="btn btn-info font-weight-bolder font-size-h6 px-8 py-4 float-right">Beranda</a>
                        </div>
                        <!--end::Action-->
                    </form>
                    <!--end::Form-->
                    <!--begin::Action-->

                </div>
                <!--end::Signin-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--begin::Content-->
        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(<?= base_url('assets_pengguna'); ?>/media/svg/illustrations/login-visual-4.svg);">
                <!--begin::Aside title-->
                <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">Daftar dan
                    <br />Masuk ke
                    <br />Aplikasi!
                </h3>
                <!--end::Aside title-->
            </div>
        </div>
        <!--end::Aside-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->