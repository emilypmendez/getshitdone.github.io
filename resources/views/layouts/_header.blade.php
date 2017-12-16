@auth
    <div style="position: absolute; top: 1rem; left: 1rem">
        <b-dropdown size="lg" variant="outline-secondary" no-caret v-cloak>
            <template slot="button-content">
                <i class="fa fa-bars"></i>
            </template>

            <b-dropdown-item href="{{ route('dashboard') }}">Home</b-dropdown-item>
            <b-dropdown-item href="#" disabled>Profile</b-dropdown-item>

            <b-dropdown-divider></b-dropdown-divider>

            <post-request-link class="dropdown-item" href="{{ route('logout') }}">Logout</post-request-link>
        </b-dropdown>
    </div>
@endauth