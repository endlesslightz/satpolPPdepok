<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <form method="post" action="<?php echo site_url('backend/API/laporan'); ?>" enctype="multipart/form-data">
        <input type="text" name="id" placeholder="id"/>
        <input type="text" name="lon" placeholder="lon"/>
        <input type="text" name="lat" placeholder="lat"/>
        <input type="text" name="judul" placeholder="judul"/>
        <input type="text" name="deskripsi" placeholder="deskripsi"/>
        <input type="text" name="mulai" placeholder="mulai"/>
        <input type="text" name="selesai" placeholder="selesai"/>

        <input type="file" name="foto" placeholder="lat"/>

<input type="submit" value="kirim" />
      </form>
  </body>
</html>
