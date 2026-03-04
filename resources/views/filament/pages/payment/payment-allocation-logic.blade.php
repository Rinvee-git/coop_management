<x-filament-panels::page>
<style>
    .pal-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #0f2744 60%, #0a1628 100%);
        border-radius: 1rem;
        padding: 2rem 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }
    .pal-hero::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.08);
    }
    .pal-hero::after {
        content: '';
        position: absolute;
        bottom: -40px; left: 30%;
        width: 140px; height: 140px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.05);
    }
    .pal-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(251, 191, 36, 0.15);
        border: 1px solid rgba(251, 191, 36, 0.3);
        color: #fbbf24;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 999px;
        margin-bottom: 0.75rem;
    }
    .pal-hero-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 0.4rem;
        letter-spacing: -0.02em;
    }
    .pal-hero-sub {
        color: rgba(255,255,255,0.55);
        font-size: 0.875rem;
        margin: 0;
    }
    .pal-stats {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
    }
    .pal-stat {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.75rem;
        padding: 0.75rem 1.25rem;
        min-width: 120px;
    }
    .pal-stat-value {
        font-size: 1.4rem;
        font-weight: 800;
        color: #fbbf24;
        line-height: 1;
    }
    .pal-stat-label {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.45);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-top: 3px;
    }

    /* Priority Flow Banner */
    .pal-priority-banner {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
    }
    .dark .pal-priority-banner {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .pal-priority-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 1rem;
    }
    .pal-flow {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    .pal-step {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        padding: 0.75rem 1.1rem;
        min-width: 140px;
        position: relative;
        transition: box-shadow 0.2s;
    }
    .dark .pal-step {
        background: #111827;
        border-color: rgba(255,255,255,0.08);
    }
    .pal-step:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
    .pal-step-num {
        width: 26px; height: 26px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.7rem;
        font-weight: 800;
        flex-shrink: 0;
        color: #fff;
    }
    .pal-step-info { flex: 1; }
    .pal-step-name {
        font-size: 0.82rem;
        font-weight: 700;
        color: #111827;
        line-height: 1;
    }
    .dark .pal-step-name { color: #f9fafb; }
    .pal-step-sub {
        font-size: 0.68rem;
        color: #9ca3af;
        margin-top: 2px;
    }
    .pal-arrow {
        color: #d1d5db;
        font-size: 1.1rem;
        font-weight: 300;
    }
    .pal-override-note {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #fffbeb;
        border: 1px solid #fde68a;
        color: #b45309;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 999px;
        margin-top: 0.75rem;
    }

    .pal-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 0.75rem;
        padding-left: 2px;
    }

    .pal-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1rem;
    }

    .pal-card {
        background: #fff;
        border-radius: 0.875rem;
        border: 1px solid #f0f0f0;
        padding: 1.4rem;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .dark .pal-card {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .pal-card:hover {
        box-shadow: 0 6px 24px rgba(0,0,0,0.09);
        transform: translateY(-2px);
        border-color: #e5e7eb;
    }
    .pal-card-accent {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 0.875rem 0.875rem 0 0;
    }
    .pal-card-icon-wrap {
        width: 42px; height: 42px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 1rem;
    }
    .pal-card-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.35rem;
    }
    .dark .pal-card-title { color: #f9fafb; }
    .pal-card-desc {
        font-size: 0.8rem;
        color: #6b7280;
        line-height: 1.5;
        margin-bottom: 1.1rem;
    }
    .pal-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.9rem;
        border-top: 1px solid #f3f4f6;
    }
    .dark .pal-card-footer { border-color: rgba(255,255,255,0.06); }

    .pal-pill-list {
        display: flex;
        gap: 0.4rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
    }
    .pal-pill {
        font-size: 0.68rem;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 999px;
        letter-spacing: 0.03em;
    }

    .pal-btn {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 7px;
        border: none;
        cursor: pointer;
        transition: all 0.15s;
    }
    .pal-btn:hover { filter: brightness(1.08); transform: scale(1.02); }
    .pal-btn-warning { background: #f59e0b; color: #fff; }
    .pal-btn-danger  { background: #ef4444; color: #fff; }
    .pal-btn-success { background: #10b981; color: #fff; }

    .pal-tag {
        font-size: 0.65rem;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 999px;
    }

    @media (max-width: 640px) {
        .pal-hero { padding: 1.5rem; }
        .pal-hero-title { font-size: 1.3rem; }
        .pal-stats { gap: 0.75rem; }
        .pal-stat { min-width: 90px; }
        .pal-step { min-width: 120px; }
    }
</style>

<div>
    {{-- Hero Header --}}
    <div class="pal-hero">
        <div class="pal-hero-badge">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
            Payment Management
        </div>
        <h1 class="pal-hero-title">Payment Allocation Logic</h1>
        <p class="pal-hero-sub">Configure how payments are distributed across interest, principal, and penalties — with override controls.</p>
        <div class="pal-stats">
            <div class="pal-stat">
                <div class="pal-stat-value">Auto</div>
                <div class="pal-stat-label">Allocation Mode</div>
            </div>
            <div class="pal-stat">
                <div class="pal-stat-value">3</div>
                <div class="pal-stat-label">Priority Levels</div>
            </div>
            <div class="pal-stat">
                <div class="pal-stat-value">0</div>
                <div class="pal-stat-label">Pending Voids</div>
            </div>
        </div>
    </div>

    {{-- Priority Flow --}}
    <div class="pal-priority-banner">
        <div class="pal-priority-label">Default Allocation Priority</div>
        <div class="pal-flow">
            <div class="pal-step">
                <div class="pal-step-num" style="background:#1e3a5f;">1</div>
                <div class="pal-step-info">
                    <div class="pal-step-name">Interest</div>
                    <div class="pal-step-sub">Applied first</div>
                </div>
            </div>
            <div class="pal-arrow">→</div>
            <div class="pal-step">
                <div class="pal-step-num" style="background:#2563eb;">2</div>
                <div class="pal-step-info">
                    <div class="pal-step-name">Principal</div>
                    <div class="pal-step-sub">Loan balance</div>
                </div>
            </div>
            <div class="pal-arrow">→</div>
            <div class="pal-step">
                <div class="pal-step-num" style="background:#7c3aed;">3</div>
                <div class="pal-step-info">
                    <div class="pal-step-name">Penalties</div>
                    <div class="pal-step-sub">Applied last</div>
                </div>
            </div>
        </div>
        <div class="pal-override-note">
            <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>
            Manual override available — admin can reorder allocation per payment
        </div>
    </div>

    {{-- Feature Cards --}}
    <p class="pal-section-label">Allocation Features</p>
    <div class="pal-grid">

        {{-- Partial & Advance Payments --}}
        <div class="pal-card">
            <div class="pal-card-accent" style="background: linear-gradient(90deg,#d97706,#fbbf24);"></div>
            <div class="pal-card-icon-wrap" style="background:#fffbeb;">
                <svg class="h-5 w-5" style="color:#d97706;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
            </div>
            <div class="pal-card-title">Partial &amp; Advance Payments</div>
            <div class="pal-pill-list">
                <span class="pal-pill" style="background:#fffbeb;color:#b45309;">Partial</span>
                <span class="pal-pill" style="background:#ecfdf5;color:#047857;">Advance</span>
                <span class="pal-pill" style="background:#eff6ff;color:#1d4ed8;">Overpayment</span>
            </div>
            <div class="pal-card-desc">Full support for partial, advance, and overpayments with automatic carry-forward to the next due date.</div>
            <div class="pal-card-footer">
                <button class="pal-btn pal-btn-warning">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Configure
                </button>
                <span class="pal-tag" style="background:#fffbeb;color:#b45309;">Auto carry-forward</span>
            </div>
        </div>

        {{-- Void / Edit Payments --}}
        <div class="pal-card">
            <div class="pal-card-accent" style="background: linear-gradient(90deg,#dc2626,#f87171);"></div>
            <div class="pal-card-icon-wrap" style="background:#fef2f2;">
                <svg class="h-5 w-5" style="color:#dc2626;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="pal-card-title">Void / Edit Payments</div>
            <div class="pal-pill-list">
                <span class="pal-pill" style="background:#fef2f2;color:#b91c1c;">Void</span>
                <span class="pal-pill" style="background:#fff7ed;color:#c2410c;">Edit</span>
                <span class="pal-pill" style="background:#f3f4f6;color:#374151;">Audit Log</span>
            </div>
            <div class="pal-card-desc">Void or edit posted payments with mandatory reason entry. Every change is permanently logged with user and timestamp.</div>
            <div class="pal-card-footer">
                <button class="pal-btn pal-btn-danger">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Manage Voids
                </button>
                <span class="pal-tag" style="background:#fef2f2;color:#b91c1c;">Reason required</span>
            </div>
        </div>

        {{-- Auto-Apply to Loan --}}
        <div class="pal-card">
            <div class="pal-card-accent" style="background: linear-gradient(90deg,#059669,#34d399);"></div>
            <div class="pal-card-icon-wrap" style="background:#ecfdf5;">
                <svg class="h-5 w-5" style="color:#059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
            </div>
            <div class="pal-card-title">Auto-Apply to Loan</div>
            <div class="pal-pill-list">
                <span class="pal-pill" style="background:#ecfdf5;color:#047857;">Auto-match</span>
                <span class="pal-pill" style="background:#eff6ff;color:#1d4ed8;">Override</span>
            </div>
            <div class="pal-card-desc">Automatically matches and applies payments to the correct loan account. Admin can manually override the target account if needed.</div>
            <div class="pal-card-footer">
                <button class="pal-btn pal-btn-success">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    View Rules
                </button>
                <span class="pal-tag" style="background:#ecfdf5;color:#047857;">Smart matching</span>
            </div>
        </div>

    </div>
</div>
</x-filament-panels::page>