<div id="content" class="p-4 p-md-5 pt-5">
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="label-page"><h3><b>Input Data Buku</h3></div>
    <div id="content">
        <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td class="label-formulir">FOTO</td>
                    <td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">ID Buku</td>
                    <td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Judul</td>
                    <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Pengarang</td>
                    <td class="isian-formulir"><input type="text" name="pengarang" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Penerbit</td>
                    <td class="isian-formulir"><input type="text" name="penerbit" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
                </tr>

            </table>
        </form>
    </div>
</body>
</html>
</div>