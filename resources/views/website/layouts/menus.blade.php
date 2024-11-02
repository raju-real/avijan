<li><a href="{{ route('home') }}" class="{{ request()->segment(1) === null ? 'active' : '' }}">Home</a></li>
<li><a href="{{ route('about-us') }}" class="{{ request()->segment(1) === 'about-us' ? 'active' : '' }}">About Us</a></li>
<li><a href="{{ route('all-events') }}" class="{{ request()->segment(1) === 'all-events' || request()->segment(1) == 'event-details' ? 'active' : '' }}">Events</a></li>
<li><a href="{{ route('all-articles') }}" class="{{ request()->segment(1) === 'all-articles' || request()->segment(1) == 'article-details' ? 'active' : '' }}">Articles</a></li>
<li><a href="{{ route('contact-us') }}" {{ request()->segment(1) === 'contact-us' ? 'active' : '' }}>Contact Us</a></li>
