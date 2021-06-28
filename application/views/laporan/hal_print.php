<style>
    body {
        background: rgb(204, 204, 204);
    }

    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    page[size="A4"][layout="portrait"] {
        width: 29.7cm;
        height: 21cm;
    }

    @media print {

        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }
</style>

<page size="A4">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table align="center" border="0" cellpadding="1" style="width: 600px;">
                <tbody>
                    <tr>
                        <td>
                            <table border="2" style="width: 600px;">
                                <tbody>
                                    <tr>
                                        <th rowspan="3" style="text-align: center;">
                                            <h1 style="font-weight: bold; text-align: center;"> INTI </h1>
                                        </th>
                                        <th rowspan="3" style="text-align: center;">
                                            <h6 style="font-weight: bold;"> IZIN KERJA </h6>
                                            <h6 style="font-weight: bold;"> PEEKRJAAN BERESIKO TINGGI </h6>
                                        </th>
                                        <th colspan="2" style="text-align: center;">No.QMS5-SUP05-004-01</th>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;">Edisi : 01</td>
                                        <td style=" font-weight: bold; text-align: center;">Revisi : -</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style=" font-weight: bold; text-align: center;">Halaman 1 dari 3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px;">
                            <table border="0" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <td width="40" style="font-weight: bolder;">No</td>
                                        <td><span style="font-size: small;">: </span></td>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="150">
                            <table border="0" cellpadding="1" style="width: 600px;">
                                <?php foreach ($izin as $iz) : ?>
                                    <tbody>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">1.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">Berdasarkan WO/PO No</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;">QMS5-SUP05-004-01-999102</span></td>
                                            <td style="float: right; font-weight: bolder;"><span style="font-size: small;">(Mohon Dilampirkan)</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">2.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">Nama Kontraktor/Tenant</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;"> <?= $iz['nama_kontraktor']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">3.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">Nama Penanggung Jawab</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;"><?= $iz['nama_penanggung_jawab']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">4.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">No. Telp. Kantor</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;"><?= $iz['no_telp_kantor']; ?></span></td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="120">
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            No
                                        </th>
                                        <th style="text-align: center;">
                                            Nama Pekerja
                                        </th>
                                        <th style="text-align: center;">
                                            Lokasi Pekerja
                                        </th>
                                        <th style="text-align: center;">
                                            Jenis Pekerjaan Kegiatan
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pekerja as $pe) : ?>
                                        <?php $i = 1; ?>
                                        <tr style="text-align: center;">
                                            <td class="align-middle;"><?= $i; ?></td>
                                            <td class="align-middle;"><?= $pe['nama_pekerja']; ?></td>
                                            <td class="align-middle;"><?= $pe['jenis_pekerjaan']; ?></td>
                                            <td class="align-middle;"><?= $pe['lokasi_pekerjaan']; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>

                                <tfoot>
                                    <th></th>
                                    <th style="text-align: center;">Jumlah Tenaga Kerja</th>
                                    <th style="text-align: center;">21 Orang</th>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px;">
                            <table border="0" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th>
                                            Waktu Pelaksanaan Kerja
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            Hari/Tanggal
                                        </th>
                                        <th style="text-align: center;">
                                            Mulai
                                        </th>
                                        <th style="text-align: center;">
                                            Selesai
                                        </th>
                                        <th style="text-align: center;">
                                            Catatan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($izin as $iz) : ?>
                                        <tr style="text-align: center;">
                                            <td class="align-middle;"><?= $iz['waktu_mulai']; ?></td>
                                            <td class="align-middle;"><?= $iz['waktu_akhir']; ?></td>
                                            <td class="align-middle;"><?= $iz['tanggal_dikerjakan']; ?></td>
                                            <td class="align-middle;"> Belum dipanggil </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 100px;">
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Penerbit : Fungsi Bagian Umum
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 1px;">
                            <table style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10px;">
                                            Yang memerlukan salinana/copy dokumen ini harus menghubungi Bagian Umum
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</page>


