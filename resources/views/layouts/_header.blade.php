@auth
    <div style="position: absolute; top: 1rem; left: 1rem">
        <b-dropdown variant="link" no-caret v-cloak>
            <template slot="button-content" class="p-0">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-bars fa-stack-1x fa-inverse"></i>
                </span>
            </template>

            <b-dropdown-item href="{{ route('dashboard') }}">Home</b-dropdown-item>
            <b-dropdown-item href="#" disabled>Profile</b-dropdown-item>

            <b-dropdown-divider></b-dropdown-divider>

            <post-request-link class="dropdown-item" href="{{ route('logout') }}">Logout</post-request-link>
        </b-dropdown>
    </div>
@endauth