<?php

require_once('../index.php');
require_once('../Model/Game.php');
require_once('../Model/GameManager.php');
require_once('../Model/Player.php');
require_once('../Model/PlayerManager.php');
require_once('../Model/Contest.php');
require_once('../Model/ContestManager.php');
require_once('../Model/pdo.php');

$playerManager  = new PlayerManager($pdo);
$allPlayers = $playerManager->getAllPlayers();

$gameManager  = new GameManager($pdo);
$allGames = $gameManager->getAllGames();

$contestManager  = new ContestManager($pdo);
$allContest = $contestManager->getAllContest();


?>

<h1 class="text-center">Nos joueurs</h1>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th class="text-center">Email</th>
            <th class="text-center">Nickname</th>
        </tr>
            <?php while ($row = $allPlayers->fetch(PDO::FETCH_ASSOC)) {?> 
            <tr>
                <td class="text-center"> <?php echo $row["email"]; ?></td>
                <td class="text-center"> <?php echo $row["nickname"]; ?></td>
            </tr>
            <?php } ?>
    </table>
</div>

<h1 class="text-center">Nos jeux</h1>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th class="text-center">Titre</th>
            <th class="text-center">Nombre minimum de joueurs</th>
            <th class="text-center">Nombre maximum de joueurs</th>
        </tr>
            <?php while ($row = $allGames->fetch(PDO::FETCH_ASSOC)) {?> 
            <tr>
                <td class="text-center"> <?php echo $row["title"]; ?></td>
                <td class="text-center"> <?php echo $row["min_players"]; ?></td>
                <td class="text-center"> <?php echo $row["max_players"]; ?></td>
            </tr>
            <?php } ?>
    </table>
</div>

<h1 class="text-center">Matchs joués</h1>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th class="text-center">Id du match</th>
            <th class="text-center">Date de début</th>
            <th class="text-center">Gagnant du match</th>
        </tr>
            <?php while ($row = $allContest->fetch(PDO::FETCH_ASSOC)) {?> 
            <tr>
                <td class="text-center"> <?php echo $row["game_id"]; ?></td>
                <td class="text-center"> <?php echo $row["start_date"]; ?></td>
                <td class="text-center"> <?php echo $row["winner_id"]; ?></td>
            </tr>
            <?php } ?>
    </table>
</div>