<?php

require_once('../index.php');
require_once('../Model/Player.php');
require_once('../Model/PlayerManager.php');
require_once('../Model/pdo.php');


$playerManager = new PlayerManager($pdo);

if($_POST)
{
    $player = new Player(
        [
            'email' => $_POST['email'],
            'nickname' => $_POST['nickname']
        ]
        );

        if($player->isPlayerValid())
        {
            $playerManager->insertPlayer($player);
            $success = '<div class="alert alert-success" role="alert">Le joueur a bien été enregistré</div>';
        } else {
            $erreurs = $player->getErreurs();
        }
}

?>


<h1 class="text-center fw-bold dislay-3 text-info">Ajouter un joueur</h1>

<?php if(isset($message)) echo $success; ?>

<form action="" method="POST">
    <div class="container">
    
        <label for="email" class="form-label">Email du joueur</label>
        <input type="email" class="form-control" name="email" id="email">
        <div id="email" class="form-text">
            <?php if(isset($erreurs) && in_array(Player::EMAIL_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> L\'email est invalide </div>';
            ?>
        </div>

        <label for="nickname" class="form-label">Pseudo du joueur</label>
        <input type="text" class="form-control" name="nickname" id="nickname">
            <?php if(isset($erreurs) && in_array(Player::NICKNAME_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le pseudo est invalide </div>';
            ?>

        <input type="submit" class="btn btn-outline-primary btn-lg mt-2" value="Ajouter le joueur">
    </div>
</form>

</body>
</html>