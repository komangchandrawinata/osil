<div class="row">
    <label class="col-sm-3 col-form-label">Haemoglobin</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="haemoglobin">
    </div>
    <label class="col-sm-3 col-form-label">(g/dL)</label>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">Hematokrit</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="hematokrit">
    </div>
    <label class="col-sm-3 col-form-label">(%)</label>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">Eritrosit</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="eritrosit_h">
    </div>
    <label class="col-sm-3 col-form-label">(juta/mm³)</label>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">Leukosit</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="leukosit_h">
    </div>
    <label class="col-sm-3 col-form-label">(μl)</label>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">Trombosit</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="trombosit">
    </div>
    <label class="col-sm-3 col-form-label">(μl)</label>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">Laju Endap Darah</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="laju_endap">
    </div>
    <label class="col-sm-3 col-form-label">(mm/jam)</label>
</div>

<hr>

<h6 class="m-0 font-weight-bold text-gray-600">Hitung Jenis Leukosit</h6>
<br>

<div class="row">
    <label class="col-sm-3 col-form-label">- Basofil</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="basofil">
    </div>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">- Eosinofil</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="eosinofil">
    </div>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">- Neutrofil Batang</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="staf">
    </div>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">- Neutrofil Segmen</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="segmen">
    </div>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">- Limfosit</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="limfosit">
    </div>
</div>

<div class="row">
    <label class="col-sm-3 col-form-label">- Monosit</label>
    <div class="form-group col-lg-6">
        <input type="text" class="form-control form-control-user" name="monosit">
    </div>
</div>


<!--Result Hasil-->


<!-- collapse 001 -->
<?php $sq_he = mysqli_query($connect,"SELECT * FROM hematologi WHERE id_hasil ='$id_hasil'");
$dt_he = mysqli_fetch_assoc($sq_he);

if(isset($dt_he)){
    ?>



    <div class="d-block card-header">

        <div class="col-md-12 row">
            <a href="#collapse1" class="d-block card-header py-3 border-left-warning col-md-10" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">HEMATOLOGI</h6></a>
            
            <a class=" d-block card-header py-1 col-sm-2" href="adminhasillist_cetak_hematologi.php?id_hasil=<?php echo"$id_hasil";?>"><button type="submit" class="btn btn-primary btn-form"><i class="fa fa-print" aria-hidden="true"></i>   Cetak Hasil</button></a>

        </div>

        <div id="collapse1" class="panel-collapse collapse in ">
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-3 col-form-label">Haemoglobin</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['haemoglobin']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(g/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Hematokrit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['hematokrit']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(%)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Eritrosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['eritrosit_h']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(juta/mm³)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Leukosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['leukosit_h']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(μl)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Trombosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['trombosit']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(μl)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Laju Endap Darah</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['laju_endap']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mm/jam)</label>
                </div>

                <hr>

                <h6 class="m-0 font-weight-bold text-gray-600">Hitung Jenis Leukosit</h6>
                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Basofil</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['basofil']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Eosinofil</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['eosinofil']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Neutrofil Batang</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['staf']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Neutrofil Segmen</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['segmen']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Limfosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['limfosit']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Monosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_he['monosit']; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

}

?>


<!-- collapse 002 -->
<?php $sq_ur = mysqli_query($connect,"SELECT * FROM urinalisa WHERE id_hasil ='$id_hasil'");
$dt_ur = mysqli_fetch_assoc($sq_ur);

if(isset($dt_ur)){

    ?>

    <div class="d-block card-header">

        <div class="col-md-12 row">
            <a href="#collapse2" class="d-block card-header py-3 border-left-warning col-md-10" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">URINALISA</h6></a>
            
            <a class=" d-block card-header py-1 col-sm-2" href="adminhasillist_cetak_urinalisa.php?id_hasil=<?php echo"$id_hasil";?>"><button type="submit" class="btn btn-primary btn-form"><i class="fa fa-print" aria-hidden="true"></i>   Cetak Hasil</button></a>

        </div>


        <div id="collapse2" class="panel-collapse collapse in">
            <div class="card-body">

                <h6 class="m-0 font-weight-bold text-gray-600">Makrokopis</h6>
                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Warna</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['warna']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Kejernihan</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['kejernihan']; ?>" disabled>
                    </div>

                </div>

                <hr>


                <div class="row">
                    <label class="col-sm-3 col-form-label">Leukosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['leukosit_u']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Keton</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['keton']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Nitrit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['nitrit']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Urobilinogen</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['urobilinogen']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Bilirubin</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['bilirubin']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Protein</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['protein']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Glukosa/Reduksi</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['glukosa_r']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Berat Jenis</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['berat_jenis']; ?>" disabled>
                    </div>

                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">pH</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['ph']; ?>" disabled>
                    </div>

                </div>

                <hr>

                <h6 class="m-0 font-weight-bold text-gray-600">Sedimen</h6>
                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Leukosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['leukosit_s']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(/LPB)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Eritrosit</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['eritrosit_s']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(/LPB)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Epitel</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ur['epitel']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(/LPK)</label>
                </div>
                
                <div class="row">
                    <label class="col-sm-3 col-form-label">- Kristal</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['kristal']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(/LPK)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Silinder</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['silinder']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(/LPK)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- Bakteri</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ur['bakteri']; ?>" disabled>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <?php

}




?>


<!-- collapse 003 -->
<?php $sq_ba = mysqli_query($connect,"SELECT * FROM bakteriologi WHERE id_hasil ='$id_hasil'");
$dt_ba = mysqli_fetch_assoc($sq_ba);

