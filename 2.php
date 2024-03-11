<?php

function before($mysqli, $catId)
{
    $questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id=' . $catId);
    $result     = [];
    while ($question = $questionsQ->fetch_assoc()) {
        $userQ    = $mysqli->query('SELECT name, gender FROM users WHERE id=' . (int) $question['user_id']);
        $user     = $userQ->fetch_assoc();
        $result[] = ['question' => $question, 'user' => $user];
        $userQ->free();
    }
    $questionsQ->free();
}

/**
 * не могу знать что будет в ответе так как не работал нативно с mysql
 * предполагаю что так будет корректно
 *
 * @param  mysqli  $mysqli
 * @param  int     $catId
 * @return array
 */
function after(mysqli $mysqli, int $catId): array
{
    $result = [];
    $query  = $mysqli->query('select * from questions where catalog_id = ' . $catId . 'inner join from users using(name, gender)');
    foreach ($query->fetch_assoc() as $row) {
        $result[] = [
            'question' => $row['question'],
            'user'     => $row['user']
        ];
    }

    return $result;
}
