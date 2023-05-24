<?php

interface HtmlParser
{
    public function setContent(string $content): self;

    public function parse(): self;

    public function getAvailableTagArray(): array;

    public function getCountByTag(string $tag): int;
}