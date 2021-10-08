<?php 
include 'proses/proses-list-buku.php';
include 'proses/proses-list-anggota.php';

    $id_peminjaman = $_GET['id'];
    $q_tampil_peminjaman = mysqli_query($db, "SELECT * FROM tbtransaksi WHERE idpeminjaman = '$id_peminjaman'");
    $r_tampil_peminjaman = mysqli_fetch_array($q_tampil_peminjaman);

?>

<div id="content" class="p-4 p-md-5 pt-5">
<div id="label-page"><h3><b>Edit Data Peminjaman</h3></div>
<div id="content">
    <form action="proses/peminjaman-edit-proses.php" method="post" enctype="multipart/form-data">
    <table class="table table-borderless">
        <tr>
                    <td class="label-formulir">ID Transaksi</td>
                    <td class="isian-formulir"><input type="type" name="id_peminjaman" value="<?php echo $r_tampil_peminjaman['idpeminjaman'];?>" readonly="readonly" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Anggota</td>
                    <td class="isian-formulir">
                        <select name="id_anggota">
                            <?php foreach ($data_anggota as $anggota) : ?>
                                <option value="<?php echo $anggota['idanggota'] ?>" <?php echo ($anggota['idanggota'] == $r_tampil_peminjaman['idanggota']) ? 'selected' : '' ; ?> ><?php echo $anggota['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Buku</td>
                    <td class="isian-formulir">
                        <select name="id_buku">
                            <?php foreach ($data_buku as $buku) : ?>
                                <option value="<?php echo $buku['idbuku'] ?>" <?php echo ($buku['idbuku'] == $r_tampil_peminjaman['idbuku']) ? 'selected' : '' ; ?> ><?php echo $buku['judul'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Tanggal Pinjam</td>
                    <td class="isian-formulir"><input type="date" name="tanggalpinjam" value="<?php echo $r_tampil_peminjaman['tanggalpinjam'];?>" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Tanggal Kembali</td>
                    <td class="isian-formulir"><input type="date" name="tanggalkembali" value="<?php echo $r_tampil_peminjaman['tanggalkembali'];?>" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
                </tr>
        </table>
    </form>
</div>
</div>