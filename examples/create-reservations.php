<?php

namespace Pekkis\Queue\Example;

use Pekkis\Queue\Queue;
use DateTime;

require_once __DIR__ . '/real-life-bootstrap.php';

/** @var Queue $queue */

// Empties the queue
$queue->purge();

for ($x = 1; $x <= 100; $x = $x + 1) {

    $now = time();
    $from = rand($now, $now + 10000);
    $to = rand($now + 10001, $now + 20000);

    $reservation = new ReservationRequest(
        DateTime::createFromFormat('U', $from),
        DateTime::createFromFormat('U', $to)
    );


    $queue->enqueue($reservation);

}