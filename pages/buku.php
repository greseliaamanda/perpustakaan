<div id="content" class="p-4 p-md-5 pt-5">
<div id="label-page"><h3>Tampil Data Buku</h3></div>
<div class="form-inline">
    <button type="button" class="btn btn-primary">
        <a href="index.php?p=buku-input" class="tombol" style="color:white">Tambah Buku</a></button>
            <div style="right:0px">
                <form method=post style="margin-left:730px">
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
            <th scope="col">ID Buku</th>
            <th scope="col">Judul</th>
            <th scope="col">Sampul</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
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
                    $sql = "SELECT * FROM tbbuku WHERE judul LIKE '%$pencarian%'
                    OR idbuku LIKE '%$pencarian%'
                    OR pengarang LIKE '%$pencarian%'
                    OR penerbit LIKE '%$pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                } else{
                    $query= "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tbbuku";
                    $no = $posisi * 1;
                }
            }
            else{
                $query = "SELECT *FROM tbbuku LIMIT $posisi, $batas";
                $queryJml = "SELECT *FROM tbbuku";
                $no = $posisi*1;
            }
            $q_tampil_buku = mysqli_query($db, $query);
            if(mysqli_num_rows($q_tampil_buku)>0){
                while($r_tampil_buku=mysqli_fetch_array($q_tampil_buku)){
                    if(empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto']=='-')){
                        $foto = "buku-kosong.jpg";
                    }
                    else{
                        $foto = $r_tampil_buku['foto'];
                    }
        ?>
                <tr>
                <td><?php echo $nomor;?></td>
                    <td><?php echo $r_tampil_buku['idbuku'];?></td>
                    <td><?php echo $r_tampil_buku['judul'];?></td>
                    <td><img src="images/<?php echo $foto;?>" width=70px height=70px></td>
                    <td><?php echo $r_tampil_buku['pengarang'];?></td>
                    <td><?php echo $r_tampil_buku['penerbit'];?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm"><a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku'];?>" class="tombol" style="color:white">Edit</a></div>
                        <button type="button" class="btn btn-danger btn-sm"><a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku'];?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="tombol" style="color:white">Hapus</a></button>
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
                        echo "<button><a href=\"?p=buku&hal=$i\">$i</a></button>";
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
    