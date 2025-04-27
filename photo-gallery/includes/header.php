<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Gallery</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --neon-pink: #ff2a6d;
            --neon-blue: #05d9e8;
            --neon-purple: #d300c5;
            --dark-bg: #0d0221;
            --darker-bg: #070215;
        }

        body {
            background-color: var(--dark-bg);
            color: #fff;
            font-family: 'Orbitron', sans-serif;
        }

        .navbar {
            background-color: var(--darker-bg) !important;
            border-bottom: 2px solid var(--neon-blue);
            box-shadow: 0 0 10px var(--neon-blue);
        }

        .navbar-brand, .nav-link {
            color: var(--neon-pink) !important;
            text-shadow: 0 0 5px var(--neon-pink);
            transition: all 0.3s ease;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: var(--neon-blue) !important;
            text-shadow: 0 0 10px var(--neon-blue);
        }

        .gallery-img {
            height: 250px;
            object-fit: cover;
            border: 2px solid var(--neon-purple);
            transition: all 0.3s ease;
        }

        .gallery-img:hover {
            transform: scale(1.02);
            box-shadow: 0 0 15px var(--neon-purple);
        }

        .card {
            background-color: var(--darker-bg);
            border: 1px solid var(--neon-blue);
            box-shadow: 0 0 10px var(--neon-blue);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px var(--neon-blue);
        }

        .card-title {
            color: var(--neon-pink);
            text-shadow: 0 0 5px var(--neon-pink);
        }

        .card-text {
            color: #fff;
        }

        .card-footer {
            background-color: var(--darker-bg);
            border-top: 1px solid var(--neon-purple);
            color: var(--neon-blue);
        }

        .btn-primary {
            background-color: var(--neon-pink);
            border: none;
            box-shadow: 0 0 10px var(--neon-pink);
        }

        .btn-primary:hover {
            background-color: var(--neon-blue);
            box-shadow: 0 0 15px var(--neon-blue);
        }

        .form-control {
            background-color: var(--darker-bg);
            border: 1px solid var(--neon-blue);
            color: #fff;
        }

        .form-control:focus {
            background-color: var(--darker-bg);
            border-color: var(--neon-pink);
            box-shadow: 0 0 10px var(--neon-pink);
            color: #fff;
        }

        .alert {
            background-color: var(--darker-bg);
            border: 1px solid var(--neon-blue);
            color: #fff;
        }

        @keyframes glitch {
            0% { transform: translate(0) }
            20% { transform: translate(-2px, 2px) }
            40% { transform: translate(-2px, -2px) }
            60% { transform: translate(2px, 2px) }
            80% { transform: translate(2px, -2px) }
            100% { transform: translate(0) }
        }

        .glitch-effect {
            animation: glitch 0.5s infinite;
        }

        .cyber-title {
            font-size: 2.5rem;
            color: var(--neon-blue);
            text-shadow: 0 0 10px var(--neon-blue);
            margin-bottom: 2rem;
            text-align: center;
            letter-spacing: 2px;
        }
    </style>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">CYBER GALLERY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="upload.php">UPLOAD</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4"> 