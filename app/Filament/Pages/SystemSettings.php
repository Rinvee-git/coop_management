<?php

namespace App\Filament\Pages;

use App\Models\SystemSetting;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;

class SystemSettings extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationLabel = 'System Settings';
    protected static ?string $title           = 'System Settings';
    protected static ?string $slug            = 'system-settings';
    protected static string|\UnitEnum|null $navigationGroup = 'System';
    protected static ?int $navigationSort     = 1;

    protected string $view = 'filament.pages.system-settings';

    public string $app_name      = '';
    public string $primary_color = '#0d9488';
    public string $font          = 'Rajdhani';

    // ✅ FileUpload requires array type in Livewire
    public array $logo    = [];
    public array $favicon = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('super_admin') ?? false;
    }

    public function mount(): void
    {
        $this->app_name      = SystemSetting::get('app_name', config('app.name')) ?? '';
        $this->primary_color = SystemSetting::get('primary_color', '#0d9488') ?? '#0d9488';
        $this->font          = SystemSetting::get('font', 'Rajdhani') ?? 'Rajdhani';

        // Restore existing file into array format FilePond expects
        $logo    = SystemSetting::get('logo');
        $favicon = SystemSetting::get('favicon');

        $this->logo    = $logo    ? [$logo]    : [];
        $this->favicon = $favicon ? [$favicon] : [];
    }

    public function getLogoUrl(): ?string
    {
        $path = $this->logo[0] ?? null;
        return $path ? Storage::disk('public')->url($path) : null;
    }

    public function getFaviconUrl(): ?string
    {
        $path = $this->favicon[0] ?? null;
        return $path ? Storage::disk('public')->url($path) : null;
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([

                TextInput::make('app_name')
                    ->label('Application Name')
                    ->required()
                    ->live()
                    ->prefixIcon('heroicon-o-building-office')
                    ->helperText('Displayed in the navbar and browser tab.')
                    ->columnSpanFull(),

                ColorPicker::make('primary_color')
                    ->label('Primary Color')
                    ->live()
                    ->helperText('Used for buttons, active states, and highlights.')
                    ->columnSpanFull(),

                Select::make('font')
                    ->label('System Font')
                    ->live()
                    ->helperText('Font used in the navbar brand name.')
                    ->options([
                        'Rajdhani'   => 'Rajdhani — Geometric Techy',
                        'Oxanium'    => 'Oxanium — Sci-Fi Sharp',
                        'Orbitron'   => 'Orbitron — Futuristic Bold',
                        'Syne'       => 'Syne — Editorial Modern',
                        'Exo 2'      => 'Exo 2 — Sleek & Clean',
                        'Bebas Neue' => 'Bebas Neue — Strong & Wide',
                        'Outfit'     => 'Outfit — Clean & Minimal',
                    ])
                    ->columnSpanFull(),

                FileUpload::make('logo')
                    ->label('System Logo')
                    ->helperText('Accepts SVG, PNG, or JPG. SVG recommended.')
                    ->disk('public')
                    ->directory('system')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->acceptedFileTypes([
                        'image/svg+xml',
                        'image/png',
                        'image/jpeg',
                        'image/jpg',
                    ])
                    ->maxSize(2048)
                    ->downloadable()
                    ->columnSpanFull(),

                FileUpload::make('favicon')
                    ->label('Favicon')
                    ->helperText('Recommended: 32×32 PNG or SVG.')
                    ->disk('public')
                    ->directory('system')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->acceptedFileTypes([
                        'image/png',
                        'image/svg+xml',
                        'image/x-icon',
                        'image/vnd.microsoft.icon',
                    ])
                    ->maxSize(512)
                    ->downloadable()
                    ->columnSpanFull(),

            ])
            ->columns(1);
    }

    public function save(): void
    {

        $logo    = is_array($this->logo)    ? ($this->logo[0]    ?? null) : ($this->logo    ?: null);
        $favicon = is_array($this->favicon) ? ($this->favicon[0] ?? null) : ($this->favicon ?: null);

        // Debug: log what we're getting
        \Illuminate\Support\Facades\Log::info('SystemSettings save', [
            'logo_raw'    => $this->logo,
            'favicon_raw' => $this->favicon,
            'logo'        => $logo,
            'favicon'     => $favicon,
        ]);

        SystemSetting::set('app_name',      $this->app_name);
        SystemSetting::set('primary_color', $this->primary_color);
        SystemSetting::set('font',          $this->font);

        if ($logo)    SystemSetting::set('logo',    $logo);
        if ($favicon) SystemSetting::set('favicon', $favicon);

        \Illuminate\Support\Facades\Artisan::call('view:clear');

        Notification::make()
            ->title('Settings saved!')
            ->body('Changes will reflect immediately across the panel.')
            ->success()
            ->send();

        $this->redirect(static::getUrl(), navigate: false);
    }
}
