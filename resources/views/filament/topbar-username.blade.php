<style>
    #topbar-username {
        display: flex;
        align-items: center;
        padding: 0 1rem;
        font-size: 0.875rem;
        /* font-weight: 700; */
        text-transform: uppercase;
        letter-spacing: 0.05em;
        white-space: nowrap;
        color: #374151;
    }

    .dark #topbar-username {
        color: #ffffff;
    }
</style>

@auth
    <div id="topbar-username">
        {{ Auth::user()->name }}
    </div>
@endauth
