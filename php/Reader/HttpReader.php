<?php

interface HttpReader
{
    public function setUrl(string $url): self;

    public function loadPage(): self;

    public function getContent(): ?string;
}