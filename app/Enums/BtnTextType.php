<?php

namespace App\Enums;

use InvalidArgumentException;

enum BtnTextType: string
{
    case BuyBtn = 'buy_btn';
    case CreditBtn = 'credit_btn';

    public function getLabel(): string
    {
        return match ($this) {
            self::BuyBtn => __('btn_text.buy_btn'),
            self::CreditBtn => __('btn_text.credit_btn'),
            default => throw new InvalidArgumentException('Unknown delivery type'),
        };
    }

    public static function getOptions(): array
    {
        return [
            self::BuyBtn->value => self::BuyBtn->getLabel(),
            self::CreditBtn->value => self::CreditBtn->getLabel(),
        ];
    }
}
