<div id="content" class="p-4 p-md-5 pt-5">
<div id="label-page"><h3>Tampil Data Anggota</h3></div>
<div class="form-inline">
    <button type="button" class="btn btn-primary">
        <a href="index.php?p=anggota-input" class="tombol" style="color:white">Tambah Anggota</a></button>
        <a target="_blank" href="pages/cetak.php"><img src="images/print.png" height="50px" height="50px" style="margin-right:650px"></a>
        
            <div style="right:0px">
                <form method=post>
                    <input type="text" name="pencarian">
                    <input type="submit" name="search" value="search" class="tombol">
                </form>
            </div>
        </div>

    <!--table-->
    <table id="example" class="table table-hover">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">ID Anggota</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $batas = 5;
            extract ($_GET);
            if(empty($hal)){
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            }else{
                $posisi = ($hal-1)*$batas;
                $nomor = $posisi+1;
            }
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
                if($pencarian != ""){
                    $sql = "SELECT * FROM tbanggota WHERE nama LIKE '%$pencarian%'
                    OR idanggota LIKE '%$pencarian%'
                    OR jeniskelamin LIKE '%$pencarian%'
                    OR alamat LIKE '%$pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                } else{
                    $query= "SELECT * FROM tbanggota LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tbanggota";
                    $no = $posisi * 1;
                }
            }
            else{
                $query = "SELECT *FROM tbanggota LIMIT $posisi, $batas";
                $queryJml = "SELECT *FROM tbanggota";
                $no = $posisi*1;
            }
            $q_tampil_anggota = mysqli_query($db, $query);
            if(mysqli_num_rows($q_tampil_anggota)>0){
                while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
                    if(empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto']=='-')){
                        $foto = "admin-no-photo.jpg";
                    }
                    else{
                        $foto = $r_tampil_anggota['foto'];
                    }
                ?>
                <tr>
                    <td><?php echo $nomor;?></td>
                    <td><?php echo $r_tampil_anggota['idanggota'];?></td>
                    <td><?php echo $r_tampil_anggota['nama'];?></td>
                    <td><img src="images/<?php echo $foto;?>" width=70px height=70px></td>
                    <td><?php echo $r_tampil_anggota['jeniskelamin'];?></td>
                    <td><?php echo $r_tampil_anggota['alamat'];?></td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm"><a target="_blank" href="pages/cetak_kartu.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol" style="color:white">Cetak kartu</a></div>
                        <button type="button" class="btn btn-warning btn-sm"><a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota'];?>" class="tombol" style="color:white">Edit</a></div>
                        <button type="button" class="btn btn-danger btn-sm"><a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="tombol" style="color:white">Hapus</a></button>
                    </td>
                </tr>
                <?php
                $nomor++;
                }
            }
            else{
                echo "<tr><td colspan=6>Data tidak ditemukan</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        if(isset($_POST['pencarian'])){
            if($_POST['pencarian']!=''){
                echo "<div style=\"float:left;\">";
                $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
                echo "Data hasil pencarian: <b>$jml</b>";
                echo "</div>";
            }
        } else{
            ?>
            <div style="float: left;">
            <?php
            $jml= mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Jumlah data : <b>$jml</b>";
            ?>
            </div>
            <div class="pagination">
                <?php
                $jml_hal = ceil($jml / $batas);
                for($i=1; $i<=$jml_hal; $i++){
                    if($i !=$hal){
                        echo "<button><a href=\"?p=anggota&hal=$i\">$i</a></button>";
                    }
                    else{
                        echo "<button><a class=\"active\">$i</a></button>";
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
</div>
    