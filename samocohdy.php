
<?php

// samochody
$samochody = [
    ["marka" => "BMW", "model" => "320d", "rok" => 2018, "cena" => 85000, "przebieg" => 120000, "paliwo" => "diesel", "moc" => 190],
    ["marka" => "Audi", "model" => "A4", "rok" => 2020, "cena" => 110000, "przebieg" => 80000, "paliwo" => "benzyna", "moc" => 150],
    ["marka" => "Volkswagen", "model" => "Golf", "rok" => 2019, "cena" => 65000, "przebieg" => 95000, "paliwo" => "benzyna", "moc" => 130],
    ["marka" => "Toyota", "model" => "Corolla", "rok" => 2022, "cena" => 105000, "przebieg" => 40000, "paliwo" => "hybryda", "moc" => 140],
    ["marka" => "Mercedes", "model" => "C220", "rok" => 2017, "cena" => 95000, "przebieg" => 150000, "paliwo" => "diesel", "moc" => 170],
    ["marka" => "Opel", "model" => "Astra", "rok" => 2016, "cena" => 42000, "przebieg" => 180000, "paliwo" => "benzyna", "moc" => 125],
    ["marka" => "Ford", "model" => "Focus", "rok" => 2021, "cena" => 78000, "przebieg" => 65000, "paliwo" => "benzyna", "moc" => 150],
    ["marka" => "Skoda", "model" => "Octavia", "rok" => 2019, "cena" => 72000, "przebieg" => 110000, "paliwo" => "diesel", "moc" => 150],
    ["marka" => "Honda", "model" => "Civic", "rok" => 2015, "cena" => 38000, "przebieg" => 190000, "paliwo" => "benzyna", "moc" => 140],
    ["marka" => "Hyundai", "model" => "i30", "rok" => 2023, "cena" => 99000, "przebieg" => 25000, "paliwo" => "benzyna", "moc" => 160],
    ["marka" => "Kia", "model" => "Ceed", "rok" => 2020, "cena" => 69000, "przebieg" => 90000, "paliwo" => "benzyna", "moc" => 135],
    ["marka" => "Mazda", "model" => "6", "rok" => 2018, "cena" => 83000, "przebieg" => 130000, "paliwo" => "benzyna", "moc" => 165],
    ["marka" => "Renault", "model" => "Megane", "rok" => 2014, "cena" => 30000, "przebieg" => 210000, "paliwo" => "diesel", "moc" => 110],
    ["marka" => "Peugeot", "model" => "308", "rok" => 2017, "cena" => 45000, "przebieg" => 145000, "paliwo" => "benzyna", "moc" => 130],
    ["marka" => "Volvo", "model" => "V60", "rok" => 2021, "cena" => 125000, "przebieg" => 55000, "paliwo" => "diesel", "moc" => 200],
    ["marka" => "Nissan", "model" => "Qashqai", "rok" => 2019, "cena" => 88000, "przebieg" => 100000, "paliwo" => "benzyna", "moc" => 160],
    ["marka" => "Fiat", "model" => "Tipo", "rok" => 2016, "cena" => 35000, "przebieg" => 170000, "paliwo" => "benzyna", "moc" => 95],
    ["marka" => "Dacia", "model" => "Duster", "rok" => 2022, "cena" => 82000, "przebieg" => 30000, "paliwo" => "LPG", "moc" => 130],
    ["marka" => "BMW", "model" => "X5", "rok" => 2024, "cena" => 220000, "przebieg" => 15000, "paliwo" => "hybryda", "moc" => 286],
    ["marka" => "Audi", "model" => "A6", "rok" => 2012, "cena" => 28000, "przebieg" => 230000, "paliwo" => "diesel", "moc" => 180]
];

// obliczanie wieku auta
function obliczWiek($rokProdukcji) {
    return date("Y") - $rokProdukcji;
}

// szukanie aut po cenie
function wyszukajSamochody($samochody, $maksymalnaCena) {

    $znalezione = false;

    echo "<h2>Samochody do $maksymalnaCena zl</h2>";

    foreach ($samochody as $auto) {

        if ($auto["cena"] <= $maksymalnaCena) {
            echo $auto["marka"] . " " . $auto["model"];
            echo " - " . $auto["cena"] . " zl<br>";

            $znalezione = true;
        }
    }

    if ($znalezione == false) {
        echo "Nie znaleziono samochodow.";
    }
}

