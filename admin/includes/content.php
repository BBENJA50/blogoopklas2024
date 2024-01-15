<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">Testen database connectie</h1>
            <hr>
            <?php
            echo "Ophalen van alle users";
            $user = new User(); //Via "new" user veranderd de gewone variabele naar een object variabele
            $result = $user->fin_all_users();
            //check of er rijen zijn
            if(mysqli_num_rows($result)>0){
                //output op het scherm
                while($row = mysqli_fetch_array($result)){
                    //iedere row weergeven
                    echo "<br> id: " . $row['id'] . " " . $row['username'] . "<br>";
                }
            }else{
                echo "Geen resultaat";
            }
            ?>
        </div>
    </div>
</div>