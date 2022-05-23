<!--begin::Footer-->
<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted font-weight-bold mr-2">2021©</span>
            <a href="#" class="text-dark-75 text-hover-primary">PT INTI</a>
        </div>
        <!--end::Copyright-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->


<script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1200
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#6993FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1E9FF",
                    "secondary": "#ECF0F3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#212121",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };
</script>

<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?= base_url('assets_pengguna/') ?>plugins/global/plugins.bundle.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/prismjs/prismjs.bundle.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/scripts.bundle.js"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page CALENDER)-->
<script src="<?= base_url('assets_pengguna/') ?>plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="<?= base_url('assets_pengguna/') ?>js/locale-all.js"></script>
<!--end::Page Vendors-->


<script type="text/javascript">
    var KTCalendarBasic = function() {

        return {
            //main function to initiate the module
            init: function() {
                var todayDate = moment().startOf('day');
                var YM = todayDate.format('YYYY-MM');
                var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                var TODAY = todayDate.format('YYYY-MM-DD');
                var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                var calendarEl = document.getElementById('kt_calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
                    themeSystem: 'bootstrap',

                    isRTL: KTUtil.isRTL(),

                    locale: 'ind',

                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },


                    height: 800,
                    contentHeight: 780,
                    aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio

                    nowIndicator: true,
                    now: TODAY + 'T09:25:00', // just for demo

                    views: {
                        dayGridMonth: {
                            buttonText: 'Bulan'
                        },
                        timeGridWeek: {
                            buttonText: 'Minggu'
                        },
                        timeGridDay: {
                            buttonText: 'Hari'
                        }
                    },

                    defaultView: 'dayGridMonth',
                    defaultDate: TODAY,

                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                    navLinks: true,
                    events: [<?php foreach ($agenda as $a) : ?> {
                                title: '<?= $a['kegiatan'] ?>',
                                judul_kegiatan: 'Judul Kegiatan : <?= $a['kegiatan'] ?>',
                                nama_peminjaman: '<?= $a['nama_peminjam'] ?>',
                                ruangan: '<?= $a['ruangan'] ?>',
                                jenis_layout: '<?= $a['jenis_layout'] ?>',
                                jumlah_orang: '<?= $a['jumlah_orang'] ?>',
                                start: '<?= substr($a['tanggal_mulai'], 0, 7) ?>' + '<?= substr($a['tanggal_mulai'], 7, 3) ?>T<?= $a['waktu_mulai'] ?>',
                                end: '<?= substr($a['tanggal_selesai'], 0, 7) ?>' + '<?= substr($a['tanggal_selesai'], 7, 3) ?>T<?= $a['waktu_selesai'] ?>',
                                className: "fc-event-info"
                            },
                        <?php endforeach; ?>
                    ],

                    eventRender: function(info) {
                        var element = $(info.el);
                        if (info.event.extendedProps && info.event.extendedProps.judul_kegiatan) {
                            if (element.hasClass('fc-day-grid-event')) {
                                element.data('content', info.event.extendedProps.judul_kegiatan);
                                element.data('placement', 'top');
                                KTApp.initPopover(element);
                            } else if (element.hasClass('fc-time-grid-event')) {
                                element.find('.fc-title').append('<div class="fc-new_line"> <br> </div>' + '<div class="fc-nama_peminjam"><text style="font-weight: bolder;"> Nama Peminjam :</text> ' + info.event.extendedProps.nama_peminjaman + '</div>' + '<div class="fc-ruangan"><text style="font-weight: bolder;"> Ruangan :</text> ' + info.event.extendedProps.ruangan + '</div>' + '<div class="fc-jenis_layout"><text style="font-weight: bolder;"> Jenis Layout : </text>' + info.event.extendedProps.jenis_layout + '</div>' + '<div class="fc-jumlah_orang" style="font-weight: bolder;"> Jumlah Orang : <span class="label label-danger label-inline mr-2">' + info.event.extendedProps.jumlah_orang + '</span>');
                            } else if (element.find('.fc-list-item-title').lenght !== 0) {
                                element.find('.fc-list-item-title').append('<div class="fc-ruangan">' + info.event.extendedProps.ruangan + '</div>');
                            }
                        }
                    }
                });

                calendar.render();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTCalendarBasic.init();
    });
</script>
</body>
<!--end::Body-->

</html>