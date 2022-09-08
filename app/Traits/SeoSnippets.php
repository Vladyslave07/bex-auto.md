<?php

namespace App\Traits;

trait SeoSnippets
{
    protected string $SNIPPET_WRAPPER = '#';
    protected string $MODIFIER_SEPARATOR = '|';

    protected function applyModifier($value, $modifier = ''): string
    {
        return match ($modifier) {
            'uppercase' => mb_strtoupper($value),
            'lowercase' => mb_strtolower($value),
            default => $value,
        };
    }

    public function getSnippetValue($snippet)
    {
        return $this->getAttribute($snippet);
    }

    protected function parseSnippets($value)
    {
        if (preg_match_all("/{$this->SNIPPET_WRAPPER}([^{$this->SNIPPET_WRAPPER}]+){$this->SNIPPET_WRAPPER}/", $value, $matches)) {
            $replaces = [];
            foreach ($matches[1] as $i => $snippet) {
                $modifier = '';
                if (str_contains($snippet, $this->MODIFIER_SEPARATOR)) {
                    [$snippet, $modifier] = explode($this->MODIFIER_SEPARATOR, $snippet);
                }

                $replace = $this->getSnippetValue($snippet);
                if ($replace === false) {
                    $replaces[] = $matches[0][$i];
                } else {
                    $replaces[] = $modifier ? $this->applyModifier($replace, $modifier) : $replace;
                }
            }
            $value = strtr($value, array_combine($matches[0], $replaces));
        }
        return $value;
    }
}
