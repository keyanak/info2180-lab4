<?php
header('Content-Type: text/html; charset=utf-8');

$superheroes = [
    [
        "name" => "Tony Stark",
        "alias" => "Iron Man",
        "biography" => "Wounded, captured and forced to build a weapon, Tony Stark instead created a suit of armor to save his life and escape captivity, becoming the armored Avenger, Iron Man."
    ],
    [
        "name" => "Steve Rogers",
        "alias" => "Captain America",
        "biography" => "Recipient of the Super Soldier serum, World War II hero Steve Rogers fights for American ideals as the leader of the Avengers."
    ],
    [
        "name" => "Natasha Romanoff",
        "alias" => "Black Widow",
        "biography" => "Highly trained spy and former assassin, Natasha Romanoff uses her skills and cunning to fight alongside the Avengers."
    ],
    [
        "name" => "Bruce Banner",
        "alias" => "Hulk",
        "biography" => "After being exposed to gamma radiation, Bruce Banner transforms into the raging, powerful Hulk when angered."
    ],
    [
        "name" => "Thor Odinson",
        "alias" => "Thor",
        "biography" => "The Asgardian God of Thunder, Thor wields the enchanted hammer Mjolnir and protects both Asgard and Earth."
    ],
    [
        "name" => "Peter Parker",
        "alias" => "Spider-Man",
        "biography" => "Bitten by a radioactive spider, teenager Peter Parker uses his powers to fight crime and protect New York City."
    ],
    [
        "name" => "Carol Danvers",
        "alias" => "Captain Marvel",
        "biography" => "After her DNA was fused with Kree genetics, Carol Danvers became one of the universe’s most powerful heroes."
    ],
    [
        "name" => "Clint Barton",
        "alias" => "Hawkeye",
        "biography" => "Master archer Clint Barton never misses his mark as the Avenger known as Hawkeye."
    ],
    [
        "name" => "T'Challa",
        "alias" => "Black Panther",
        "biography" => "King of Wakanda, T’Challa dons the mantle of the Black Panther to defend his nation and the world."
    ],
    [
        "name" => "Wanda Maximoff",
        "alias" => "Scarlet Witch",
        "biography" => "Wanda Maximoff bends reality with her chaos magic, fighting alongside the Avengers as the Scarlet Witch."
    ],
];

$query = isset($_GET['query']) ? trim($_GET['query']) : '';

if ($query === '') {
    // Exercise 2/3: show full list when no query
    foreach ($superheroes as $hero) {
        echo $hero['alias'] . "<br>";
    }
    exit;
}

// Exercise 3: case-insensitive match on alias or name
$found = false;
foreach ($superheroes as $hero) {
    if (
        strcasecmp($hero['alias'], $query) === 0 ||
        strcasecmp($hero['name'], $query) === 0
    ) {
        echo "<h3>{$hero['alias']}</h3>";
        echo "<h4>{$hero['name']}</h4>";
        echo "<p>{$hero['biography']}</p>";
        $found = true;
        break;
    }
}

if (!$found) {
    echo "Superhero not found";
}