<page size="A4">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table align="center" border="0" cellpadding="1" style="width: 600px;">
                <tbody>
                    <tr>
                        <td>
                            <table border="2" style="width: 600px;">
                                <tbody>
                                    <tr>
                                        <th rowspan="3" style="text-align: center;">
                                            <h1 style="font-weight: bold; text-align: center;"> INTI </h1>
                                        </th>
                                        <th rowspan="3" style="text-align: center;">
                                            <h6 style="font-weight: bold;"> IZIN KERJA </h6>
                                            <h6 style="font-weight: bold;"> PEEKRJAAN BERESIKO TINGGI </h6>
                                        </th>
                                        <th colspan="2" style="text-align: center;">No.QMS5-SUP05-004-01</th>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;">Edisi : 01</td>
                                        <td style=" font-weight: bold; text-align: center;">Revisi : -</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style=" font-weight: bold; text-align: center;">Halaman 2 dari 3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px;">
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            No
                                        </th>
                                        <th colspan="2" style="text-align: center;">
                                            Jenis Potensi Bahaya terkait pekerjaan :
                                        </th>
                                        <th colspan="2" style="text-align: center;">
                                            Tindak Pencegahaan :
                                        </th>
                                    </tr>
                                </thead>
                                <?php foreach ($JP as $jp) : ?>
                                    <?php $isi[] = $jp['id_JP']; ?>
                                <?php endforeach; ?>
                                <?php foreach ($master_JP as $mjp) : ?>
                                    <tbody>
                                        <tr style="text-align: center;">
                                            <td class="align-middle;">1</td>
                                            <td class="align-middle;"><?= $mas[] = $mjp['nama_Jenis_Potensi']; ?></td>
                                            <td class="align-middle;"></td>
                                            <td class="align-middle;"></td>
                                            <td class="align-middle;"></td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px;">
                            <table border="0" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <td width="40" style="font-weight: bolder;">No</td>
                                        <td><span style="font-size: small;">: </span></td>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="150">
                            <table border="0" cellpadding="1" style="width: 600px;">
                                <?php foreach ($izin as $iz) : ?>
                                    <tbody>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">1.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">Berdasarkan WO/PO No</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;">QMS5-SUP05-004-01-999102</span></td>
                                            <td style="float: right; font-weight: bolder;"><span style="font-size: small;">(Mohon Dilampirkan)</span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">2.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">Nama Kontraktor/Tenant</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;"> <?= $iz['nama_kontraktor']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">3.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">Nama Penanggung Jawab</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;"><?= $iz['nama_penanggung_jawab']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: small; font-weight: bolder;">4.</span></td>
                                            <td><span style="font-size: small; font-weight: bolder;">No. Telp. Kantor</span></td>
                                            <td><span style="font-size: small;">:</span></td>
                                            <td><span style="font-size: small; text-transform: uppercase;"><?= $iz['no_telp_kantor']; ?></span></td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="120">
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            No
                                        </th>
                                        <th style="text-align: center;">
                                            Nama Pekerja
                                        </th>
                                        <th style="text-align: center;">
                                            Lokasi Pekerja
                                        </th>
                                        <th style="text-align: center;">
                                            Jenis Pekerjaan Kegiatan
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($pekerja as $pe) : ?>
                                        <?php $i = 1; ?>
                                        <tr style="text-align: center;">
                                            <td class="align-middle;"><?= $i; ?></td>
                                            <td class="align-middle;"><?= $pe['nama_pekerja']; ?></td>
                                            <td class="align-middle;"><?= $pe['jenis_pekerjaan']; ?></td>
                                            <td class="align-middle;"><?= $pe['lokasi_pekerjaan']; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>

                                <tfoot>
                                    <th></th>
                                    <th style="text-align: center;">Jumlah Tenaga Kerja</th>
                                    <th style="text-align: center;">21 Orang</th>
                                </tfoot>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 30px;">
                            <table border="0" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th>
                                            Waktu Pelaksanaan Kerja
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            Hari/Tanggal
                                        </th>
                                        <th style="text-align: center;">
                                            Mulai
                                        </th>
                                        <th style="text-align: center;">
                                            Selesai
                                        </th>
                                        <th style="text-align: center;">
                                            Catatan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($izin as $iz) : ?>
                                        <tr style="text-align: center;">
                                            <td class="align-middle;"><?= $iz['waktu_mulai']; ?></td>
                                            <td class="align-middle;"><?= $iz['waktu_akhir']; ?></td>
                                            <td class="align-middle;"><?= $iz['tanggal_dikerjakan']; ?></td>
                                            <td class="align-middle;"> Belum dipanggil </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 100px;">
                            <table border="2" style="width: 600px;">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>
                                            Penerbit : Fungsi Bagian Umum
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 1px;">
                            <table style="width: 600px;">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10px;">
                                            Yang memerlukan salinana/copy dokumen ini harus menghubungi Bagian Umum
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</page>