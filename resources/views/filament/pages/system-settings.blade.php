<x-filament-panels::page>

{{-- Load all fonts for live preview --}}
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&family=Oxanium:wght@600&family=Orbitron:wght@600&family=Syne:wght@700&family=Exo+2:wght@600&family=Bebas+Neue&family=Outfit:wght@600&display=swap" rel="stylesheet">

<div class="space-y-6">

    {{-- ══════════════════════════════════════════════════════
         LIVE PREVIEW SECTION
    ══════════════════════════════════════════════════════ --}}
    <x-filament::section>
        <x-slot name="heading">Live Preview</x-slot>
        <x-slot name="description">See how your settings will look before saving.</x-slot>

        <div class="space-y-6">

            {{-- Navbar Light --}}
            <div>
                <p style="font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; color:#9ca3af; margin-bottom:0.5rem;">
                    Navbar — Light Mode
                </p>
                <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:10px; padding:0.75rem 1.25rem; display:flex; align-items:center; justify-content:space-between; box-shadow:0 1px 3px rgba(0,0,0,0.06);">
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        @if($this->getLogoUrl())
                            <img src="{{ $this->getLogoUrl() }}" style="height:1.75rem; width:auto;" alt="logo" />
                        @else
                            <div style="width:1.75rem; height:1.75rem; background:#e5e7eb; border-radius:4px;"></div>
                        @endif
                        <span style="font-family:'{{ $this->font }}', sans-serif; font-size:1rem; font-weight:600; letter-spacing:0.05em; color:#111827;">
                            {{ $this->app_name ?: 'App Name' }}
                        </span>
                    </div>
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="background:#f3f4f6; border-radius:6px; padding:0.35rem 0.75rem; display:flex; align-items:center; gap:0.4rem;">
                            <span style="font-size:0.75rem; color:#9ca3af;">Search</span>
                        </div>
                        <span style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:#374151;">
                            {{ strtoupper($this->app_name ?: 'User') }}
                        </span>
                        <div style="width:2rem; height:2rem; border-radius:9999px; background:{{ $this->primary_color }}; display:flex; align-items:center; justify-content:center;">
                            <span style="color:white; font-size:0.7rem; font-weight:700;">AU</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navbar Dark --}}
            <div>
                <p style="font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; color:#9ca3af; margin-bottom:0.5rem;">
                    Navbar — Dark Mode
                </p>
                <div style="background:#0f172a; border:1px solid #1e293b; border-radius:10px; padding:0.75rem 1.25rem; display:flex; align-items:center; justify-content:space-between;">
                    <div style="display:flex; align-items:center; gap:0.5rem;">
                        @if($this->getLogoUrl())
                            <img src="{{ $this->getLogoUrl() }}" style="height:1.75rem; width:auto; filter:brightness(0) invert(1);" alt="logo" />
                        @else
                            <div style="width:1.75rem; height:1.75rem; background:#334155; border-radius:4px;"></div>
                        @endif
                        <span style="font-family:'{{ $this->font }}', sans-serif; font-size:1rem; font-weight:600; letter-spacing:0.05em; color:#ffffff;">
                            {{ $this->app_name ?: 'App Name' }}
                        </span>
                    </div>
                    <div style="display:flex; align-items:center; gap:1rem;">
                        <div style="background:#1e293b; border-radius:6px; padding:0.35rem 0.75rem; display:flex; align-items:center; gap:0.4rem;">
                            <span style="font-size:0.75rem; color:#64748b;">Search</span>
                        </div>
                        <span style="font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:#e2e8f0;">
                            {{ strtoupper($this->app_name ?: 'User') }}
                        </span>
                        <div style="width:2rem; height:2rem; border-radius:9999px; background:{{ $this->primary_color }}; display:flex; align-items:center; justify-content:center;">
                            <span style="color:white; font-size:0.7rem; font-weight:700;">AU</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Primary Color Usage --}}
            <div>
                <p style="font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; color:#9ca3af; margin-bottom:0.5rem;">
                    Primary Color Usage
                </p>
                <div style="display:flex; flex-wrap:wrap; gap:0.75rem; align-items:center;">
                    <div style="background:{{ $this->primary_color }}; color:white; padding:0.5rem 1.25rem; border-radius:7px; font-size:0.8rem; font-weight:600;">
                        Save Changes
                    </div>
                    <div style="border:2px solid {{ $this->primary_color }}; color:{{ $this->primary_color }}; padding:0.45rem 1.2rem; border-radius:7px; font-size:0.8rem; font-weight:600;">
                        Cancel
                    </div>
                    <div style="background:{{ $this->primary_color }}22; color:{{ $this->primary_color }}; padding:0.25rem 0.75rem; border-radius:9999px; font-size:0.75rem; font-weight:600;">
                        Active
                    </div>
                    <div style="background:{{ $this->primary_color }}18; border-left:3px solid {{ $this->primary_color }}; padding:0.4rem 1rem; border-radius:0 6px 6px 0; font-size:0.8rem; font-weight:600; color:{{ $this->primary_color }};">
                        Dashboard
                    </div>
                    <div style="display:flex; align-items:center; gap:0.4rem;">
                        <div style="width:2rem; height:2rem; border-radius:6px; background:{{ $this->primary_color }}; box-shadow:0 2px 4px rgba(0,0,0,0.15);"></div>
                        <span style="font-size:0.75rem; color:#6b7280; font-family:monospace;">{{ $this->primary_color }}</span>
                    </div>
                </div>
            </div>

            {{-- Font Preview --}}
            <div>
                <p style="font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; color:#9ca3af; margin-bottom:0.5rem;">
                    Font Preview — {{ $this->font }}
                </p>
                <div style="background:#f9fafb; border:1px solid #e5e7eb; border-radius:10px; padding:1rem 1.5rem; display:flex; flex-direction:column; gap:0.25rem;">
                    <span style="font-family:'{{ $this->font }}', sans-serif; font-size:1.5rem; font-weight:600; color:#111827; letter-spacing:0.04em;">
                        {{ $this->app_name ?: 'App Name' }}
                    </span>
                    <span style="font-family:'{{ $this->font }}', sans-serif; font-size:1rem; font-weight:600; color:#374151; letter-spacing:0.04em;">
                        The quick brown fox jumps over the lazy dog
                    </span>
                    <span style="font-family:'{{ $this->font }}', sans-serif; font-size:0.875rem; color:#6b7280; letter-spacing:0.04em;">
                        ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789
                    </span>
                </div>
            </div>

            {{-- Favicon Preview --}}
            @if($this->getFaviconUrl())
            <div>
                <p style="font-size:0.7rem; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; color:#9ca3af; margin-bottom:0.5rem;">
                    Favicon Preview
                </p>
                <div style="display:flex; align-items:center; gap:1.5rem; flex-wrap:wrap;">
                    <div style="display:flex; flex-direction:column; align-items:center; gap:0.4rem;">
                        <div style="background:#f3f4f6; border-radius:6px; padding:0.5rem; border:1px solid #e5e7eb;">
                            <img src="{{ $this->getFaviconUrl() }}" style="width:32px; height:32px; object-fit:contain;" />
                        </div>
                        <span style="font-size:0.65rem; color:#9ca3af;">32×32</span>
                    </div>
                    <div style="display:flex; flex-direction:column; align-items:center; gap:0.4rem;">
                        <div style="background:#f3f4f6; border-radius:6px; padding:0.5rem; border:1px solid #e5e7eb;">
                            <img src="{{ $this->getFaviconUrl() }}" style="width:16px; height:16px; object-fit:contain;" />
                        </div>
                        <span style="font-size:0.65rem; color:#9ca3af;">16×16</span>
                    </div>
                    <div style="background:#e5e7eb; border-radius:8px 8px 0 0; padding:0.4rem 1rem; display:flex; align-items:center; gap:0.4rem; min-width:160px; border:1px solid #d1d5db; border-bottom:none;">
                        <img src="{{ $this->getFaviconUrl() }}" style="width:14px; height:14px; object-fit:contain;" />
                        <span style="font-size:0.7rem; color:#374151; font-weight:500; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:120px;">
                            {{ $this->app_name ?: 'App Name' }}
                        </span>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </x-filament::section>

    {{-- ══════════════════════════════════════════════════════
         SETTINGS FORM
    ══════════════════════════════════════════════════════ --}}
    <x-filament::section>
        <x-slot name="heading">Branding & Appearance</x-slot>
        <x-slot name="description">Update your system name, logo, favicon, color, and font. The preview above updates live as you change fields.</x-slot>

        <form wire:submit.prevent="save" class="space-y-6">

            {{ $this->form }}

            <div class="flex justify-end pt-2">
                <x-filament::button
                    type="submit"
                    size="lg"
                    icon="heroicon-o-check-circle"
                    wire:loading.attr="disabled"
                    wire:target="save"
                >
                    <span wire:loading.remove wire:target="save">Save Settings</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </x-filament::button>
            </div>

        </form>
    </x-filament::section>

</div>

<x-filament-actions::modals />

</x-filament-panels::page>
