<?php foreach ($cetak as $c) {?>
<html lang="id"><head>
    <title>Cetak Surat</title>
    <link href="http://sipekan.pekalongankota.go.id/template/gentelella/css/cetaksurat.css" rel="stylesheet">
  </head>
  <body onload="print()">
  <div class="header">
    <img src="http://sipekan.pekalongankota.go.id/template/gentelella/images/logo.png" width="80" style="margin-bottom: 1mm">
    <p>
      PEMERINTAH KOTA PEKALONGAN <br>
      DINAS KELAUTAN DAN PERIKANAN    </p>
    <p>
      SURAT PENDAFTARAN KAPAL PERIKANAN <br>
      NO : <?=$c['no_surat']?>    </p>
  </div>
  <div class="isi">
    <div class="isi-kiri">
      <div class="column header">
        KEPEMILIKAN
      </div>
      <div class="column" style="min-height: 30mm">
        <table>
          <tbody><tr>
            <td width="40%">NAMA PEMILIK</td>
            <td>:</td>
            <td><?=$c['nama']?> </td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?=$c['nik']?></td>
          </tr>
          <tr>
            <td>ALAMAT</td>
            <td>:</td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3" style="padding-left: 3mm">
              <?=$c['alamat']?> RT <?=$c['rt']?> RW <?=$c['rw']?>, <?=$c['kelurahan']?>, <?=$c['alamat']?>, <?=$c['kota']?>, <?=$c['provinsi']?>           </td>
          </tr>
        </tbody></table>
      </div>
      <div class="column header">
        IDENTITAS KAPAL
      </div>
      <div class="column" style="min-height: 20mm">
        <table>
          <tbody><tr>
            <td width="5%">1.</td>
            <td width="42%">NAMA KAPAL</td>
            <td width="5%">:</td>
            <td><?=$c['nama_kapal']?></td>
          </tr>
          <tr>
            <td>2.</td>
            <td>TANDA SELAR</td>
            <td>:</td>
            <td><?=$c['tanda_selar']?></td>
          </tr>
        </tbody></table>
      </div>
      <div class="column header">
        JENIS KAPAL / ALAT PENANGKAP IKAN
      </div>
      <div class="column">
        <table>
          <tbody><tr>
            <td width="5%">1.</td>
            <td width="50%">JENIS KAPAL</td>
            <td width="5%">:</td>
            <td><?=$c['bahan']?></td>
          </tr>
          <tr>
            <td width="5%">2.</td>
            <td width="50%">ALAT PENANGKAP IKAN</td>
            <td width="5%">:</td>
            <td><?=$c['jenis_alat']?></td>
          </tr>
        </tbody></table>
      </div>
      <div class="column header">
        SPESIFIKASI KAPAL
      </div>
      <div class="column">
        <table>
          <tbody><tr>
            <td width="5%">1.</td>
            <td width="50%">BERAT KOTOR</td>
            <td width="5%">:</td>
            <td><?=$c['berat']?> GT</td>
          </tr>
          <tr>
            <td width="5%">2.</td>
            <td width="50%">KEKUATAN MESIN</td>
            <td width="5%">:</td>
            <td><?=$c['kekuatan']?> PK</td>
          </tr>
          <tr>
            <td width="5%">3.</td>
            <td width="50%">MUATAN BERSIH</td>
            <td width="5%">:</td>
            <td><?=$c['muatan']?> NT</td>
          </tr>
          <tr>
            <td width="5%">4.</td>
            <td width="50%">MEREK MESIN</td>
            <td width="5%">:</td>
            <td><?=$c['merk_mesin']?></td>
          </tr>
          <tr>
            <td width="5%">5.</td>
            <td width="50%">NO. MESIN</td>
            <td width="5%">:</td>
            <td><?=$c['no_mesin']?></td>
          </tr>
          <tr>
            <td width="5%"></td>
            <td width="50%"></td>
            <td width="5%"></td>
            <td></td>
          </tr>
        </tbody></table>
      </div>
      <div class="column header">
        CATATAN
      </div>
      <div class="column" style="border-bottom: 0; min-height: 25mm">
        <?=$c['catatan']?>     </div>
    </div>
    <div class="isi-kanan">
      <div class="column header">
        REFERENSI
      </div>
      <div class="column" style="height: 40mm"> <!-- 30mm -->
        <table>
          <tbody><tr>
            <td width="35%">Pas Kecil No</td>
            <td>:</td>
            <td><?=$c['no_pas']?></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <?php 
                    $bulan = array (
                              1 =>   'JANUARI',
                              'FEBRUARI',
                              'MARET',
                              'APRIL',
                              'MEI',
                              'JUNI',
                              'JULI',
                              'AGUSTUS',
                              'SEPTEMBER',
                              'OKTOBER',
                              'NOVEMBER',
                              'DESEMBER'
                            );
                  ?>
            <td><?=date('d', strtotime($c['tgl_terbit']))?> <?=$bulan[(int)date('m', strtotime($c['tgl_terbit']))]?> <?=date('Y', strtotime($c['tgl_terbit']))?></td>
          </tr>
          <tr>
            <td>Diterbitkan oleh</td>
            <td>:</td>
            <td><?=$c['penerbit']?></td>
          </tr>
        </tbody></table>
      </div>
      <div class="column header">
        DAERAH PENANGKAPAN
      </div>
      <div class="column" style="min-height: 13.2mm">
        <center><?=$c['penangkapan']?></center>
      </div>
      <div class="column header">
        PELABUHAN PANGKALAN
      </div>
      <div class="column center">
        <?=$c['pangkalan']?>    </div>
      <div class="column header" style="min-height: 10mm">
        ANAK BUAH KAPAL
      </div>
      <div class="column center">
         orang
      </div>
      <div class="column header">
        MASA BERLAKU
      </div>
      <div class="column" style="height: 20mm"> <!-- 30mm -->
        SURAT PENDAFTARAN KAPAL PERIKANAN INI BERLAKU SEJAK <br>
        <?=date('d', strtotime($c['tgl_terbit']))?> <?=$bulan[(int)date('m', strtotime($c['tgl_terbit']))]?> <?=date('Y', strtotime($c['tgl_terbit']))?> s/d
        <?=date('d', strtotime($c['tgl_kadaluwarsa']))?> <?=$bulan[(int)date('m', strtotime($c['tgl_kadaluwarsa']))]?> <?=date('Y', strtotime($c['tgl_kadaluwarsa']))?>   </div>
      <div class="column" style="border-bottom: 0">
        <div class="ttd">
          Pekalongan, <?php echo date('d').' '.$bulan[(int)date('m')].' '.date('Y');?><br>
          KEPALA DINAS KELAUTAN DAN PERIKANAN KOTA PEKALONGAN
        </div>
        <table style="margin-left: 3mm; margin-bottom: 2mm">
          <tbody><tr>
            <td width="30%">NAMA</td>
            <td>:</td>
            <td>Ir. AGUS JATI WALUYO</td>
          </tr>
          <tr>
            <td>NIP</td>
            <td>:</td>
            <td>196201051986031012</td>
          </tr>
          <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td>KEPALA DINAS</td>
          </tr>
        </tbody></table>
      </div>
    </div>
  </div>
  <div style="clear: both"></div>
  <div class="footer">
    Apabila ada data atau informasi dan atau dokumen pendukung penerbitan surat ini yang ternyata di kemudian hari terbukti tidak benar dan atau tidak absah, maka surat ini akan dicabut
  </div>
<?php } ?>


<script type="text/javascript">
  window.onload = function() { window.print(); }
</script></body></html>