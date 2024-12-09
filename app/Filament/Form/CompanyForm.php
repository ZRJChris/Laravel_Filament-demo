<?php

namespace App\Filament\Form;

use Filament\Forms\Form;
use Filament\Forms;


class CompanyForm
{
    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('logo')
                ->maxLength(255),
            Forms\Components\TextInput::make('website')
                ->maxLength(255),
        ];
    }
}
