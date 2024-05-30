<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "przepisy";
    $conn = "";

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name,);



    $sql = "SELECT COUNT(*) FROM recipes_ingredients WHERE recipe_id = 1;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $amount = $row['COUNT(*)'];

    echo $amount;
    // wyświetla 18 (jest to poprawny wynik)



    /*
        Jeśli będzie chciał wywołać komende sql to zrób to tak:

        $sql = "twoja komenda";

        mysqli_query($conn, $sql);

    
    */
?>