if(isset($dt_ba)){

    ?>

    <div class="d-block card-header">

        <div class="col-md-12 row">
            <a href="#collapse3" class="d-block card-header py-3 border-left-warning col-md-10" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">BAKTERIOLOGI / PARASITOLOGI</h6></a>
            
            <a class=" d-block card-header py-1 col-sm-2" href="adminhasillist_cetak_bakteriologi.php?id_hasil=<?php echo"$id_hasil";?>"><button type="submit" class="btn btn-primary btn-form"><i class="fa fa-print" aria-hidden="true"></i>   Cetak Hasil</button></a>

        </div>

        <div id="collapse3" class="panel-collapse collapse in">
            <div class="card-body">
                
                <div class="row">
                    <label class="col-sm-3 col-form-label">Mikroskopi TBC</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ba['m_tbc']; ?>" disabled>
                        
                        
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Tes Cepat Molekuler TBC</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_ba['tcm_tbc']; ?>" disabled>
                        
                        
                    </div>
                </div>


                <div class="row">
                    <label class="col-sm-3 col-form-label">Gonorhea (GO)</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ba['gonorhae']; ?>" disabled>
                    </div>
                </div>



                

                <div class="row">
                    <label class="col-sm-3 col-form-label">Malaria</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"  value="<?php echo $dt_ba['malaria']; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

}



?>

<!-- collapse 004 -->
<?php $sq_se = mysqli_query($connect,"SELECT * FROM serologi WHERE id_hasil ='$id_hasil'");
$dt_se = mysqli_fetch_assoc($sq_se);

if(isset($dt_se)){

    ?>

    <div class="d-block card-header">

        <div class="col-md-12 row">
            <a href="#collapse4" class="d-block card-header py-3 border-left-warning col-md-10" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">SEROLOGI / IMUNOLOGI</h6></a>
            
            <a class=" d-block card-header py-1 col-sm-2" href="adminhasillist_cetak_serologi.php?id_hasil=<?php echo"$id_hasil";?>"><button type="submit" class="btn btn-primary btn-form"><i class="fa fa-print" aria-hidden="true"></i>   Cetak Hasil</button></a>

        </div>

        
        <div id="collapse4" class="panel-collapse collapse in">
            <div class="card-body">

                <div class="row">
                    <label class="col-sm-3 col-form-label">Tes Kehamilan</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['tes_kehamilan']; ?>" disabled>
                    </div>
                </div>

                <hr>


                <h6 class="m-0 font-weight-bold text-gray-600">Dengue</h6>

                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- IgG</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['ig_g']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- IgM</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['ig_m']; ?>" disabled>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <label class="col-sm-3 col-form-label">HbsAg</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hbsag']; ?>" disabled>
                    </div>
                </div>



                <div class="row">
                    <label class="col-sm-3 col-form-label">HIV</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hiv']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">RDT Syphilis</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['rdt_syphilis']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">RPR</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['rpr']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">HCV</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['hcv']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Golongan Darah</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"value="<?php echo $dt_se['gol_darah']; ?>" disabled>
                    </div>
                </div>

                <hr>

                <h6 class="m-0 font-weight-bold text-gray-600">Widal</h6>

                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- S.Thiphi O</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_thiphi_o']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- S.Parathiphi AO</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_ao']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- S.Parathiphi BO</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['s_parathipy_bo']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- S.Thiphi H</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user"value="<?php echo $dt_se['s_thiphi_h']; ?>" disabled>
                    </div>
                </div>

                <hr>
                <h6 class="m-0 font-weight-bold text-gray-600">Ab Covid-19</h6>

                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- IgG</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['igg']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">- IgM</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['igm']; ?>" disabled>
                    </div>
                </div>

                <hr>
                <br>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Ag Covid-19</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['agcovid']; ?>" disabled>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">IGM Tifoid</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_se['tifoid']; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

}
?>

<!-- collapse 005 -->
<?php $sq_kd = mysqli_query($connect,"SELECT * FROM kimia_darah WHERE id_hasil ='$id_hasil'");
$dt_kd = mysqli_fetch_assoc($sq_kd);

if(isset($dt_kd)){


    ?>

    <div class="d-block card-header">

        <div class="col-md-12 row">
            <a href="#collapse5" class="d-block card-header py-3 border-left-warning col-md-10" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardExample"><h6 class="m-0 font-weight-bold text-gray-600">KIMIA DARAH</h6></a>
            
            <a class=" d-block card-header py-1 col-sm-2" href="adminhasillist_cetak_kimia_darah.php?id_hasil=<?php echo"$id_hasil";?>"><button type="submit" class="btn btn-primary btn-form"><i class="fa fa-print" aria-hidden="true"></i>   Cetak Hasil</button></a>

        </div>
        
        <div id="collapse5" class="panel-collapse collapse in">
            <div class="card-body">

                <div class="row">
                    <label class="col-sm-3 col-form-label">Glukosa Puasa</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['gl_puasa']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Glukosa 2 Jam PP</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['gl_pp']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Glukosa Sewaktu</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['gl_sewaktu']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Cholesterol Total</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['cholesterol']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Asam Urat</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['asam_urat']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Trigliserida</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['trigliserida']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Ureum</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['ureum']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">Creatinin</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['creatinin']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(mg/dL)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">SGOT</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['sgot']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(U/L)</label>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label">SGPT</label>
                    <div class="form-group col-lg-6">
                        <input type="text" class="form-control form-control-user" value="<?php echo $dt_kd['sgpt']; ?>" disabled>
                    </div>
                    <label class="col-sm-3 col-form-label">(U/L)</label>
                </div>



            </div>
        </div>
    </div>

    <?php

}
?>