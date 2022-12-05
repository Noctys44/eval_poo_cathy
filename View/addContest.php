<?php

require_once('../index.php');
require_once('../Model/Contest.php');
require_once('../Model/ContestManager.php');
require_once('../Model/pdo.php');


$contestManager = new ContestManager($pdo);

if($_POST)
{
    $contest = new Contest(
        [
            'game_id' => $_POST['game_id'],
            'start_date' => $_POST['start_date'],
            'winner_id' => $_POST['winner_id'],
        ]
        );

        if($contest->isContestValid())
        {
            $contestManager->insertContest($contest);
            $success = '<div class="alert alert-success" role="alert">Le match a bien été enregistré</div>';
        } else {
            $erreurs = $contest->getErreurs();
        }
}

?>


<h1 class="text-center fw-bold dislay-3 text-info">Ajouter un match</h1>

<?php if(isset($message)) echo $success; ?>

<form action="" method="POST">
    <div class="container">
    
        <label for="game_id" class="form-label">Id du match</label>
        <input type="text" class="form-control" name="game_id" id="game_id">
        <div id="game_id" class="form-text">
            <?php if(isset($erreurs) && in_array(Contest::GAMEID_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Le titre est invalide </div>';
            ?>
        </div>

        <label for="start_date" class="form-label">Date de début</label>
        <input type="date" class="form-control" name="start_date" id="start_date">
            <?php if(isset($erreurs) && in_array(Contest::STARTDATE_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Champ invalide </div>';
            ?>

        <label for="winner_id" class="form-label">Id du gagnant</label>
        <input type="text" class="form-control" name="winner_id" id="winner_id">
            <?php if(isset($erreurs) && in_array(Contest::WINNERID_INVALIDE, $erreurs))
                echo '<div class="form-text text-danger fw-bold"> Champ invalide </div>';
            ?>

        <input type="submit" class="btn btn-outline-primary btn-lg mt-2" value="Ajouter le match">
    </div>
</form>

</body>
</html>