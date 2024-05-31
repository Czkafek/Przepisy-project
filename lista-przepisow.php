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
        $_SESSION['variable'] = 1;

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
                  <a class="nav-link active" href="#">Przepisy</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container-fluid p-0 m-0 px-4">
        
        <div class="row pt-5 mt-5 d-flex justify-content-center p-0">
            <form class="input-group d-flex justify-content-start search-bar-container" action="lista-przepisow.php" method="post" name="search">
                <button class="border-0 bg-transparent" type="submit">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
                <input class="border-0 fs-5 search-bar" type="search" placeholder="Search" aria-label="Search" name="search_content">
            </form>
        </div>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $search_content = $_POST["search_content"];

                $stmt = $conn->prepare("SELECT id FROM recipes WHERE title LIKE ?");
                $search_param = "%" . $search_content . "%";
                $stmt->bind_param("s", $search_param);

                $stmt->execute();

                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $search_result_unsorted = array();

                    while ($row = $result->fetch_assoc()) {
                        $search_result_unsorted[] = $row['id'];
                    }

                    echo implode(", ", $search_result_unsorted);
                } else {
                    echo "Brak wyników.";
                }

                $stmt->close();
            }
        ?>

        <div class="row d-flex flex-column align-items-center recipe-preview-list pt-4">
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.php">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/Średnie.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>
            <a class="row recipe-preview p-0 rounded-5 d-flex recipe-preview" href="przepis.html">
                <div class="col-sm-4 col-4 p-0 recipe-preview-img">
                    <img src="img/makaron-smazony-z-kurczakiem-i-warzywami.jpg" alt="banner" class="rounded-start-5">
                </div>
                <div class="col-sm-6 py-3 px-3 recipe-preview-content">
                    <div class="row">
                        <h6 class="fs-2 fw-medium">Makaron smażony z kurczakiem i warzywami</h6>
                    </div>
                    <div class="row pt-4 ps-sm-4">
                        <div class="col-md-4 col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <span class="material-symbols-outlined" id="stats-icon">
                                    schedule
                                </span>
                            </div>
                            <h5 class="row fw-normal fs-5">60 minut</h5>
                        </div>
                        <div class="col d-flex flex-row-zmiana align-items-center">
                            <div class="row pe-sm-4 pe-0">
                                <img src="img/medium.png" id="difficulty">
                            </div>
                            <h5 class="row fw-normal fs-5">średnie</h5>
                        </div>
                    </div>
                </div>
            </a>    
        </div>

    </main>
    <?php
        mysqli_close($conn);
    ?>

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

</body>
</html>