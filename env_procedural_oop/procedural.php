<?php

// Include composer dependencies
require_once __DIR__ . '\vendor\autoload.php';
require_once 'apiaccess.php';

$client = new Google_Client();
$client->setAuthConfig('credentials.json');

$service = new Google_Service_Books($client);
$optParams = array('filter' => 'free-ebooks');
$results = $service->volumes->listVolumes('Henry David Thoreau', $optParams);

foreach ($results as $item) {
  echo $item['volumeInfo']['title'], "<br /> \n";
}

// if (php_sapi_name() != 'cli') {
//     throw new Exception('This application must be run on the command line.');
// }

// $client = getClient();
// $service = new Google_Service_Calendar($client);

// // Print the next 10 events on the user's calendar.
// $calendarId = 'primary';
// $optParams = array(
//     'maxResults' => 10,
//     'orderBy' => 'startTime',
//     'singleEvents' => true,
//     'timeMin' => date('c'),
// );
// $results = $service->events->listEvents($calendarId, $optParams);
// $events = $results->getItems();

// if (empty($events)) {
//     print "No upcoming events found.\n";
// } else {
//     print "Upcoming events:\n";
//     foreach ($events as $event) {
//         $start = $event->start->dateTime;
//         if (empty($start)) {
//             $start = $event->start->date;
//         }
//         printf("%s (%s)\n", $event->getSummary(), $start);
//     }
// }
