<?php

namespace App\Traits;

use App\Models\WordCase;

trait SeoSnippets
{
    protected string $SNIPPET_WRAPPER = '#';
    protected string $MODIFIER_SEPARATOR = '|';

    public function getSnippetValue($snippet)
    {
        return $this->getAttribute($snippet);
    }

    protected function parseSnippets($value)
    {
        if (preg_match_all("/{$this->SNIPPET_WRAPPER}([^{$this->SNIPPET_WRAPPER}]+){$this->SNIPPET_WRAPPER}/", $value, $matches)) {
            $replaces = [];
            foreach ($matches[1] as $i => $snippet) {
                if (str_contains($snippet, $this->MODIFIER_SEPARATOR)) {
                    [$snippet, $modifier] = explode($this->MODIFIER_SEPARATOR, $snippet);
                }

                $replace = $this->getSnippetValue($snippet);

                if (isset($modifier)) {
                    $wordCases = WordCase::getSnippetReplacements($replace);
                    $replace = $wordCases[$modifier] ?? $replace;
                }

                // todo: move to word cases
                if ($snippet === 'from_country') {
                    $replace = __('index.from_country') . ' ' . $replace;
                }

                $replaces[] = $replace === false ? $matches[0][$i] : $replace;
            }
            $value = strtr($value, array_combine($matches[0], $replaces));
        }
        return $value;
    }
}
