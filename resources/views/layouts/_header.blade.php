<header class="mb-3">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" role="navigation">
        <div class="container">
            <a href="{{ url('/') }}">
                <h1 class="navbar-brand brand-font mb-0">{{ config('app.name') }}</h1>
            </a>

            <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

            <b-collapse is-nav id="nav_collapse" v-cloak>
                {{-- Left side, browsing links --}}
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>

                {{-- Right side, authentication links --}}
                <ul class="navbar-nav">
                    @auth
                        <b-nav-item-dropdown right v-cloak>
                            <template slot="button-content">
                                <i class="fa fa-bell-o"></i>
                            </template>
                            <b-dropdown-header>Notifications</b-dropdown-header>
                            <b-dropdown-item>
                                Notifications section to be completed.
                            </b-dropdown-item>
                        </b-nav-item-dropdown>

                        <b-nav-item-dropdown text="{{ auth()->user()->name }}" right>
                            <template slot="button-content">
                                <i class="fa fa-user-o"></i>
                            </template>

                            <b-dropdown-item href="#">Link #1</b-dropdown-item>
                            <b-dropdown-item href="#">Link #2</b-dropdown-item>
                            <b-dropdown-item href="#">Link #3</b-dropdown-item>

                            <b-dropdown-divider></b-dropdown-divider>

                            <post-request-link class="dropdown-item" href="{{ route('logout') }}">Logout</post-request-link>
                        </b-nav-item-dropdown>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Sign up</a>
                        </li>
                    @endguest
                </ul>
            </b-collapse>
        </div>
    </nav>
</header>