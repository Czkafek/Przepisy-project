<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
        include("database.php");
        session_start();
        $variable = $_SESSION['variable'];

        $sql = "SELECT COUNT(*) FROM recipes_ingredients WHERE recipe_id = $variable;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $amount = $row['COUNT(*)'];

        $sql = "SELECT MIN(id) FROM recipes_ingredients WHERE recipe_id = $variable;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $min = $row['MIN(id)']; 

        $ingredient_iteration_end = $min + $amount;

        $sql = "SELECT title FROM recipes WHERE id = $variable;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $title = $row["title"];

        $sql = "SELECT time FROM recipes WHERE id = $variable;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $time = $row["time"];

        $sql = "SELECT difficulty FROM recipes WHERE id = $variable;";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $difficulty = $row["difficulty"];

    ?>
    
    <nav class="row navbar bg-body-tertiary p-1 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand m-0 me-2" href="#">
                <img src="img/logo.png" alt="logo" width="80px">
            </a>
            <ul class="navbar-nav me-auto list-group-horizontal fs-4">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.html">Strona główna</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="lista-przepisow.html">Przepisy</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="main-padding">
        <div class="space-2"></div>
        <div class="container-fluid p-0 m-0 px-4 recipe-container d-flex flex-column align-items-center">
            <div class="recipe container">
                <div class="row text-center-nochange">
                    <h5 class="fs-1 p-0 fw-bold"><?php echo $title ?></h5>
                </div>
                <div class="row d-flex justify-content-center pt-3">
                    <div class="recipe-img">
                        <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg">
                    </div>
                </div>
                <div class="row w-100 column-gap pt-sm-4 pt-3">
                    <div class="col-lg">
                        <h6 class="fs-3 fw-bold ">Informacje</h6>
                        <div class="row d-flex flex-row pt-1 ps-4 pb-sm-5 pb-4">
                            <div class="col-md-4 col-lg col d-flex flex-row align-items-center">
                                <div class="row pe-sm-4 pe-3">
                                    <span class="material-symbols-outlined" id="stats-icon">
                                        schedule
                                    </span>
                                </div>
                                <h5 class="row fw-normal h7 m-0"><?php echo $time . " " ?>minut</h5>
                            </div>
                            <div class="col-md-6 col-lg col  d-flex flex-row align-items-center">
                                <div class="row pe-sm-4 pe-3">
                                    <img src="img/medium.png" id="difficulty">
                                </div>
                                <h5 class="row fw-normal h7 m-0"><?php echo $difficulty ?></h5>
                            </div>
                        </div>
                        <h6 class="fs-3 fw-bold ">Składniki</h6>
                        <?php

                            for($i=$min; $i<$ingredient_iteration_end; $i++) {

                                $sql = "SELECT ingredient_id FROM recipes_ingredients WHERE id = $i;";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $ingredient_id = $row["ingredient_id"];
                                
                                $sql = "SELECT name FROM ingredients WHERE id = $ingredient_id;";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $ingredient_name = $row["name"];

                                $sql = "SELECT amount FROM recipes_ingredients WHERE id = $i;";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $ingredient_amount = $row["amount"];


                                echo "<div class='ps-1 d-flex justify-content-between'><p class='fs-5'>" . $ingredient_name . "</p><p class='fs-5 text-nowrap ps-4'>" . $ingredient_amount . "</p> </div>";
                            }   

                        ?>
                        
                    </div>
                    <div class="col-lg pe-0 pt-lg-0 pt-3">
                        <h6 class="fs-4 fw-bold mb-4">Przygotowanie krok po kroku</h6>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 1</p>
                            <p class="fs-5 fw-normal">Skrój kurczaka w kostkę, wymieszaj z dwoma łyżkami ciemnego sosu sojowego, Przyprawą w mini kostkach Knorr i marynuj przez godzinę.</p>
                        </div>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 2</p>
                            <p class="fs-5 fw-normal">Mocz grzyby w gorącej wodzie przez kwadrans, a następnie wrzuć je do gotującej się wody i gotuj je przez kolejny kwadrans. Kiedy ostygną skrój je w paski.</p>
                        </div>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 3</p>
                            <p class="fs-5 fw-normal">Marchew pokrój w zapałki, por w kostkę, a paprykę i kapustę w paski.</p>
                        </div>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 4</p>
                            <p class="fs-5 fw-normal">Wrzuć mięso na mocno rozgrzany w woku olej (2 łyżki) i smaż je, aż puści sok, a następnie przełóż je razem z sosem własnym do innego naczynia.</p>
                        </div>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 5</p>
                            <p class="fs-5 fw-normal">Rozgrzej w woku pięć łyżek oleju. Po chwili dodaj posiekany czosnek, paprykę i marchew. Smaż wszystko dwie minuty i dodaj por. Po kolejnych trzech minutach smażenia wrzuć grzyby mun. Smaż jeszcze trzy minuty.</p>
                        </div>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 6</p>
                            <p class="fs-5 fw-normal">Teraz dodaj kiełki, kapustkę pekińską i mięso. Smaż 4 minuty i dodaj siekane chili.</p>
                        </div>
                        <div class="row ps-3 pb-5">
                            <p class="fs-4 fw-bold mb-2">Krok 7</p>
                            <p class="fs-5 fw-normal">Makaron ugotuj według wskazówek na opakowaniu. Następnie odcedź go i dodaj do wszystkich składników w woku. Dopraw miodem, wszystko energicznie wymieszaj i podawaj posypane kiełkami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ps-0 pt-5 my-5d-flex flex-column align-items-center-zmiana section">
            <h1 class="h1 fw-bold text-center ps-sm-0 ps-4">Napisz do nas!</h1>
            <p class="h2 mb-2 pb-5 text-center ps-sm-0 ps-4">i podziel się swoim przepisem</p>

            <div class="container media d-flex justify-content-center">
                <div class="text-center-nochange flex-column d-flex justify-content-center">
                    <a href="https://www.instagram.com/" target="_blank">
                        <svg viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" fill="none" fill-rule="evenodd" d="M0 0h128v128H0z"></path><radialGradient cx="19.111" cy="128.444" gradientUnits="userSpaceOnUse" id="a" r="163.552"><stop offset="0" stop-color="#333333" class="stop-color-ffb140"></stop><stop offset=".256" stop-color="#333333" class="stop-color-ff5445"></stop><stop offset=".599" stop-color="#333333" class="stop-color-fc2b82"></stop><stop offset="1" stop-color="#333333" class="stop-color-8e40b7"></stop></radialGradient><path clip-rule="evenodd" d="M105.843 29.837a7.68 7.68 0 1 1-15.36 0 7.68 7.68 0 0 1 15.36 0zM64 85.333c-11.782 0-21.333-9.551-21.333-21.333 0-11.782 9.551-21.333 21.333-21.333 11.782 0 21.333 9.551 21.333 21.333 0 11.782-9.551 21.333-21.333 21.333zm0-54.198c-18.151 0-32.865 14.714-32.865 32.865 0 18.151 14.714 32.865 32.865 32.865 18.151 0 32.865-14.714 32.865-32.865 0-18.151-14.714-32.865-32.865-32.865zm0-19.603c17.089 0 19.113.065 25.861.373 6.24.285 9.629 1.327 11.884 2.204 2.987 1.161 5.119 2.548 7.359 4.788 2.24 2.239 3.627 4.371 4.788 7.359.876 2.255 1.919 5.644 2.204 11.884.308 6.749.373 8.773.373 25.862s-.065 19.113-.373 25.861c-.285 6.24-1.327 9.629-2.204 11.884-1.161 2.987-2.548 5.119-4.788 7.359-2.239 2.24-4.371 3.627-7.359 4.788-2.255.876-5.644 1.919-11.884 2.204-6.748.308-8.772.373-25.861.373-17.09 0-19.114-.065-25.862-.373-6.24-.285-9.629-1.327-11.884-2.204-2.987-1.161-5.119-2.548-7.359-4.788-2.239-2.239-3.627-4.371-4.788-7.359-.876-2.255-1.919-5.644-2.204-11.884-.308-6.749-.373-8.773-.373-25.861 0-17.089.065-19.113.373-25.862.285-6.24 1.327-9.629 2.204-11.884 1.161-2.987 2.548-5.119 4.788-7.359 2.239-2.24 4.371-3.627 7.359-4.788 2.255-.876 5.644-1.919 11.884-2.204 6.749-.308 8.773-.373 25.862-.373zM64 0C46.619 0 44.439.074 37.613.385 30.801.696 26.148 1.778 22.078 3.36c-4.209 1.635-7.778 3.824-11.336 7.382C7.184 14.3 4.995 17.869 3.36 22.078 1.778 26.149.696 30.801.385 37.613.074 44.439 0 46.619 0 64s.074 19.561.385 26.387c.311 6.812 1.393 11.464 2.975 15.535 1.635 4.209 3.824 7.778 7.382 11.336 3.558 3.558 7.127 5.746 11.336 7.382 4.071 1.582 8.723 2.664 15.535 2.975 6.826.311 9.006.385 26.387.385s19.561-.074 26.387-.385c6.812-.311 11.464-1.393 15.535-2.975 4.209-1.636 7.778-3.824 11.336-7.382 3.558-3.558 5.746-7.127 7.382-11.336 1.582-4.071 2.664-8.723 2.975-15.535.311-6.826.385-9.006.385-26.387s-.074-19.561-.385-26.387c-.311-6.812-1.393-11.464-2.975-15.535-1.636-4.209-3.824-7.778-7.382-11.336-3.558-3.558-7.127-5.746-11.336-7.382C101.851 1.778 97.199.696 90.387.385 83.561.074 81.381 0 64 0z" fill="url(#a)" fill-rule="evenodd" class="fillurl(-a)"></path></svg>
                    </a>
                    <h4 class="pt-2"><a class="instagram-color text-decoration-none" href="https://www.instagram.com/" target="_blank">Instagram</a></h4>
                </div>
                <div class="text-center-nochange flex-column d-flex justify-content-center">
                    <a href="mailto:przepisy.pl@gmail.com" target="_blank">
                        <svg viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36Z" fill="#333333" class="fill-000000"></path><path d="M18 26.162v20.386c0 1.109.812 2.007 1.93 2.007h31.815c1.117 0 1.93-.909 1.93-2.007V26.162c0-1.217-.727-2.162-1.93-2.162H19.93c-1.25 0-1.93.969-1.93 2.162m2.933 1.776c0-.491.298-.772.773-.772.293 0 11.854 7.325 12.554 7.755l1.81 1.125c.573-.384 1.15-.713 1.744-1.111 1.213-.776 12.011-7.77 12.308-7.77.477 0 .773.282.773.773 0 .52-1.002 1.037-1.655 1.435-4.1 2.5-8.2 5.224-12.26 7.816-.237.16-.695.503-1.04.45-.382-.059-12.146-7.617-14.287-8.875-.321-.19-.72-.363-.72-.826" fill="#FFFFFF" class="fill-ffffff"></path></g></svg>
                    </a>
                    <h4 class="pt-2"><a class="email-color text-decoration-none" href="mailto:przepisy.pl@gmail.com" target="_blank">Email</a></h4>
                </div>
                <div class="text-center-nochange">
                    <a href="https://www.facebook.com/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" xml:space="preserve"><path d="M32 30a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v28z" fill="#333333" class="fill-3b5998"></path><path d="M22 32V20h4l1-5h-5v-2c0-2 1.002-3 3-3h2V5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z" fill="#FFFFFF" class="fill-ffffff"></path></svg>
                    </a>
                    <h4 class="pt-2"><a class="facebook-color text-decoration-none" href="https://www.facebook.com/" target="_blank">Facebook</a></h4>
                </div>
            </div>
        
        </div>

    </main>

    <footer class="pt-5">
        <div class="container footer-media d-flex justify-content-center pb-5">
            <div class="text-center-nochange flex-column d-flex justify-content-center">
                <a href="https://www.instagram.com/" target="_blank">
                    <svg data-name="Google alt" viewBox="0 0 420 419.997" xmlns="http://www.w3.org/2000/svg"><path d="M342.818 100.279a24.3 24.3 0 1 1-24.295-24.295 24.3 24.3 0 0 1 24.295 24.295ZM420 209.999l-.005.306-1.38 88.105a121.58 121.58 0 0 1-120.2 120.2L210 419.999l-.306-.006-88.105-1.376a121.586 121.586 0 0 1-120.206-120.2L0 209.999l.006-.306 1.376-88.108a121.59 121.59 0 0 1 120.206-120.2L210-.001l.306.006 88.105 1.376a121.584 121.584 0 0 1 120.2 120.2Zm-39.112 0-1.374-87.8A82.654 82.654 0 0 0 297.8 40.484L210 39.113l-87.8 1.371a82.658 82.658 0 0 0-81.716 81.715l-1.371 87.8 1.371 87.8a82.655 82.655 0 0 0 81.716 81.715l87.8 1.371 87.8-1.371a82.651 82.651 0 0 0 81.714-81.715Zm-63.048 0A107.841 107.841 0 1 1 210 102.158a107.962 107.962 0 0 1 107.84 107.841Zm-39.107 0A68.734 68.734 0 1 0 210 278.733a68.812 68.812 0 0 0 68.732-68.734Z" fill="#fbfbfb" class="fill-000000"></path></svg>
                </a>
                <h5 class="pt-2"><a class="fw-normal pure-color text-decoration-none" href="https://www.instagram.com/" target="_blank">Instagram</a></h5>
            </div>
            <div class="text-center-nochange flex-column d-flex justify-content-center">
                <a href="mailto:przepisy.pl@gmail.com" target="_blank">
                    <svg viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M36 72c19.882 0 36-16.118 36-36S55.882 0 36 0 0 16.118 0 36s16.118 36 36 36Z" fill="#fbfbfb" class="fill-000000"></path><path d="M18 26.162v20.386c0 1.109.812 2.007 1.93 2.007h31.815c1.117 0 1.93-.909 1.93-2.007V26.162c0-1.217-.727-2.162-1.93-2.162H19.93c-1.25 0-1.93.969-1.93 2.162m2.933 1.776c0-.491.298-.772.773-.772.293 0 11.854 7.325 12.554 7.755l1.81 1.125c.573-.384 1.15-.713 1.744-1.111 1.213-.776 12.011-7.77 12.308-7.77.477 0 .773.282.773.773 0 .52-1.002 1.037-1.655 1.435-4.1 2.5-8.2 5.224-12.26 7.816-.237.16-.695.503-1.04.45-.382-.059-12.146-7.617-14.287-8.875-.321-.19-.72-.363-.72-.826" fill="#333333" class="fill-ffffff"></path></g></svg>
                </a>
                <h5 class="pt-2"><a class="fw-normal pure-color text-decoration-none" href="mailto:przepisy.pl@gmail.com" target="_blank">Email</a></h5>
            </div>
            <div class="text-center-nochange">
                <a href="https://www.facebook.com/" target="_blank">
                    <svg version="1.0" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M32 30a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v28z" fill="#fbfbfb" class="fill-3b5998 fill-333333"></path><path d="M22 32V20h4l1-5h-5v-2c0-2 1.002-3 3-3h2V5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z" fill="#333333" class="fill-ffffff"></path></svg>
                </a>
                <h5 class="pt-2"><a class="fw-normal pure-color text-decoration-none" href="https://www.facebook.com/" target="_blank">Facebook</a></h5>
            </div>
        </div>
        <div class="container-fluid copyright">
            <h4 class="fw-light py-3 text-center-nochange m-0">©2024 Przepisowania</h4>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
        mysqli_close($conn);
    ?>

</body>
</html>