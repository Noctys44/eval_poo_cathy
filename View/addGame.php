<?php

require_once('../index.php');
require_once('../Model/Game.php');
require_once('../Model/GameManager.php');
require_once('../Model/pdo.php');


$gameManager = new GameManager($pdo);

if($_POST)
{
    $game = new Game(
        [
            'title' => $_POST['title'],
            'min_players' => $_POST['min_players'],
            'max_players' => $_POST['max_players'],
        ]
        );

        if($game->isGameValid())
        {
            $gameManager->insertGame($game);
            $success = '<div class="alert alert-success" role="alert">Le jeu a bien été enregistré</div>';
        } else {
            $erreurs = $game->getErreurs();
        }
}

?>


<h1 class="text-center fw-bold dislay-3 text-info">Ajouter un jeu</h1>

<?php if(isset($message)) echo $success; ?>

<form action="" method="POST">
    <div class="container">
    
        <label for="title" class="form-label">Titre du jeu</label>
        <input type="text" class="form-control" name="title" id="title">
        <div id="title" class="form-text">
            <?php if(isset($erreurs) && in_array(Game::TITLE_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le titre est invalide </div>';
            ?>
        </div>

        <label for="min_players" class="form-label">Nombre de joueurs minimum</label>
        <input type="text" class="form-control" name="min_players" id="min_players">
            <?php if(isset($erreurs) && in_array(Game::MIN_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Champ invalide </div>';
            ?>

        <label for="max_players" class="form-label">Nombre de joueurs maximum</label>
        <input type="text" class="form-control" name="max_players" id="max_players">
            <?php if(isset($erreurs) && in_array(Game::MAX_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Champ invalide </div>';
            ?>

        <input type="submit" class="btn btn-outline-primary btn-lg mt-2" value="Ajouter le jeu">
    </div>
</form>

</body>
</html>