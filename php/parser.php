<?php
/**
 * для упрощения просто проинклудим классы, без реализации автозагрузки
 */

    require './Reader/HttpReader.php';
    require './Reader/CurlReader.php';

    require './TagProcessor/HtmlParser.php';
    require './TagProcessor/RegParser.php';

    $url = $argv[1];
    if (empty($url)) {
        echo 'Parser usage: ' . $argv[0] . ' https://google.com' . PHP_EOL;
        exit();
    }

    $parser = new RegParser();
    foreach (
        $parser
            ->setContent(
                (new CurlReader())->setUrl($url)->loadPage()->getContent()
            )
            ->parse()
            ->getAvailableTagArray() as $tag
    ) {
        echo 'Tag name: ' . $tag . ' Count: ' . $parser->getCountByTag($tag) . PHP_EOL;
    }