<?php

$page = "overview";

if (isset($_GET['page'])) {
    $page = strtolower($_GET['page']);
    switch ($page) {
        case "overview":
            $page = "overview";
            break;
        case "gamemode":
            $page = "gameModes";
            break;
        case "dinosaurs":
            $page = "dinosaurs";
            break;
        case "gameplay":
            $page = "gameplay";
            break;
        case "news":
            $page = "news";
            break;
        default:
            header("Location: ?page=overview");
            break;
    }
} else {
    header("Location: ?page=overview");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jurassic World Evolution 2</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -1; pointer-events:none;">
        <div id="player"></div>
    </div>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand"><img src="assets/images/logo.png" style="height: 40px;" alt=""></a>
            <div class="navbar-text"><img src="assets/images/logoText.png" style="height: 40px;" alt=""></div>
            <div class="play-video"><img src="assets/images/play-button.png" style="height: 40px; opacity: 1;" alt=""></div>
        </div>
    </nav>

    <div class="container-fluid mt-5 pt-5">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card menu glass shadow p-3" style="height: 85vh">
                    <a href="?page=overview" class="game-button my-3">
                        Overview
                    </a>
                    <a href="?page=gameMode" class="game-button my-3">
                        Game Modes
                    </a>
                    <a href="?page=dinosaurs" class="game-button my-3">
                        Dinosaurs
                    </a>
                    <a href="?page=gameplay" class="game-button my-3">
                        Gameplay
                    </a>
                    <a href="?page=news" class="game-button my-3">
                        News
                    </a>
                    <a href="../../" class="game-button my-3">
                        Creator
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card glass parent-content shadow p-4" style="height: 85vh; max-height: 85vh; overflow-y: scroll">
                    <?php include("shared/" . $page . ".php"); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
        crossorigin="anonymous"></script>

    <!-- Youtube Iframe API -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <script>
        let player;
        var cards = document.querySelectorAll('.glass');
        let isPaused = false;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '100%',
                width: '100%',
                videoId: 'g76Zx7zydXQ',
                playerVars: {
                    autoplay: 1,
                    mute: 1,
                    controls: 0,
                    showinfo: 0,
                    autohide: 1,
                    loop: 1,
                    playlist: 'g76Zx7zydXQ'
                },
                events: {
                    'onStateChange': onPlayerStateChange,
                }
            });
        }

        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING) {
                for (var i = 0; i < cards.length; i++) {
                    cards[i].style.opacity = '0';
                    cards[i].style.pointerEvents = 'none';
                }
                player.unMute();
                player.setVolume(20);
            }
        }

        // Video Toggling (Handle play/pause)
        document.querySelector('.play-video').addEventListener('click', function() {
            if (player) {
                const playerState = player.getPlayerState();

                if (playerState === YT.PlayerState.PLAYING) {

                    player.pauseVideo();
                    isPaused = true;
                } else {
                    player.playVideo();
                    isPaused = false;
                }
            }
        });

        // Video hover effect to control visibility
        document.querySelector('.play-video').addEventListener('mouseenter', function() {
            for (var i = 0; i < cards.length; i++) {
                cards[i].style.opacity = '0';
            }
            if (isPaused) {
                document.getElementById('player').style.display = 'block';
            }
        });

        document.querySelector('.play-video').addEventListener('mouseleave', function() {
            for (var i = 0; i < cards.length; i++) {
                cards[i].style.opacity = '1';
                cards[i].style.pointerEvents = 'auto';
            }
            if (isPaused) {
                document.getElementById('player').style.display = 'none';
            }
        });
    </script>
</body>

</html>