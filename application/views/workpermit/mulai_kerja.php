<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Heading-->
        <div class="d-flex flex-column">
          <!--begin::Title-->
          <h2 class="text-white font-weight-bold my-2 mr-5"><?= $title ?></h2>
          <!--end::Title-->
          <!--begin::Breadcrumb-->
          <div class="d-flex align-items-center font-weight-bold my-2">
            <!--begin::Item-->
            <a href="#" class="opacity-75 hover-opacity-100">
              <i class="flaticon2-shelter text-white icon-1x"></i>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pekerjaan</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Mulai Kerja</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>
      <!--end::Info-->
    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Row-->
      <div class="row">
        <div class="col-lg-12">
          <!--begin::Example-->
          <!--begin::Card-->
          <div class="card card-custom" data-card="true" id="kt_card_1">
            <div class="card-header">
              <div class="card-title">
                <h3 class="card-label">Foto Persiapan Sebelum Kerja</h3>
              </div>
            </div>
            <div class="card-body">
              <!--begin::Form-->
              <div id="main">
                <div id="header">
                  <h1 style="text-align: center;">Seret & letakan Foto Sebelum Kerja kesini</h1>
                </div>
              </div>

              <div id="content">
                <form class="dropzone" id="file_upload_awal">
                  <?php foreach ($izin as $iz) : ?>
                    <input type="text" name="id_complain" value="<?= $iz['id_complain']; ?>" hidden>
                    <input type="text" name="id_izin_kerja" value="<?= $iz['id']; ?>" hidden>
                  <?php endforeach; ?>
                  <div class="dz-message">
                    <h3>Letakkan file di sini</h3> Atau <strong>klik</strong> untuk mengunggah
                  </div>
                </form>
                <br>
                <button type="submit" id="upload_btn_awal" class="btn btn-info">Unggah</button>
                <a href="#" id="kirim" class="btn btn-success float-right disabled">Mulai Pekerjaan</a>
              </div>
              <!--end::Form-->
            </div>
            <!--end::Card-->
          </div>
          <!--end::Column-->
        </div>
      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<!--end::Content-->