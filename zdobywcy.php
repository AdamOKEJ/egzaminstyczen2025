<?php
$polaczenie = mysqli_connect("localhost", "root", "", "zdobywcy");

if(isset($_POST["nazwisko"])){
    $nazwisko = $_POST["nazwisko"]; 
    $imie =  $_POST["imie"];
    $uczestnik = $_POST["funkcja"];
    $email = $_POST["email"];
    $sql = "INSERT INTO osoby (id_osoby, nazwisko, imie, funkcja, email) VALUES (NULL, '$nazwisko', '$imie', '$uczestnik', '$email')";
    if (!mysqli_query($polaczenie, $sql))  {
  echo "blad: " . $sql . "<br>" . mysqli_error($polaczenie);
}
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header><h1>Klub zdobywców gór polskich</h1></header>
    <nav>
        <a href="kw1.png">kwerenda 1</a>
        <a href="kw2.png">kwerenda 2</a>
        <a href="kw3.png">kwerenda 3</a>
        <a href="kw4.png">kwerenda 4</a>

    </nav>
    <section id=left>
        <img src="logo.PNG" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczenek</li>
            <li>wyzwania</li>
    </ul>
    </section>
    <section id=right>

    <h2>Dołącz do naszego zespołu!</h2>
    <p>Wpisz swoje dane do formularza:</p>
    <form action="zdobywcy.php" method="post">
        <label for="nazwisko">Nazwisko</label>
        <input type="text" name="nazwisko" id="nazwisko">
        <label for="imie">Imie</label>
        <input type="text" name="imie" id="imie">
        <label for="funkcja">Funkcja</label>
        <select name="funkcja" id="funkcja">
            <option value="uczestnik">uczestnik</option>
            <option value="przewodnik">przewodnik</option>
            <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
            <option value="organizator">organizator</option>
            <option value="ratownik">ratownik</option>
        </select> 
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        <button type="submit" id="dodaj">Dodaj</button>


    </form>
    <table id=tabela>
    <tr>
        <th>Nazwisko</th><th>Imie</th><th>Funkcja</th><th>Email</th>
    </tr>
    <?php
    $zapytanie = mysqli_query($polaczenie, "SELECT `nazwisko`, `imie`,`funkcja`,`email` FROM `osoby`") ;
    while($wiersz = mysqli_fetch_array($zapytanie)){
    echo  "<tr><td> $wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]</td></tr>";

    }

    ?>
    </table>
    </section>
    <footer><p>Strone wykonal: nr5 dziennik</p></footer>

</body>
</html>

<?php
mysqli_close($polaczenie)
?>

