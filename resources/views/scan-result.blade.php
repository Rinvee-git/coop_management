<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --teal:     #0d9488;
            --teal-dk:  #0f766e;
            --teal-lt:  #ccfbf1;
            --dark:     #0f172a;
            --mid:      #334155;
            --soft:     #94a3b8;
            --bg:       #f0fdfa;
            --white:    #ffffff;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background-image:
                radial-gradient(ellipse 100% 60% at 50% -20%, rgba(13,148,136,.2) 0%, transparent 70%),
                radial-gradient(ellipse 50% 40% at 90% 100%, rgba(13,148,136,.1) 0%, transparent 60%);
        }

        .card {
            background: var(--white);
            border-radius: 28px;
            box-shadow: 0 32px 80px rgba(13,148,136,.15), 0 4px 24px rgba(15,23,42,.1);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            opacity: 0;
            transform: translateY(40px) scale(.97);
            transition: opacity .6s cubic-bezier(.22,1,.36,1), transform .6s cubic-bezier(.22,1,.36,1);
        }

        .card.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        /* Header */
        .card-header {
            background: linear-gradient(135deg, var(--teal) 0%, var(--teal-dk) 100%);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .card-header::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M20 20h20v20H20zM0 0h20v20H0z'/%3E%3C/g%3E%3C/svg%3E");
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto .75rem;
            backdrop-filter: blur(8px);
            border: 2px solid rgba(255,255,255,.2);
        }

        .header-icon svg {
            width: 28px;
            height: 28px;
            fill: none;
            stroke: #fff;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .org-label {
            font-size: .68rem;
            font-weight: 600;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: rgba(255,255,255,.6);
            margin-bottom: .3rem;
        }

        .card-title {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
        }

        /* Avatar */
        .avatar-section {
            display: flex;
            justify-content: center;
            margin-top: -2.5rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid var(--white);
            background: linear-gradient(135deg, var(--teal), var(--teal-dk));
            box-shadow: 0 8px 24px rgba(13,148,136,.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
        }

        /* Body */
        .card-body {
            padding: 0 1.75rem 1.75rem;
        }

        .username {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            text-align: center;
            margin-bottom: .3rem;
        }

        .badge-row {
            display: flex;
            justify-content: center;
            gap: .5rem;
            margin-bottom: 1.5rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            font-size: .72rem;
            font-weight: 600;
            padding: .3rem .85rem;
            border-radius: 99px;
        }

        .badge-teal {
            background: var(--teal-lt);
            color: var(--teal-dk);
        }

        .badge-green {
            background: #dcfce7;
            color: #16a34a;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: .4; }
        }

        /* Info grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .65rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: .85rem 1rem;
            transition: border-color .2s, box-shadow .2s;
            opacity: 0;
            transform: translateY(12px);
            transition: opacity .4s ease, transform .4s ease, border-color .2s, box-shadow .2s;
        }

        .info-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .info-item:hover {
            border-color: var(--teal-lt);
            box-shadow: 0 4px 12px rgba(13,148,136,.08);
        }

        .info-item.full {
            grid-column: span 2;
        }

        .info-label {
            font-size: .62rem;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--soft);
            margin-bottom: .25rem;
        }

        .info-value {
            font-size: .95rem;
            font-weight: 600;
            color: var(--dark);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: 1.25rem;
            color: var(--soft);
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        /* Footer */
        .card-footer {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: .9rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-text {
            font-size: .7rem;
            color: var(--soft);
        }

        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: .3rem;
            background: #dcfce7;
            color: #16a34a;
            font-size: .68rem;
            font-weight: 700;
            padding: .25rem .7rem;
            border-radius: 99px;
        }

        .verified-badge svg {
            width: 12px;
            height: 12px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Scan timestamp */
        .scan-time {
            text-align: center;
            font-size: .7rem;
            color: var(--soft);
            margin-bottom: 1rem;
        }

        @media (max-width: 380px) {
            .info-grid { grid-template-columns: 1fr; }
            .info-item.full { grid-column: span 1; }
        }
    </style>
</head>
<body>

<div class="card" id="card">

    {{-- Header --}}
    <div class="card-header">
        <div class="header-icon">
            <svg viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
        <div class="org-label">Cooperative Management System</div>
        <div class="card-title">Member Profile</div>
    </div>

    {{-- Avatar --}}
    <div class="avatar-section">
        <div class="avatar" id="avatar">
            {{ strtoupper(substr($user['username'], 0, 1)) }}
        </div>
    </div>

    {{-- Body --}}
    <div class="card-body">

        <div class="username">{{ $user['username'] }}</div>

        <div class="badge-row">
            <span class="badge badge-teal">{{ $user['profile'] }}</span>
            <span class="badge badge-green">
                <span class="dot"></span>
                {{ $user['status'] }}
            </span>
        </div>

        <div class="scan-time" id="scan-time"></div>

        <div class="info-grid" id="info-grid">
            <div class="info-item">
                <div class="info-label">User ID</div>
                <div class="info-value">#{{ str_pad($user['user_id'], 5, '0', STR_PAD_LEFT) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Coop ID</div>
                <div class="info-value">{{ $user['coop_id'] }}</div>
            </div>
            <div class="info-item full">
                <div class="info-label">Username</div>
                <div class="info-value">{{ $user['username'] }}</div>
            </div>
            <div class="info-item full">
                <div class="info-label">Profile / Role</div>
                <div class="info-value">{{ $user['profile'] }}</div>
            </div>
        </div>

        <div class="divider">Verified Member</div>

    </div>

    {{-- Footer --}}
    <div class="card-footer">
        <span class="footer-text">Coop Management &copy; {{ date('Y') }}</span>
        <span class="verified-badge">
            <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
            Verified
        </span>
    </div>

</div>

<script>
    // Animate card in
    window.addEventListener('load', () => {
        setTimeout(() => {
            document.getElementById('card').classList.add('visible');
        }, 100);

        // Staggered info items
        const items = document.querySelectorAll('.info-item');
        items.forEach((item, i) => {
            setTimeout(() => {
                item.classList.add('visible');
            }, 300 + (i * 100));
        });

        // Show scan timestamp
        const now = new Date();
        const formatted = now.toLocaleString('en-PH', {
            month: 'long', day: 'numeric', year: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit'
        });
        document.getElementById('scan-time').textContent = 'Scanned on ' + formatted;
    });
</script>

</body>
</html>