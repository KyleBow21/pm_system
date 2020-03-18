<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Swansea University</h3>
    </div>

    <ul class="list-unstyled components">
        <!-- User information will be displayed here -->
        <p>User information goes here (eventually)</p>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                User Name<span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        <li class="active">
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>
            <a href="#">Projects</a>
        </li>
        <li>
            <a href="#moduleSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modules</a>
            <!-- This will contain a list of all the modules that a user is subscribed to -->
            <ul class="collapse list-unstyled" id="moduleSubmenu">
                <li>
                    <a href="#">Module 1</a>
                </li>
                <li>
                    <a href="#">Module 2</a>
                </li>
                <li>
                    <a href="#">Module 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Assignments</a>
        </li>
        <li>
            <!-- This is just a placeholder as I do not know what we could put here aside from maybe the contacts a user would have? -->
            <a href="#">Contacts</a>
        </li>
        <li>
            <!-- Link to a users personal account settings and misc things like that -->
            <a href="#">Settings</a>
        </li>
    </ul>
</nav>