<?php

namespace Vue ; 

class Header{


public function header_non_connecte()
    {
        ?>

            <header>
                <nav>
                    <div class="logo_text_header">
                        <div class="logo_network">
                            <img src="img/logo.svg" alt="#">
                        </div>
                        <div class="nom_header">
                            <h1> la plateforme_ network </h1>
                        </div>
                    </div>
                    <ul>
                        <li><a href="pages/inscription.php">S'inscrire</a></li>
                        <li><a href="pages/connexion.php">Se connecter</a></li>
                    </ul>
                </nav>
            </header>

        <?php


    }

public function header_connecte()
    {
        ?>

            <header>
                <nav>
                    <div class="logo_text_header">
                        <div class="logo_network">
                            <img src="img/logo.svg" alt="#">
                        </div>
                        <div class="nom_header">
                            <h1> BIENVENUE </h1>
                        </div>
                    </div>
                    <ul>
                        <li><a href="pages/deconnexion.php">déconnexion</a></li>
                        <li><a href="pages/chat.php">chat</a></li>
                    </ul>
                </nav>
            </header>

        <?php


    }

public function header_connecte_chat()
    {
        ?>

            <header>
                <nav>
                    <div class="logo_text_header">
                        <div class="logo_network">
                            <img src="../img/logo.svg" alt="#">
                        </div>
                        <div class="nom_header">
                            <h1> BIENVENUE </h1>
                        </div>
                    </div>
                    <ul>
                        <li><a href="../pages/deconnexion.php">déconnexion</a></li>
                    </ul>
                </nav>
            </header>

        <?php


    }




}
