<?php

namespace Vue ; 

class Comment {

    public function displayLastComment($array){


        foreach($array as $key => $value)
        {

        ?>

            <div class="comment">
                <div id="img_comment">
                    <img src="img/<?= $value['avatar'] ; ?>" alt="#">
                </div>
                <div id="description_comment">
                    <p class="bold"> <?= $value['prenom'] ; ?> </p>
                    <p> <?= $value['comment'] ; ?></p>
                </div>
                <div id="date_comment">
                    <p><?= $value['date_comment'] ; ?></p>
                </div>
            </div>   

        <?php   
        }
    }
}