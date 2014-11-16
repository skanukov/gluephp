<?php

require_once('glue.php');

$urls = array(
    "/" => 'Index',
    "/about" => 'About'
);

class Index {
    function GET() {
        echo "This is an index page";
    }
}

class About {
    function GET() {
        echo "This is an about page";
    }
}

class PageNotFound {
    function return404() {
        header("HTTP/1.0 404 Not Found");
        echo "Page not found";
    }
}

try {
    Glue::handle($urls);
} catch (PageNotFoundException $e) {
    $notFoundHandler = new PageNotFound();
    $notFoundHandler->return404();
}
