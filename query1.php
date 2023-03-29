<table border="1" style="border-collapse: collapse;">  

    <th colspan="3">Elenco articoli con marca</th>

    <tr>
        <td>Codice articolo</td><td>Descrizione articolo</td><td>Descrizione marca</td>
    </tr>

    <?php
    // INSERIRE QUI LE ISTRUZIONI PHP PER POPOLARE LA TABELLA

    // Connessione al database
    // $servername = "localhost";
    // $username = "username";
    // $password = "password";
    // $dbname = "nome_database";
    // $conn = mysqli_connect($servername, $username, $password, $dbname);

    // OPPURE con funzione define()
    define("DB_SERVERNAME", "localhost");
    define("DB_USERNAME", "username");
    define("DB_PASSWORD", "password");
    define("DB_NAME", "nome_database");
    $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Controllo della connessione
    // if ($conn && $conn->connect_error) {
    //     echo "Connection failed: " . $conn->connect_error;
    //     exit();
    // }

    // OPPURE con funzione PHP mysqli_connect_error()
    if (!$conn) {
        die("Connessione al database fallita: " . mysqli_connect_error());
    }

    // Query per selezionare i dati dalla tabella
    $sql = "SELECT articoli.cod, articoli.des, marche.mar_des
            FROM articoli
            INNER JOIN marche ON articoli.mar_cod = marche.mar_cod
            ORDER BY articoli.cod ASC";

    // Esecuzione della query con funzione PHP mysqli_query()
    $result = mysqli_query($conn, $sql);

    // Esecuzione della query richiamando il metodo query() dell'oggetto $conn
    // $result = $conn->query($sql);

    // Ciclo per popolare la tabella HTML con i dati della query e utilizzando le funzioni native di PHP
    if (mysqli_num_rows($result) > 0) {
        // Output dati per ogni row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["cod"]. "</td><td>" . $row["des"]. "</td><td>" . $row["mar_des"]. "</td></tr>";
        }
    } else {
        echo "0 risultati";
    }

    // Chiusura della connessione
    mysqli_close($conn);

    ?>

</table>
