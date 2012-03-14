<?php

// Foreach loop - value iteration
$cast = array(
    'Grahm Chapman', 'Eric Idle', 'John Cleese',
    'Michael Palin', 'Terry Gilliam', 'Terry Jones'
);

echo "<h2>Staring:</h2><ul>";

foreach ($cast as $member) {
    echo "<li>" . $member . "</li>";
}

echo "</ul>";

// Foreach loop - key-value iteration
$books = array(
    'Catch 22'           => 'Joseph Heller',
    '1984'               => 'George Orwell',
    'The Sun Also Rises' => 'Ernest Hemingway'
);

foreach($books as $title => $author) {
    echo "$title by $author\n";
}