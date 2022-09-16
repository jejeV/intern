<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="http://weave.co.id/" target="_blank" class="app-brand-link">
              <img src="/assets/img/logo/logo_weave.png" alt="" width="70%">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ Request::is('/*') ? 'active' : '' }}">
              <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Menu Tabel</span>
            </li>

            <li class="menu-item {{ Request::is('stasiun*') ? 'active' : '' }}">
              <a href="/stasiun" class="menu-link">
                <i class="menu-icon tf-icons bx bx-train"></i>
                <div data-i18n="Analytics">Stasiun</div>
              </a>
            </li>

            <li class="menu-item {{ Request::is('customer*') ? 'active' : '' }}">
              <a href="/customer" class="menu-link">
                <i class='bx bx-user mr-2' style="margin-right: 10px;"></i>
                <div data-i18n="Analytics">Customer</div>
              </a>
            </li>

            <li class="menu-item {{ Request::is('ticket*') ? 'active' : '' }}">
              <a href="/ticket" class="menu-link">
                <i class='bx bx-credit-card-front' style="margin-right: 10px;"></i>
                <div data-i18n="Analytics">Ticket Trouble</div>
              </a>
            </li>

            <li class="menu-item {{ Request::is('data-center*') ? 'active' : '' }}">
              <a href="/data-center" class="menu-link">
                <i class='bx bx-data' style="margin-right: 10px;"></i>
                <div data-i18n="Analytics">Data Center</div>
              </a>
            </li>

            <li class="menu-item {{ Request::is('service*') ? 'active' : '' }}">
              <a href="/service" class="menu-link">
                <i class='bx bx-station' style="margin-right: 10px;"></i>
                <div data-i18n="Analytics">Service</div>
              </a>
            </li>

            <li class="menu-item {{ Request::is('perangkat*') ? 'active' : '' }}">
              <a href="/perangkat" class="menu-link">
                <i class='bx bxs-devices' style="margin-right: 10px"></i>
                <div data-i18n="Analytics">Perangkat</div>
              </a>
            </li>
          </ul>
        </aside>