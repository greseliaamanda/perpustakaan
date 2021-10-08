<?php 
    $id_buku = $_GET['id'];
    $q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE idbuku = '$id_buku'");
    $r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

    if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-')) {
        $foto = "admin-no-photo.jpg";
    } else {
        $foto = $r_tampil_buku['foto'];
    }
?>

<div id="content" class="p-4 p-md-5 pt-5">
<div id="label-page"><h3><b>Edit Data Buku</h3></div>
<div id="content">
    <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
    <table class="table table-borderless">
            <tr>
                <td>Sampul</td>
                <td class="isian-formulir">
                    <img src="images/<?php echo $foto; ?>" width="70px" height="75px">
                    <input type="file" name="foto" class="isian-formulir isian-formulir-border">
                    <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_buku['foto'];?>">
                </td>                
            </tr>
            <tr>
                <td>ID Buku</td>
                <td><input type="text" name="id_buku" value="<?php echo $r_tampil_buku['idbuku'];?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $r_tampil_buku['judul'];?>" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="pengarang" value="<?php echo $r_tampil_buku['pengarang'];?>" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
                </td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit" value="<?php echo $r_tampil_buku['penerbit'];?>" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>
</div>