// najdrozsze auto
function najdrozszySamochod($samochody) {

    $najdrozszy = $samochody[0];

    foreach ($samochody as $auto) {
        if ($auto["cena"] > $najdrozszy["cena"]) {
            $najdrozszy = $auto;
        }
    }

    return $najdrozszy;
}

// najtansze auto
function najtanszySamochod($samochody) {

    $najtanszy = $samochody[0];

    foreach ($samochody as $auto) {
        if ($auto["cena"] < $najtanszy["cena"]) {
            $najtanszy = $auto;
        }
    }

    return $najtanszy;
}

// srednia cena
function obliczSredniaCene($samochody) {

    $suma = 0;

    foreach ($samochody as $auto) {
        $suma += $auto["cena"];
    }

    return $suma / count($samochody);
}

// sortowanie aut od najtanszego
usort($samochody, function($a, $b) {
    return $a["cena"] <=> $b["cena"];
});

?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Komis samochodowy</title>

<style>
body {
    font-family: Arial;
    background: #eeeeee;
    padding: 20px;
}

.container {
    max-width: 1000px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
}

h1, h2 {
    text-align: center;
}

.auto {
    background: #f5f5f5;
    padding: 15px;
    margin: 12px 0;
    border-radius: 8px;
}

.statystyki {
    background: #e8f4ff;
    padding: 20px;
    margin-top: 25px;
    border-radius: 10px;
}
</style>

</head>
<body>

<div class="container">

<h1>KOMIS SAMOCHODOWY</h1>

<h2>Lista samochodow</h2>

<?php

$diesel = 0;
$po2020 = 0;
$ponizej100 = 0;

// wyswietlanie samochodow
foreach ($samochody as $auto) {

    $wiek = obliczWiek($auto["rok"]);

    if ($wiek <= 3) {
        $kategoria = "Samochod prawie nowy";
    } elseif ($wiek <= 7) {
        $kategoria = "Samochod kilkuletni";
    } elseif ($wiek <= 15) {
        $kategoria = "Samochod uzywany";
    } else {
        $kategoria = "Samochod zabytkowy lub starszy";
    }

    echo "<div class='auto'>";

    echo "<h3>" . $auto["marka"] . " " . $auto["model"] . "</h3>";
    echo "Rok produkcji: " . $auto["rok"] . "<br>";
    echo "Cena: " . $auto["cena"] . " zl<br>";
    echo "Przebieg: " . $auto["przebieg"] . " km<br>";
    echo "Paliwo: " . $auto["paliwo"] . "<br>";
    echo "Moc: " . $auto["moc"] . " KM<br>";
    echo "Wiek: " . $wiek . " lat<br>";
    echo "Kategoria: " . $kategoria;

    echo "</div>";

    // liczenie statystyk
    if ($auto["paliwo"] == "diesel") {
        $diesel++;
    }

    if ($auto["rok"] > 2020) {
        $po2020++;
    }

    if ($auto["przebieg"] < 100000) {
        $ponizej100++;
    }
}

// wyszukiwanie
wyszukajSamochody($samochody, 70000);

// statystyki
$liczbaSamochodow = count($samochody);
$sredniaCena = obliczSredniaCene($samochody);

$najdrozszy = najdrozszySamochod($samochody);
$najtanszy = najtanszySamochod($samochody);

?>

<div class="statystyki">

<h2>STATYSTYKI KOMISU</h2>

<p>Liczba samochodow: <?php echo $liczbaSamochodow; ?></p>

<p>Srednia cena: <?php echo number_format($sredniaCena, 2, ",", " "); ?> zl</p>

<p>Najdrozszy samochod:
<?php echo $najdrozszy["marka"] . " " . $najdrozszy["model"]; ?>
</p>

<p>Najtanszy samochod:
<?php echo $najtanszy["marka"] . " " . $najtanszy["model"]; ?>
</p>

<p>Samochody diesel: <?php echo $diesel; ?></p>

<p>Samochody po 2020 roku: <?php echo $po2020; ?></p>

<p>Przebieg ponizej 100000 km: <?php echo $ponizej100; ?></p>

</div>

</div>

</body>
</html>
