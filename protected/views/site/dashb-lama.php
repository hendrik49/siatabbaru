<?php $_dkot = array(); $_dkod = array(); $_data = array();
    if (isset($_POST['provinsi'])) {
        $pprov = $_POST['provinsi']; //get the nama value from form
    }else{
        //$pprov = 'Jawa Tengah';
    }?>
    var x = document.getElementById("Pprovi").value;

    <?php 
        $gets = mysql_query("SELECT * FROM t_kab_kota p order by no desc"); 
        while($show = mysql_fetch_array($gets)) : 
            
            if($show['no'] >= $max){ $max = $show['no']; }
            $ii++;
            $_dkode[$ii]=$show['kode'];
            $_dkot[$ii]=$show['kab']; 
    ?> i++;
        
        provs[i]='<?php echo $show['provinsi']; ?>';
        
        if(provs[i]==x){
            
            datas[jdata]=<?php echo $show['kode']; ?>;
            kodes[jdata]=['<?php echo $show['kab']; ?>',datas[jdata]];    
            jdata++;
        }
        
    <?php endwhile ?>