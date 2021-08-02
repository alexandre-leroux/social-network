<?php

namespace Vue ;

use Models\Model;

class Post {

    /**
     * Affichage des posts 
     *
     * @param array $model_post
     * @return void
     */
    public function displayPost(array $model_post, $model) : void
    {
        foreach($model_post as $key => $value)
        {
            $result_img = $model->getImgPost($value['id']) ; 
            var_dump($result_img);

            ?>
                
                <article class="post" data-id="<?= $value['id'];?>">
                <div class="post_image">
                    <div class="photo_profil">
                        <img src="img/<?= $value['avatar'];?>" alt="photo_profil">
                    </div>
                    <div class="pseudo_user">
                        <p class="bold"> <?= $value['prenom'] ; ?> </p>
                        <p> <?= $value['date_post'] ; ?> </p>
                    </div>
                </div>

                <div class="description_post">
                    <p> <?= $value['texte'] ; ?> </p>
                </div>

                <?php 
                    if(!empty($result_img))
                    {
                        ?>
                    <div class="image_post">
                        <div>
                            <img src="img/img_post/<?= $result_img[0][0] ; ?>" alt="img_1">
                        </div>
                        <div class="galerie">
                            <div>
                                <img src="img/img_post/<?= $result_img[0][0] ; ?>" alt="img_2">
                            </div>
                            <div>
                                <img src="img/img_post/<?= $result_img[0][0] ; ?>" alt="img_3">
                            </div> 
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                <div class="like_post">
                    <div>
                        <i class="fa fa-thumbs-up btn_like" style="color: rgb(250, 95, 90);"></i>
                    </div>
                    <p class="compteur_like"> 128 </p>
                    <div>
                        <i class="fa fa-comments button_comment"></i>
                    </div>
                    <p> 40 </p>
                    
                </div>

                <div class="comment_post" style="display: none;">
                    <div class="contenu_comment">
                        <div class="comment">
                            <div id="img_comment">
                                <img src="img/pp.jpg" alt="#">
                            </div>
                            <div id="description_comment">
                                <p class="bold">  </p>
                                <p> </p>
                            </div>
                        </div>   
                    </div> 
                        
                    <div id="link_autres_comment">
                        <p class="button_all_comment"> Voir tous les commentaires </p>
                    </div>

                    <div id="form_comment">
                        <div class="img_form_comment">
                            <img src="img/<?= $_SESSION['avatar']; ?>" alt="img_profil">
                        </div>
                        <div class="input_form_comment">
                            <textarea placeholder="Ecrire un commentaire...."></textarea>
                            <input type="button" value="Envoyer" class="input_ajout_comment">
                        </div>
                    </div>
                        
                </div>
            </article>

            <?php
        }
    }
}