    <?php
    /* @var $this SiteController */
    $this->pageTitle=Yii::app()->name;
    $this->breadcrumbs=array(
        'Dashboard',
    );
    include '../siatab/connect.php';
    ?>
    <div class="span8">
        <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
            'heading'=>'Selamat Datang di..',
        )); ?>

        <h2>Sistem Air Tanah dan Air Baku</h2>
        <p>Beranda akan menjadi Halaman Pemantau Wilayah Krisis Air.</p>
        <p>Beranda akan menjadi Halaman Pemantau Wilayah Krisis Air.</p>
        <p>Beranda akan menjadi Halaman Pemantau Wilayah Krisis Air.</p>
        

        <?php $this->endWidget(); ?>
    </div>
    
    <div class="span3">
    
    <div style="font-size: 11px; background-color: #fffffa; ">
        <div><legend>Kondisi Air Tanah</legend></div>
        <div style="background-color: #fffffa; margin: 5px; ">
        <table>
        <?php
        $i = 0; $indexSumur = 0; $m1 = 0; $m2 = 0; $m3 = 0;
        $_kondisiSumur = ""; 
        $_sortList = 0; 
        $get = mysql_query("select * from t_sumur6 order by id desc"); 
        while($show = mysql_fetch_array($get)){
            $indexSumur++; $_sortList = 0; 
            $i = $show['ID'];
            if($show['sumur'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['reservoar'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['pompa'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['rumah_pompa'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['hidran_umum'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['saluran_airbaku'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['saluran_irigasi'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['box_pembagi'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['springkler'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['penggerak'] == "Rusak Berat"){
                $_sortList++;
            }

            if($_sortList > 5){
                if($m1 <= 3){
                    if($_sortList > 6){
                    $_sortList = $_sortList * 10;
                    $_kondisiSumur = "danger";
                    $m1++;
                
                        echo "<tr><td class='span5'>Kondisi ID Sumur ".$show['ID']."</td>";
                        echo "<td class='span6'>";
                        $this->widget('bootstrap.widgets.TbProgress', array(
                            'type'=>$_kondisiSumur, // 'info', 'success' or 'danger'
                            'percent'=>$_sortList, // the progress
                            )); 
                        echo "</td></tr>";  
                    }else{
                        $_sortList = $_sortList * 10;
                        $_kondisiSumur = "info";
                        $m1++;
                    
                        echo "<tr><td class='span5'>Kondisi ID Sumur ".$show['ID']."</td>";
                        echo "<td class='span6'>";
                        $this->widget('bootstrap.widgets.TbProgress', array(
                            'type'=>$_kondisiSumur, // 'info', 'success' or 'danger'
                            'percent'=>$_sortList, // the progress
                            )); 
                        echo "</td></tr>";   
                    }
                }
            }
        }$m1 = 0;
        ?>
        </table>
        </div>
    </div>
    </div>



    <br></br>
    
    <div class="span3">
    <div style="font-size: 11px; background-color: #fffffa; ">
    <div><legend>Kondisi Air Baku</legend></div>
    <div style="background-color: #fffffa; margin: 5px; ">
    <table>
        <?php
        $i = 0; $indexSumur = 0; $m1 = 0; $m2 = 0; $m3 = 0;
        $_kondisiSumur = ""; 
        $_sortList = 0; 
        $get = mysql_query("select * from t_sumur6 order by id desc"); 
        while($show = mysql_fetch_array($get)){
            $indexSumur++; $_sortList = 0; 
            $i = $show['ID'];
            if($show['sumur'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['reservoar'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['pompa'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['rumah_pompa'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['hidran_umum'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['saluran_airbaku'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['saluran_irigasi'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['box_pembagi'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['springkler'] == "Rusak Berat"){
                $_sortList++;
            }
            if($show['penggerak'] == "Rusak Berat"){
                $_sortList++;
            }

            if($_sortList > 1){
                if($m1 <= 3){
                    if($_sortList > 6){
                    $_sortList = $_sortList * 10;
                    $_kondisiSumur = "danger";
                    $m1++;
                
                    echo "<tr><td class='span5'>Kondisi Mata Air ".$show['ID']."</td>";
                    echo "<td class='span6'>";
                    $this->widget('bootstrap.widgets.TbProgress', array(
                        'type'=>$_kondisiSumur, // 'info', 'success' or 'danger'
                        'percent'=>$_sortList, // the progress
                        )); 
                    echo "</td></tr>";  
                }else{
                    $_sortList = $_sortList * 10;
                    $_kondisiSumur = "info";
                    $m1++;
                
                    echo "<tr><td class='span5'>Kondisi Air Permukaan ".$show['ID']."</td>";
                    echo "<td class='span6'>";
                    $this->widget('bootstrap.widgets.TbProgress', array(
                        'type'=>$_kondisiSumur, // 'info', 'success' or 'danger'
                        'percent'=>$_sortList, // the progress
                        )); 
                    echo "</td></tr>";   
                    }
                }
            }
        
                
            

        }
        ?></table>
        </div>
        </div>
    </div>










