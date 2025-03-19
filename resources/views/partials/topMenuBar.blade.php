<nav class="topMenuParent">
    <!-- App Name -->
    <div>My Blog App</div>

    <!-- Navigation Menu -->
    <div>
        <ul>
            <li><a href="/posts">Posts</a></li>
            @guest
                <li><a href="/login">Login</a></li>
                <li><a href="/register">SignUp</a></li>
            @else
                <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </div>

    <!-- User Profile -->
    <div class="user-profile">
        @auth
            @if(auth()->user()->profileImageURL)
                <img src="{{ Storage::url(auth()->user()->profileImageURL) }}" alt="Profile Image" class="profile-image">
            @else
                <div class="profile-placeholder"></div>
            @endif
        @endauth
    </div>
</nav>