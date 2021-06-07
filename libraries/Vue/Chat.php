<?php

namespace Vue ; 

class Chat{




    public function section_gauche($result)
        {

            ?>
            <div id="div3">
            <article id="contenu_div3">

                <div id="pres_user_connect">
                    <div class="img_user_connect">
                        <img src="../img/<?=$_SESSION['avatar']?>" alt="#">
                    </div>
                    <div class="infos_user_connecte">
                        <p><?=$_SESSION['prenom'];?></p>
                        <p>@<?=$_SESSION['prenom']?><?=$_SESSION['nom']?></p>
                    </div>
                </div>
                
                <nav id="menu">
                    <ul>
                        <li><a href="../index.php"><i class="fa fa-home"></i> Accueil </a></li>
                        <li><a href="profil.php"><i class="fa fa-user-circle"></i> Profil </a></li>
                    </ul>
                </nav>
                
                <h2> Conversations </h2>
                
                <div id="conv">
                    <div id="div_like_button_creer_groupe"><p>CREER UN GROUPE</p></div>

                    <div id="liste_user_pour_creer_groupe">
                        <p class='liste_pseudo_groupe'>pseudo</p>
                        <button>créer</button>
                    </div>

                    <?php
                        foreach($result as $key => $value)
                        {
                            ?>
                                <a>
                                    <div class="liste_groupes">
                                        <div>
                                            <img src="../img/group.svg" alt="#">
                                        </div>
                                        <div class='nom_du_groupe'>
                                            <p><?=$value['nom_du_groupe']?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php
                        }
                    
                    ?>
                                
                </div>
                
            </article>

            </div>
            <?php


        }

    public function section_centrale()
        {
            ?>
                <div id="div2">
                    <div id="user_selection_chat">
                
                    </div>

                    <div id="conteneur_des_messages">
                    </div>

                    <div id="intput_chat_et_button">
                        <input id="input_messages" type="text">
                        <button id="button_envoyer_message">ENVOYER</button>
                    </div>


                </div>
            <?php
        }


    public function section_droite()
        {
            ?>
                <div id="div1">
                    <article id="contenu_div1">

                        <div id="bloc_search_bar">
                            <input type="search" name="barre_de_recherche" id="search_bar_users" placeholder="chercher un utilisateur">
                        
                        </div>
                        <div id="users_list">
                            
                        </div>
                    </article>
                </div>
                
            <?php

        }















}