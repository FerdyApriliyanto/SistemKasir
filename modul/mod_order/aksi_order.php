<?php

session_start();
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'order' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $tanggal = format_indotosql($_POST['tanggal']);
        $cek = mysqli_query($koneksi,"SELECT no_meja FROM d_order WHERE no_meja = 'no_meja'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Order yang anda masukkan sudah ada. Periksa kembali data Order yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi,"INSERT INTO d_order(no_meja,
                                    tanggal,nama_pembeli,nama_masakan,harga,keterangan,status_order)
                            VALUES(
                                    '$_POST[no_meja]',
                                    '$tanggal',
                                    '$_POST[nama_pembeli]',
                                    '$_POST[nama_masakan]',
                                    '$_POST[harga]',
                                    '$_POST[keterangan]',
                                    '$_POST[status_order]')") or die(mysqli_error());

                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }

     elseif ($module == 'order' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi,"DELETE FROM d_order WHERE id_order='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?modul=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
    }

?>
