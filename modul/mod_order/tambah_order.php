<?php
$aksi = "modul/mod_order/aksi_order.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=order">Data Order</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Order</h2>
        </div>

         



        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?modul=order&act=tambah" method="post">
                <fieldset>

                   

                    <div class="control-group">
                        <label class="control-label">No Meja</label>
                        <div class="controls">
                            <input type="text" id="no_meja" name="no_meja" class="form-field">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tanggal</label>
                        <div class="controls">
                            <input type="text" name="tanggal" value="<?php echo date("d/m/Y");?>"  class="form-field datepicker"">
                            <span></span>
                        </div>
                    </div>
    

                    <div class="control-group">
                        <label class="control-label">Nama Pembeli</label>
                        <div class="controls">
                            <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-field" >
                            <span></span>
                        </div>
                    </div>

                      <div class="control-group">
                        <label class="control-label">Masakan</label>
                        <div class="controls">
                           <select name="nama_masakan" class="form-control" class="form-control form-control-md" id="" onchange='changeValueNama(this.value)' required="required">
                            <option value="" disabled="disabled" selected="selected"> Nama Masakan</option>
                            <?php
                                $con = mysqli_connect("localhost", "root","", "db_kasir");
                                $query=mysqli_query($con, "select * from d_masakan order by nama_masakan asc");
                                $result = mysqli_query($con, "select * from d_masakan");
                                $jsArrayNama = "var idTipe = new Array();\n";
                                while ($row = mysqli_fetch_array($result)) {
                                echo '<option name="nama_masakan"  value="' . $row['nama_masakan'] . '">' . $row['nama_masakan'] . '</option>';
                                $jsArrayNama .= "idTipe['" . $row['nama_masakan'] . "'] = 
                                {
                                harga:'".addslashes($row['harga'])."'};\n";
                                }
                            ?>
                </select>
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Harga</label>
                        <div class="controls">
                            <input type="text" id="harga" name="harga" class="form-field" readonly="readonly">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <input type="text" id="keterangan" name="keterangan" class="form-field">
                            <span></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Status Order</label>
                        <div class="controls">
                            <input type="text" id="status_order" name="status_order" class="form-field">
                            <span></span>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button id="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>
             <script type="text/javascript">
        <?php echo $jsArrayNama; ?>
        function changeValueNama(nama_masakan){
            console.log(nama_masakan);
            console.log(idTipe);
            document.getElementById('harga').value = idTipe[nama_masakan].harga;    
        }
        </script>
        </div>
    </div><!--/span-->
</div><!--/row-->