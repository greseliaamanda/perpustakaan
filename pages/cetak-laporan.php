<?php 
ob_start(); 
include '../koneksi.php';
?>

<h3>Laporan Transaksi</h3>
        <div id="content">
            <table border="1" id="table-tampil">
                <thead>
                <tr>
                    <th id="label-tampil-no">No</td>
                    <th>ID Transaksi</th>
                    <th>ID Anggota</th>
                    <th>ID Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $nomor = 1;
                        $query = "SELECT * FROM tbtransaksi ORDER BY idpeminjaman ASC";
                        $q_tampil_transaksi = mysqli_query($db, $query);

                        if(mysqli_num_rows($q_tampil_transaksi) > 0){
                            while($r_tampil_transaksi=mysqli_fetch_array($q_tampil_transaksi)){
                    ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $r_tampil_transaksi['idpeminjaman'];?></td>
                        <td><?php echo $r_tampil_transaksi['idanggota'];?></td>
                        <td><?php echo $r_tampil_transaksi['idbuku'];?></td>
                        <td><?php echo $r_tampil_transaksi['tanggalpinjam'];?></td>
                        <td><?php echo $r_tampil_transaksi['tanggalkembali'];?></td>
                        <td><?php echo $r_tampil_transaksi['status'];?></td>
                    </tr>
                        <?php
                                $nomor++;
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
<?php 

$html = ob_get_clean(); 
use Dompdf\Dompdf; 
require_once '../vendor/autoload.php'; 
$dompdf = new Dompdf(); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('A4', 'portrait'); 
$dompdf->render(); 
$dompdf->stream(); 
?>