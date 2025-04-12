<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Philippine Mythical Creatures Wiki</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional spooky theme CSS -->
    <style>
        body {
            background-color: #0c0c0c;
            color: #e0dede;
            font-family: 'Cinzel', serif;
            /* spooky elegant font */
        }

        .navbar {
            background-color: #1a1a1a;
        }

        .navbar-brand,
        .nav-link {
            color: #e0dede !important;
        }

        .nav-link:hover {
            color: #9e7bff !important;
            /* spooky purple hover */
        }

        .card {
            background-color: #1f1f1f;
            border: none;
            box-shadow: 0 0 15px rgba(158, 123, 255, 0.3);
        }

        .footer {
            background-color: #1a1a1a;
            color: #aaa;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Mythical Wiki</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon" style="color: white;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=aswang">Aswang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=kapre">Kapre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=tikbalang">Tikbalang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=manananggal">Manananggal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <?php
        switch ($page) {
            case 'aswang':
                echo "<h1>Aswang</h1><p>The Aswang is a shapeshifting monster...</p>";
                break;
            case 'kapre':
                echo "<h1>Kapre</h1><p>The Kapre is a giant who dwells in trees...</p>";
                break;
            case 'tikbalang':
                echo "<h1>Tikbalang</h1><p>Tikbalang has the head of a horse and the body of a man...</p>";
                break;
            case 'manananggal':
                echo "<h1>Manananggal</h1><p>The Manananggal can detach its torso and fly at night...</p>";
                break;
            default:
                echo '
            <div class="text-center">
                <h1>Welcome to Philippine Mythical Creatures Wiki</h1>
                <p class="lead">Discover the eerie beings of Philippine folklore.</p>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Aswang</h5>
                            <p>Shapeshifter and blood-sucker of the night.</p>
                            <a href="index.php?page=aswang" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Kapre</h5>
                            <p>Giant tree spirit smoking his cigar.</p>
                            <a href="index.php?page=kapre" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-3">
                            <h5>Tikbalang</h5>
                            <p>Half-man, half-horse trickster.</p>
                            <a href="index.php?page=tikbalang" class="btn btn-outline-light">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>';
                break;
        }
        ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Mythical Creatures Wiki. Beware the Aswang tonight.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>