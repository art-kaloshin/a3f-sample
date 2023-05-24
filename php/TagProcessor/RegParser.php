<?php

class RegParser implements HtmlParser
{

    private string $content = '';
    private array $tagList = [];

    public function setContent(string $content): HtmlParser
    {
        $this->content = $content;

        return $this;
    }

    public function parse(): HtmlParser
    {
        preg_match_all('/<[^\/]\s*\/?[^>]+>/i', strtolower($this->content), $matches);

        foreach ($matches[0] as $match) {
            $tag = explode(' ', str_replace('>', '', $match));
            $tagName = str_replace('<', '', $tag[0]);
            $this->tagList[$tagName] = ($this->tagList[$tagName] ?? 0) + 1;
        }

        return $this;
    }

    public function getAvailableTagArray(): array
    {
        return array_keys($this->tagList);
    }

    public function getCountByTag(string $tag): int
    {
        return $this->tagList[$tag] ?? -1;
    }
}