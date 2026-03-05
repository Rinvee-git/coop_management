<x-filament-panels::page>
<div>
<style>
    .ew-hero {
        background: linear-gradient(135deg, #1e3a5f 0%, #0f2744 60%, #0a1628 100%);
        border-radius: 1rem;
        padding: 2rem 2.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }
    .ew-hero::before {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 220px; height: 220px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.08);
    }
    .ew-hero::after {
        content: '';
        position: absolute;
        bottom: -40px; left: 30%;
        width: 140px; height: 140px;
        border-radius: 50%;
        background: rgba(251, 191, 36, 0.05);
    }
    .ew-hero-badge {
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
    .ew-hero-title {
        font-size: 1.75rem;
        font-weight: 800;
        color: #fff;
        margin: 0 0 0.4rem;
        letter-spacing: -0.02em;
    }
    .ew-hero-sub {
        color: rgba(255,255,255,0.55);
        font-size: 0.875rem;
        margin: 0;
    }
    .ew-stats {
        display: flex;
        gap: 1.5rem;
        margin-top: 1.5rem;
        flex-wrap: wrap;
    }
    .ew-stat {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 0.75rem;
        padding: 0.75rem 1.25rem;
        min-width: 120px;
    }
    .ew-stat-value {
        font-size: 1.4rem;
        font-weight: 800;
        color: #fbbf24;
        line-height: 1;
    }
    .ew-stat-label {
        font-size: 0.7rem;
        color: rgba(255,255,255,0.45);
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-top: 3px;
    }

    /* Gateway Status Strip */
    .ew-gateway-strip {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }
    .ew-gateway-card {
        background: #fff;
        border: 1px solid #f0f0f0;
        border-radius: 0.875rem;
        padding: 1rem;
        text-align: center;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        transition: all 0.2s;
        position: relative;
        overflow: hidden;
    }
    .dark .ew-gateway-card {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .ew-gateway-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.08); }
    .ew-gateway-top {
        height: 3px;
        border-radius: 0.875rem 0.875rem 0 0;
        position: absolute;
        top: 0; left: 0; right: 0;
    }
    .ew-gateway-logo {
        width: 40px; height: 40px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 0.5rem;
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 0.02em;
    }
    .ew-gateway-name {
        font-size: 0.82rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.3rem;
    }
    .dark .ew-gateway-name { color: #f9fafb; }
    .ew-status-dot {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 0.68rem;
        font-weight: 600;
        padding: 2px 8px;
        border-radius: 999px;
    }
    .ew-status-active { background: #ecfdf5; color: #059669; }
    .ew-status-pending { background: #fffbeb; color: #d97706; }
    .ew-status-inactive { background: #f3f4f6; color: #6b7280; }

    .ew-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #6b7280;
        margin-bottom: 0.75rem;
        padding-left: 2px;
    }

    .ew-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1rem;
    }

    .ew-card {
        background: #fff;
        border-radius: 0.875rem;
        border: 1px solid #f0f0f0;
        padding: 1.4rem;
        box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        transition: all 0.2s ease;
        position: relative;
        overflow: hidden;
    }
    .dark .ew-card {
        background: #1f2937;
        border-color: rgba(255,255,255,0.07);
    }
    .ew-card:hover {
        box-shadow: 0 6px 24px rgba(0,0,0,0.09);
        transform: translateY(-2px);
        border-color: #e5e7eb;
    }
    .ew-card-accent {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 0.875rem 0.875rem 0 0;
    }
    .ew-card-icon-wrap {
        width: 42px; height: 42px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 1rem;
    }
    .ew-card-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 0.35rem;
    }
    .dark .ew-card-title { color: #f9fafb; }
    .ew-card-desc {
        font-size: 0.8rem;
        color: #6b7280;
        line-height: 1.5;
        margin-bottom: 1.1rem;
    }
    .ew-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.9rem;
        border-top: 1px solid #f3f4f6;
    }
    .dark .ew-card-footer { border-color: rgba(255,255,255,0.06); }

    .ew-btn {
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
    .ew-btn:hover { filter: brightness(1.08); transform: scale(1.02); }
    .ew-btn-primary { background: #1e3a5f; color: #fff; }
    .ew-btn-success { background: #10b981; color: #fff; }
    .ew-btn-warning { background: #f59e0b; color: #fff; }
    .ew-btn-info    { background: #3b82f6; color: #fff; }
    .ew-btn-danger  { background: #ef4444; color: #fff; }

    .ew-tag {
        font-size: 0.65rem;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 999px;
    }

    .ew-log-row {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 0;
        border-bottom: 1px solid #f3f4f6;
        font-size: 0.78rem;
    }
    .dark .ew-log-row { border-color: rgba(255,255,255,0.06); }
    .ew-log-row:last-child { border-bottom: none; }
    .ew-log-badge {
        font-size: 0.62rem;
        font-weight: 700;
        padding: 2px 7px;
        border-radius: 999px;
        flex-shrink: 0;
    }

    /* Modal */
    .ew-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }
    .ew-modal-overlay.ew-open {
        display: flex;
    }
    .ew-modal {
        background: #fff;
        border-radius: 1rem;
        width: 100%;
        max-width: 520px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        overflow: hidden;
    }
    .dark .ew-modal { background: #1f2937; }
    .ew-modal-header {
        padding: 1.25rem 1.5rem 1rem;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }
    .dark .ew-modal-header { border-color: rgba(255,255,255,0.06); }
    .ew-modal-title { font-size: 0.95rem; font-weight: 800; color: #111827; }
    .dark .ew-modal-title { color: #f9fafb; }
    .ew-modal-sub { font-size: 0.72rem; color: #6b7280; margin-top: 2px; }
    .ew-modal-close {
        width: 28px; height: 28px;
        border-radius: 7px;
        border: none;
        background: #f3f4f6;
        cursor: pointer;
        font-size: 1rem;
        color: #6b7280;
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .ew-modal-close:hover { background: #e5e7eb; }
    .ew-modal-body {
        padding: 1.5rem;
        max-height: 60vh;
        overflow-y: auto;
    }
    .ew-modal-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid #f3f4f6;
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
    }
    .dark .ew-modal-footer { border-color: rgba(255,255,255,0.06); }

    .ew-form-group { margin-bottom: 1rem; }
    .ew-form-label {
        display: block;
        font-size: 0.73rem;
        font-weight: 700;
        color: #374151;
        margin-bottom: 0.35rem;
        letter-spacing: 0.02em;
    }
    .dark .ew-form-label { color: #d1d5db; }
    .ew-form-input, .ew-form-select, .ew-form-textarea {
        width: 100%;
        padding: 0.55rem 0.8rem;
        border: 1.5px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 0.82rem;
        color: #111827;
        background: #fff;
        transition: border-color 0.15s;
        font-family: inherit;
    }
    .dark .ew-form-input, .dark .ew-form-select, .dark .ew-form-textarea {
        background: #111827;
        border-color: rgba(255,255,255,0.1);
        color: #f9fafb;
    }
    .ew-form-input:focus, .ew-form-select:focus, .ew-form-textarea:focus {
        outline: none;
        border-color: #1e3a5f;
        box-shadow: 0 0 0 3px rgba(30,58,95,0.08);
    }
    .ew-form-textarea { resize: vertical; min-height: 80px; }
    .ew-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .ew-form-hint { font-size: 0.68rem; color: #9ca3af; margin-top: 0.25rem; }

    .ew-toggle-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.7rem 0;
        border-bottom: 1px solid #f9fafb;
    }
    .ew-toggle-row:last-child { border-bottom: none; }
    .ew-toggle-name { font-size: 0.82rem; font-weight: 600; color: #111827; }
    .dark .ew-toggle-name { color: #f9fafb; }
    .ew-toggle-desc { font-size: 0.7rem; color: #9ca3af; margin-top: 1px; }
    .ew-toggle {
        position: relative;
        width: 38px; height: 22px;
        flex-shrink: 0;
    }
    .ew-toggle input { opacity: 0; width: 0; height: 0; }
    .ew-toggle-slider {
        position: absolute;
        inset: 0;
        background: #d1d5db;
        border-radius: 999px;
        cursor: pointer;
        transition: 0.2s;
    }
    .ew-toggle-slider::before {
        content: '';
        position: absolute;
        height: 16px; width: 16px;
        left: 3px; bottom: 3px;
        background: #fff;
        border-radius: 50%;
        transition: 0.2s;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
    }
    .ew-toggle input:checked + .ew-toggle-slider { background: #10b981; }
    .ew-toggle input:checked + .ew-toggle-slider::before { transform: translateX(16px); }

    .ew-badge {
        display: inline-flex;
        align-items: center;
        padding: 2px 8px;
        border-radius: 999px;
        font-size: 0.65rem;
        font-weight: 700;
    }
    .ew-badge-success { background: #ecfdf5; color: #059669; }
    .ew-badge-warning { background: #fffbeb; color: #d97706; }
    .ew-badge-info    { background: #eff6ff; color: #2563eb; }
    .ew-badge-danger  { background: #fef2f2; color: #dc2626; }

    .ew-log-table { width: 100%; border-collapse: collapse; font-size: 0.78rem; }
    .ew-log-table th {
        text-align: left;
        padding: 0.45rem 0.7rem;
        background: #f9fafb;
        color: #6b7280;
        font-size: 0.67rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        border-bottom: 1px solid #f0f0f0;
    }
    .ew-log-table td {
        padding: 0.6rem 0.7rem;
        border-bottom: 1px solid #f9fafb;
        color: #374151;
    }
    .dark .ew-log-table td { color: #d1d5db; border-color: rgba(255,255,255,0.05); }
    .ew-log-table tr:last-child td { border-bottom: none; }
    .ew-log-table tr:hover td { background: #fafafa; }

    .ew-override-warning {
        background: #fef2f2;
        border: 1px solid #fecaca;
        border-radius: 0.75rem;
        padding: 1rem;
        margin-bottom: 1rem;
        display: flex;
        gap: 0.75rem;
    }
    .ew-override-icon {
        width: 32px; height: 32px;
        background: #ef4444;
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        font-size: 1rem;
        flex-shrink: 0;
    }
    .ew-override-title { font-weight: 700; font-size: 0.82rem; color: #b91c1c; margin-bottom: 2px; }
    .ew-override-text  { font-size: 0.76rem; color: #7f1d1d; line-height: 1.5; }

    /* Toast */
    .ew-toast {
        position: fixed;
        bottom: 1.5rem;
        right: 1.5rem;
        background: #111827;
        color: #fff;
        padding: 0.7rem 1.2rem;
        border-radius: 0.75rem;
        font-size: 0.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        z-index: 99999;
        transform: translateY(80px);
        opacity: 0;
        transition: all 0.3s ease;
        box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        pointer-events: none;
    }
    .ew-toast.ew-toast-show { transform: translateY(0); opacity: 1; }
    .ew-toast-dot {
        width: 18px; height: 18px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 0.65rem;
        flex-shrink: 0;
    }
    .ew-toast-success .ew-toast-dot { background: #10b981; }
    .ew-toast-warning .ew-toast-dot { background: #f59e0b; }
    .ew-toast-danger  .ew-toast-dot { background: #ef4444; }

    @media (max-width: 640px) {
        .ew-hero { padding: 1.5rem; }
        .ew-hero-title { font-size: 1.3rem; }
        .ew-stats { gap: 0.75rem; }
        .ew-stat { min-width: 90px; }
        .ew-gateway-strip { grid-template-columns: repeat(2, 1fr); }
        .ew-form-row { grid-template-columns: 1fr; }
    }
</style>

    {{-- Hero Header --}}
    <div class="ew-hero">
        <div class="ew-hero-badge">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="currentColor"><circle cx="5" cy="5" r="5"/></svg>
            Payment Management
        </div>
        <h1 class="ew-hero-title">Online &amp; E-Wallet Payments</h1>
        <p class="ew-hero-sub">Manage digital payment channels, gateway integrations, real-time validation, and auto-receipt generation.</p>
        <div class="ew-stats">
            <div class="ew-stat">
                <div class="ew-stat-value" id="ew-stat-gateways">4</div>
                <div class="ew-stat-label">Active Gateways</div>
            </div>
            <div class="ew-stat">
                <div class="ew-stat-value" id="ew-stat-today">₱0.00</div>
                <div class="ew-stat-label">Online Today</div>
            </div>
            <div class="ew-stat">
                <div class="ew-stat-value" id="ew-stat-pending">0</div>
                <div class="ew-stat-label">Pending Override</div>
            </div>
        </div>
    </div>

    {{-- Gateway Status --}}
    <p class="ew-section-label">Payment Gateway Status</p>
    <div class="ew-gateway-strip">
        <div class="ew-gateway-card" style="cursor:pointer;" onclick="ewOpenGateway('GCash','active','#0070ba','#e0f2fe','G')">
            <div class="ew-gateway-top" style="background:linear-gradient(90deg,#0070ba,#00a3e0);"></div>
            <div class="ew-gateway-logo" style="background:#e0f2fe;color:#0070ba;">G</div>
            <div class="ew-gateway-name">GCash</div>
            <span class="ew-status-dot ew-status-active">
                <span style="width:6px;height:6px;border-radius:50%;background:#10b981;display:inline-block;"></span>Active
            </span>
        </div>
        <div class="ew-gateway-card" style="cursor:pointer;" onclick="ewOpenGateway('Maya','active','#00b388','#d1fae5','M')">
            <div class="ew-gateway-top" style="background:linear-gradient(90deg,#00b388,#00d4a0);"></div>
            <div class="ew-gateway-logo" style="background:#d1fae5;color:#059669;">M</div>
            <div class="ew-gateway-name">Maya</div>
            <span class="ew-status-dot ew-status-active">
                <span style="width:6px;height:6px;border-radius:50%;background:#10b981;display:inline-block;"></span>Active
            </span>
        </div>
        <div class="ew-gateway-card" style="cursor:pointer;" onclick="ewOpenGateway('Debit Card','pending','#f59e0b','#fef3c7','DC')">
            <div class="ew-gateway-top" style="background:linear-gradient(90deg,#f59e0b,#fbbf24);"></div>
            <div class="ew-gateway-logo" style="background:#fef3c7;color:#d97706;">DC</div>
            <div class="ew-gateway-name">Debit Card</div>
            <span class="ew-status-dot ew-status-pending">
                <span style="width:6px;height:6px;border-radius:50%;background:#f59e0b;display:inline-block;"></span>Pending
            </span>
        </div>
        <div class="ew-gateway-card" style="cursor:pointer;" onclick="ewOpenGateway('Credit Card','active','#2563eb','#dbeafe','CC')">
            <div class="ew-gateway-top" style="background:linear-gradient(90deg,#2563eb,#60a5fa);"></div>
            <div class="ew-gateway-logo" style="background:#dbeafe;color:#2563eb;">CC</div>
            <div class="ew-gateway-name">Credit Card</div>
            <span class="ew-status-dot ew-status-active">
                <span style="width:6px;height:6px;border-radius:50%;background:#10b981;display:inline-block;"></span>Active
            </span>
        </div>
    </div>

    {{-- Feature Cards --}}
    <p class="ew-section-label">Features &amp; Actions</p>
    <div class="ew-grid">

        {{-- Member Portal Integration --}}
        <div class="ew-card">
            <div class="ew-card-accent" style="background: linear-gradient(90deg,#1e3a5f,#3b6cb7);"></div>
            <div class="ew-card-icon-wrap" style="background:#eff6ff;">
                <svg class="h-5 w-5" style="color:#1e3a5f;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="ew-card-title">Member Portal Integration</div>
            <div class="ew-card-desc">Payment gateways embedded directly into the member portal. Members can pay loans without leaving the portal interface.</div>
            <div class="ew-card-footer">
                <button class="ew-btn ew-btn-primary" onclick="ewOpenModal('ew-modal-portal')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Configure
                </button>
                <span class="ew-tag" style="background:#eff6ff;color:#1d4ed8;">Portal-ready</span>
            </div>
        </div>

        {{-- Real-Time Validation --}}
        <div class="ew-card">
            <div class="ew-card-accent" style="background: linear-gradient(90deg,#059669,#34d399);"></div>
            <div class="ew-card-icon-wrap" style="background:#ecfdf5;">
                <svg class="h-5 w-5" style="color:#059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <div class="ew-card-title">Real-Time Validation</div>
            <div class="ew-card-desc">Validates payment success instantly via gateway API. Auto-tags confirmed payments to the correct account or loan number.</div>
            <div class="ew-card-footer">
                <button class="ew-btn ew-btn-success" onclick="ewOpenModal('ew-modal-logs')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    View Logs
                </button>
                <span class="ew-tag" style="background:#ecfdf5;color:#047857;">Instant</span>
            </div>
        </div>

        {{-- Auto-Receipts --}}
        <div class="ew-card">
            <div class="ew-card-accent" style="background: linear-gradient(90deg,#d97706,#fbbf24);"></div>
            <div class="ew-card-icon-wrap" style="background:#fffbeb;">
                <svg class="h-5 w-5" style="color:#d97706;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="ew-card-title">Automatic Payment Confirmations</div>
            <div class="ew-card-desc">Auto-generates and delivers digital receipts to members via email or SMS upon confirmed payment from any gateway.</div>
            <div class="ew-card-footer">
                <button class="ew-btn ew-btn-warning" onclick="ewOpenModal('ew-modal-receipts')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Settings
                </button>
                <span class="ew-tag" style="background:#fffbeb;color:#b45309;">Email / SMS</span>
            </div>
        </div>

        {{-- Admin Dashboard --}}
        <div class="ew-card">
            <div class="ew-card-accent" style="background: linear-gradient(90deg,#2563eb,#60a5fa);"></div>
            <div class="ew-card-icon-wrap" style="background:#eff6ff;">
                <svg class="h-5 w-5" style="color:#2563eb;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div class="ew-card-title">Admin Dashboard</div>
            <div style="margin-bottom:0.9rem;">
                <div class="ew-log-row">
                    <span class="ew-log-badge" style="background:#ecfdf5;color:#059669;">GCash</span>
                    <span style="flex:1;color:#374151;" class="dark:text-gray-300">₱1,500.00 — Loan #00234</span>
                    <span style="color:#9ca3af;font-size:0.7rem;">9:02 AM</span>
                </div>
                <div class="ew-log-row">
                    <span class="ew-log-badge" style="background:#d1fae5;color:#059669;">Maya</span>
                    <span style="flex:1;color:#374151;" class="dark:text-gray-300">₱800.00 — Loan #00189</span>
                    <span style="color:#9ca3af;font-size:0.7rem;">8:47 AM</span>
                </div>
                <div class="ew-log-row">
                    <span class="ew-log-badge" style="background:#dbeafe;color:#2563eb;">Card</span>
                    <span style="flex:1;color:#374151;" class="dark:text-gray-300">₱3,200.00 — Loan #00301</span>
                    <span style="color:#9ca3af;font-size:0.7rem;">Yesterday</span>
                </div>
            </div>
            <div class="ew-card-footer">
                <button class="ew-btn ew-btn-info" onclick="ewOpenModal('ew-modal-dashboard')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Open Dashboard
                </button>
                <span class="ew-tag" style="background:#eff6ff;color:#1d4ed8;">Live data</span>
            </div>
        </div>

        {{-- Manual Override --}}
        <div class="ew-card">
            <div class="ew-card-accent" style="background: linear-gradient(90deg,#dc2626,#f87171);"></div>
            <div class="ew-card-icon-wrap" style="background:#fef2f2;">
                <svg class="h-5 w-5" style="color:#dc2626;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
            </div>
            <div class="ew-card-title">Manual Override</div>
            <div class="ew-card-desc">Admin can manually confirm or override payments when API validation fails. Requires reason entry and creates an audit entry.</div>
            <div class="ew-card-footer">
                <button class="ew-btn ew-btn-danger" onclick="ewOpenModal('ew-modal-override')">
                    <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    Override
                </button>
                <span class="ew-tag" style="background:#fef2f2;color:#b91c1c;">Admin only</span>
            </div>
        </div>

    </div>

    {{-- ============ MODALS ============ --}}

    {{-- Gateway Settings Modal --}}
    <div class="ew-modal-overlay" id="ew-modal-gateway" onclick="ewBgClose(event,'ew-modal-gateway')">
        <div class="ew-modal">
            <div class="ew-modal-header">
                <div>
                    <div class="ew-modal-title" id="ew-gw-title">Gateway Settings</div>
                    <div class="ew-modal-sub">Configure API credentials and features</div>
                </div>
                <button class="ew-modal-close" onclick="ewCloseModal('ew-modal-gateway')">✕</button>
            </div>
            <div class="ew-modal-body">
                <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.25rem;">
                    <div id="ew-gw-logo" style="width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.8rem;"></div>
                    <div>
                        <div id="ew-gw-name" style="font-size:1rem;font-weight:800;color:#111827;"></div>
                        <div id="ew-gw-badge" style="margin-top:3px;"></div>
                    </div>
                </div>
                <div class="ew-form-group"><label class="ew-form-label">Merchant ID</label><input class="ew-form-input" type="text" value="MRC-2024-001"></div>
                <div class="ew-form-group"><label class="ew-form-label">API Key</label><input class="ew-form-input" type="password" value="sk_live_xxxxxxxxxxxxxxxx"></div>
                <div class="ew-form-group"><label class="ew-form-label">Webhook URL</label><input class="ew-form-input" type="text" value="https://app.coop.ph/webhooks/payment"></div>
                <div class="ew-form-group"><label class="ew-form-label">Daily Limit (₱)</label><input class="ew-form-input" type="number" value="50000"></div>
                <div style="margin-top:.75rem;">
                    <div class="ew-toggle-row">
                        <div><div class="ew-toggle-name">Auto-validation</div><div class="ew-toggle-desc">Validate payments in real-time</div></div>
                        <label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label>
                    </div>
                    <div class="ew-toggle-row">
                        <div><div class="ew-toggle-name">Auto-receipts</div><div class="ew-toggle-desc">Send receipts automatically</div></div>
                        <label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label>
                    </div>
                    <div class="ew-toggle-row">
                        <div><div class="ew-toggle-name">Test mode</div><div class="ew-toggle-desc">Use sandbox environment</div></div>
                        <label class="ew-toggle"><input type="checkbox"><span class="ew-toggle-slider"></span></label>
                    </div>
                </div>
            </div>
            <div class="ew-modal-footer">
                <button class="ew-btn" style="background:#f3f4f6;color:#374151;" onclick="ewCloseModal('ew-modal-gateway')">Cancel</button>
                <button class="ew-btn ew-btn-primary" onclick="ewSaveToast('ew-modal-gateway','Gateway settings saved.')">Save Changes</button>
            </div>
        </div>
    </div>

    {{-- Portal Config Modal --}}
    <div class="ew-modal-overlay" id="ew-modal-portal" onclick="ewBgClose(event,'ew-modal-portal')">
        <div class="ew-modal">
            <div class="ew-modal-header">
                <div><div class="ew-modal-title">Member Portal Integration</div><div class="ew-modal-sub">Configure gateway display in member portal</div></div>
                <button class="ew-modal-close" onclick="ewCloseModal('ew-modal-portal')">✕</button>
            </div>
            <div class="ew-modal-body">
                <div class="ew-form-group"><label class="ew-form-label">Portal Payment Page Title</label><input class="ew-form-input" type="text" value="Pay Your Loan"></div>
                <div class="ew-form-row">
                    <div class="ew-form-group"><label class="ew-form-label">Minimum Payment (₱)</label><input class="ew-form-input" type="number" value="100"></div>
                    <div class="ew-form-group"><label class="ew-form-label">Maximum Payment (₱)</label><input class="ew-form-input" type="number" value="100000"></div>
                </div>
                <div style="font-size:.73rem;font-weight:700;color:#374151;margin:.5rem 0 .4rem;">Enabled Gateways in Portal</div>
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">GCash</div><div class="ew-toggle-desc">E-wallet</div></div><label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label></div>
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">Maya</div><div class="ew-toggle-desc">E-wallet</div></div><label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label></div>
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">Debit Card</div><div class="ew-toggle-desc">Bank card</div></div><label class="ew-toggle"><input type="checkbox"><span class="ew-toggle-slider"></span></label></div>
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">Credit Card</div><div class="ew-toggle-desc">Bank card</div></div><label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label></div>
            </div>
            <div class="ew-modal-footer">
                <button class="ew-btn" style="background:#f3f4f6;color:#374151;" onclick="ewCloseModal('ew-modal-portal')">Cancel</button>
                <button class="ew-btn ew-btn-primary" onclick="ewSaveToast('ew-modal-portal','Portal configuration saved.')">Save Configuration</button>
            </div>
        </div>
    </div>

    {{-- Validation Logs Modal --}}
    <div class="ew-modal-overlay" id="ew-modal-logs" onclick="ewBgClose(event,'ew-modal-logs')">
        <div class="ew-modal" style="max-width:600px;">
            <div class="ew-modal-header">
                <div><div class="ew-modal-title">Real-Time Validation Logs</div><div class="ew-modal-sub">Recent gateway validation events</div></div>
                <button class="ew-modal-close" onclick="ewCloseModal('ew-modal-logs')">✕</button>
            </div>
            <div class="ew-modal-body">
                <div style="display:flex;gap:.5rem;margin-bottom:1rem;flex-wrap:wrap;">
                    <input class="ew-form-input" type="text" placeholder="Search loan # or amount…" style="flex:1;min-width:130px;">
                    <select class="ew-form-select" style="width:auto;"><option>All Gateways</option><option>GCash</option><option>Maya</option><option>Card</option></select>
                    <select class="ew-form-select" style="width:auto;"><option>All Status</option><option>Success</option><option>Failed</option><option>Pending</option></select>
                </div>
                <table class="ew-log-table">
                    <thead><tr><th>Gateway</th><th>Amount</th><th>Loan #</th><th>Status</th><th>Time</th></tr></thead>
                    <tbody>
                        <tr><td><span class="ew-badge ew-badge-success">GCash</span></td><td>₱1,500.00</td><td>#00234</td><td><span class="ew-badge ew-badge-success">✓ Success</span></td><td>9:02 AM</td></tr>
                        <tr><td><span class="ew-badge ew-badge-success">Maya</span></td><td>₱800.00</td><td>#00189</td><td><span class="ew-badge ew-badge-success">✓ Success</span></td><td>8:47 AM</td></tr>
                        <tr><td><span class="ew-badge ew-badge-info">Card</span></td><td>₱3,200.00</td><td>#00301</td><td><span class="ew-badge ew-badge-success">✓ Success</span></td><td>Yesterday</td></tr>
                        <tr><td><span class="ew-badge ew-badge-success">GCash</span></td><td>₱500.00</td><td>#00155</td><td><span class="ew-badge ew-badge-danger">✗ Failed</span></td><td>Yesterday</td></tr>
                        <tr><td><span class="ew-badge ew-badge-warning">Debit</span></td><td>₱2,000.00</td><td>#00277</td><td><span class="ew-badge ew-badge-warning">⏳ Pending</span></td><td>2 days ago</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="ew-modal-footer">
                <button class="ew-btn" style="background:#f3f4f6;color:#374151;" onclick="ewCloseModal('ew-modal-logs')">Close</button>
                <button class="ew-btn ew-btn-success" onclick="ewToast('Logs exported to CSV.','success')">Export CSV</button>
            </div>
        </div>
    </div>

    {{-- Receipt Settings Modal --}}
    <div class="ew-modal-overlay" id="ew-modal-receipts" onclick="ewBgClose(event,'ew-modal-receipts')">
        <div class="ew-modal">
            <div class="ew-modal-header">
                <div><div class="ew-modal-title">Auto-Receipt Settings</div><div class="ew-modal-sub">Configure automatic confirmation delivery</div></div>
                <button class="ew-modal-close" onclick="ewCloseModal('ew-modal-receipts')">✕</button>
            </div>
            <div class="ew-modal-body">
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">Send Email Receipt</div><div class="ew-toggle-desc">Deliver receipt via email on confirmation</div></div><label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label></div>
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">Send SMS Receipt</div><div class="ew-toggle-desc">Send SMS notification to member</div></div><label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label></div>
                <div class="ew-toggle-row"><div><div class="ew-toggle-name">Include Balance Summary</div><div class="ew-toggle-desc">Show remaining loan balance in receipt</div></div><label class="ew-toggle"><input type="checkbox" checked><span class="ew-toggle-slider"></span></label></div>
                <div class="ew-form-group" style="margin-top:1rem;"><label class="ew-form-label">Email Sender Name</label><input class="ew-form-input" type="text" value="Coop Payments"></div>
                <div class="ew-form-group"><label class="ew-form-label">Reply-To Email</label><input class="ew-form-input" type="email" value="payments@coop.ph"></div>
                <div class="ew-form-group"><label class="ew-form-label">SMS Template</label><textarea class="ew-form-textarea">Hi {name}, your payment of {amount} for Loan #{loan_no} has been confirmed. Ref: {ref}. Thank you!</textarea></div>
            </div>
            <div class="ew-modal-footer">
                <button class="ew-btn" style="background:#f3f4f6;color:#374151;" onclick="ewCloseModal('ew-modal-receipts')">Cancel</button>
                <button class="ew-btn ew-btn-warning" onclick="ewSaveToast('ew-modal-receipts','Receipt settings saved.')">Save Settings</button>
            </div>
        </div>
    </div>

    {{-- Dashboard Modal --}}
    <div class="ew-modal-overlay" id="ew-modal-dashboard" onclick="ewBgClose(event,'ew-modal-dashboard')">
        <div class="ew-modal" style="max-width:560px;">
            <div class="ew-modal-header">
                <div><div class="ew-modal-title">Payment Dashboard</div><div class="ew-modal-sub">Live transaction overview</div></div>
                <button class="ew-modal-close" onclick="ewCloseModal('ew-modal-dashboard')">✕</button>
            </div>
            <div class="ew-modal-body">
                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:.75rem;margin-bottom:1.25rem;">
                    <div style="background:#f9fafb;border-radius:.75rem;padding:.9rem;text-align:center;border:1px solid #f0f0f0;"><div style="font-size:1.2rem;font-weight:800;color:#059669;">₱5,500</div><div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;margin-top:2px;">Today</div></div>
                    <div style="background:#f9fafb;border-radius:.75rem;padding:.9rem;text-align:center;border:1px solid #f0f0f0;"><div style="font-size:1.2rem;font-weight:800;color:#2563eb;">3</div><div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;margin-top:2px;">Transactions</div></div>
                    <div style="background:#f9fafb;border-radius:.75rem;padding:.9rem;text-align:center;border:1px solid #f0f0f0;"><div style="font-size:1.2rem;font-weight:800;color:#d97706;">1</div><div style="font-size:.65rem;color:#9ca3af;text-transform:uppercase;margin-top:2px;">Pending</div></div>
                </div>
                <table class="ew-log-table">
                    <thead><tr><th>Gateway</th><th>Amount</th><th>Loan #</th><th>Status</th><th>Time</th></tr></thead>
                    <tbody>
                        <tr><td><span class="ew-badge ew-badge-success">GCash</span></td><td>₱1,500.00</td><td>#00234</td><td><span class="ew-badge ew-badge-success">Confirmed</span></td><td>9:02 AM</td></tr>
                        <tr><td><span class="ew-badge ew-badge-success">Maya</span></td><td>₱800.00</td><td>#00189</td><td><span class="ew-badge ew-badge-success">Confirmed</span></td><td>8:47 AM</td></tr>
                        <tr><td><span class="ew-badge ew-badge-info">Card</span></td><td>₱3,200.00</td><td>#00301</td><td><span class="ew-badge ew-badge-success">Confirmed</span></td><td>Yesterday</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="ew-modal-footer">
                <button class="ew-btn" style="background:#f3f4f6;color:#374151;" onclick="ewCloseModal('ew-modal-dashboard')">Close</button>
                <button class="ew-btn ew-btn-info" onclick="ewToast('Report exported.','success')">Export Report</button>
            </div>
        </div>
    </div>

    {{-- Override Modal --}}
    <div class="ew-modal-overlay" id="ew-modal-override" onclick="ewBgClose(event,'ew-modal-override')">
        <div class="ew-modal">
            <div class="ew-modal-header">
                <div><div class="ew-modal-title">Manual Payment Override</div><div class="ew-modal-sub">Admin-level action — requires reason</div></div>
                <button class="ew-modal-close" onclick="ewCloseModal('ew-modal-override')">✕</button>
            </div>
            <div class="ew-modal-body">
                <div class="ew-override-warning">
                    <div class="ew-override-icon">⚠</div>
                    <div>
                        <div class="ew-override-title">Admin Action Required</div>
                        <div class="ew-override-text">This override will be permanently logged with your admin credentials, timestamp, and reason. This action cannot be undone.</div>
                    </div>
                </div>
                <div class="ew-form-row">
                    <div class="ew-form-group"><label class="ew-form-label">Loan Number</label><input class="ew-form-input" type="text" placeholder="e.g. #00234" id="ew-ov-loan"></div>
                    <div class="ew-form-group"><label class="ew-form-label">Amount (₱)</label><input class="ew-form-input" type="number" placeholder="0.00" id="ew-ov-amount"></div>
                </div>
                <div class="ew-form-group"><label class="ew-form-label">Gateway</label>
                    <select class="ew-form-select" id="ew-ov-gateway">
                        <option>GCash</option><option>Maya</option><option>Debit Card</option><option>Credit Card</option>
                    </select>
                </div>
                <div class="ew-form-group"><label class="ew-form-label">Reference Number</label><input class="ew-form-input" type="text" placeholder="Gateway reference #" id="ew-ov-ref"></div>
                <div class="ew-form-group">
                    <label class="ew-form-label">Override Reason <span style="color:#ef4444;">*</span></label>
                    <textarea class="ew-form-textarea" placeholder="Explain why manual override is needed…" id="ew-ov-reason"></textarea>
                    <div class="ew-form-hint">Minimum 20 characters required.</div>
                </div>
                <div class="ew-form-group"><label class="ew-form-label">Admin Password <span style="color:#ef4444;">*</span></label><input class="ew-form-input" type="password" placeholder="Confirm your password" id="ew-ov-pass"></div>
            </div>
            <div class="ew-modal-footer">
                <button class="ew-btn" style="background:#f3f4f6;color:#374151;" onclick="ewCloseModal('ew-modal-override')">Cancel</button>
                <button class="ew-btn ew-btn-danger" onclick="ewSubmitOverride()">Submit Override</button>
            </div>
        </div>
    </div>

    {{-- Toast --}}
    <div class="ew-toast" id="ew-toast">
        <div class="ew-toast-dot" id="ew-toast-dot">✓</div>
        <span id="ew-toast-msg"></span>
    </div>

    <script>
        function ewOpenModal(id) { document.getElementById(id).classList.add('ew-open'); }
        function ewCloseModal(id) { document.getElementById(id).classList.remove('ew-open'); }
        function ewBgClose(e, id) { if (e.target === e.currentTarget) ewCloseModal(id); }

        var ewToastTimer;
        function ewToast(msg, type) {
            type = type || 'success';
            var t = document.getElementById('ew-toast');
            var dot = document.getElementById('ew-toast-dot');
            t.className = 'ew-toast ew-toast-' + type;
            dot.textContent = type === 'success' ? '✓' : type === 'warning' ? '!' : '✕';
            document.getElementById('ew-toast-msg').textContent = msg;
            t.classList.add('ew-toast-show');
            clearTimeout(ewToastTimer);
            ewToastTimer = setTimeout(function() { t.classList.remove('ew-toast-show'); }, 3000);
        }
        function ewSaveToast(id, msg) {
            ewCloseModal(id);
            setTimeout(function() { ewToast(msg, 'success'); }, 200);
        }

        function ewOpenGateway(name, status, color, bg, abbr) {
            document.getElementById('ew-gw-title').textContent = name + ' — Settings';
            var logo = document.getElementById('ew-gw-logo');
            logo.textContent = abbr; logo.style.background = bg; logo.style.color = color;
            document.getElementById('ew-gw-name').textContent = name;
            document.getElementById('ew-gw-badge').innerHTML = status === 'active'
                ? '<span class="ew-badge ew-badge-success">● Active</span>'
                : '<span class="ew-badge ew-badge-warning">● Pending</span>';
            ewOpenModal('ew-modal-gateway');
        }

        function ewSubmitOverride() {
            var loan   = document.getElementById('ew-ov-loan').value.trim();
            var amount = document.getElementById('ew-ov-amount').value.trim();
            var reason = document.getElementById('ew-ov-reason').value.trim();
            var pass   = document.getElementById('ew-ov-pass').value.trim();
            if (!loan)                             { ewToast('Please enter a loan number.', 'danger'); return; }
            if (!amount || parseFloat(amount) <= 0){ ewToast('Please enter a valid amount.', 'danger'); return; }
            if (reason.length < 20)                { ewToast('Reason must be at least 20 characters.', 'danger'); return; }
            if (!pass)                             { ewToast('Admin password is required.', 'danger'); return; }
            var el = document.getElementById('ew-stat-pending');
            el.textContent = parseInt(el.textContent) + 1;
            ewCloseModal('ew-modal-override');
            setTimeout(function() { ewToast('Override submitted and logged.', 'success'); }, 200);
        }
    </script>
</div>
</x-filament-panels::page>