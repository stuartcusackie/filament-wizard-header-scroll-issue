<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class WizardHeaderScroll extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Personal')
                        ->description('Enter your personal information')
                        ->schema([
                            TextInput::make('name')
                                ->label('Name'),
                            TextInput::make('email')
                                ->label('Email'),
                            TextInput::make('phone')
                                ->label('Phone')
                        ]),
                    Wizard\Step::make('Registration')
                        ->description('Tell us why you are registering')
                        ->schema([
                            TextInput::make('name2')
                                ->label('Name'),
                            TextInput::make('email2')
                                ->label('Email'),
                            TextInput::make('phone2')
                                ->label('Phone')
                        ]),
                    Wizard\Step::make('Password')
                        ->description('Choose a password for your account')
                        ->schema([
                            TextInput::make('name3')
                            ->label('Name'),
                            TextInput::make('email3')
                                ->label('Email'),
                            TextInput::make('phone3')
                                ->label('Phone')
                        ]),
                ])
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    public function render()
    {
        return view('livewire.wizard-header-scroll');
    }
}
