<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/tamagotchi.php";

    session_start();                          // For global variable, saving in browser cache
    if (empty($_SESSION['list_of_tamagotchis'])) {
        $_SESSION['list_of_tamagotchis'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
  // End Red Tape

    // GET ROUTE for home page
    $app->get('/', function() use ($app) {
        return $app['twig']->render('tamagotchis.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // INSTANTIATION of new pet , grabbing user name input, ROUTE sends new object to /new-pet URL
    $app->post('/new-pet', function() use ($app) {
        $new_pet = new Tamagotchi(ucfirst($_POST['name']));
        $new_pet->save();  // save new pet name

        return $app['twig']->render('tamagotchis.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    // 3. Route for deleting all tasks
    // $app

    return $app;

?>
