<?php

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings;
use App\Filament\Form\CompanyForm;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Pages\SubNavigationPosition;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;



class EditCompany extends Page implements HasForms
{
    public ?array $data = [];

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.clusters.settings.pages.edit-company';

    protected static ?string $cluster = Settings::class;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->adminOrOwner() && auth()->user()->company;
    }

    public function mount(): void
    {
        $company = auth()->user()->company;
        $this->form->fill($company ? $company->attributesToArray() : []);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(CompanyForm::getFormSchema())
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            auth()->user()->company->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }


}
