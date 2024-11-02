<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @auth
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->segment(1) === 'dashboard' ? 'active' : '' }}">
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.galleries.index') }}" class="nav-link {{ request()->segment(1) === 'galleries' || request()->segment(1) == 'event-details' ? 'active' : '' }}">
            Galleries
        </a>
    </li>
    
    </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle {{ request()->segment(1) === 'events' || request()->segment(1) == 'event-categories' || request()->segment(1) == 'event-details' ? 'active' : '' }}" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Events
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.events.index') }}">Event List</a>
                <a class="dropdown-item" href="{{ route('admin.events.create') }}"> Add New</a>
                <a class="dropdown-item" href="{{ route('admin.event-categories.index') }}"> Categories</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.sliders') }}" class="nav-link {{ request()->segment(1) === 'sliders' ? 'active' : '' }}">
                Sliders
            </a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle {{ request()->segment(1) === 'articles' ? 'active' : '' }}" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Articles
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.articles.index') }}">Article List</a>
                <a class="dropdown-item" href="{{ route('admin.articles.create') }}"> Add New</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle {{ request()->segment(1) === 'website-settings' || request()->segment(1) === 'faqs' ? 'active' : '' }}" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Settings
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.website-settings') }}">Website
                    Settings</a>
                    <a class="dropdown-item" href="{{ route('admin.faqs.index') }}">Faq</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name ?? 'Admin' }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
            </div>
        </li>
    @endauth
</ul>