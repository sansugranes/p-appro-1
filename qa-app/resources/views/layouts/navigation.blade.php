<div class="nav-container">
    <div class="nav flex justify-between" id="navbar">
        <a class="logo" href="{{ route('home') }}">
            <x-application-logo/>
        </a>
        <div class="searchbar">
            <svg class="searchbar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" fill="none">
                <path
                    d="M13.5 13.5L12.3 12.3M7.2 12.9C7.94853 12.9 8.68974 12.7526 9.3813 12.4661C10.0729 12.1797 10.7012 11.7598 11.2305 11.2305C11.7598 10.7012 12.1797 10.0729 12.4661 9.3813C12.7526 8.68974 12.9 7.94853 12.9 7.2C12.9 6.45147 12.7526 5.71026 12.4661 5.0187C12.1797 4.32715 11.7598 3.69879 11.2305 3.16949C10.7012 2.6402 10.0729 2.22034 9.3813 1.93389C8.68974 1.64743 7.94853 1.5 7.2 1.5C5.68827 1.5 4.23845 2.10053 3.16949 3.16949C2.10053 4.23845 1.5 5.68827 1.5 7.2C1.5 8.71173 2.10053 10.1616 3.16949 11.2305C4.23845 12.2995 5.68827 12.9 7.2 12.9Z"
                    stroke="#6061F1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <input class="border-transparent focus:border-transparent focus:ring-0" type="search"
                   placeholder="Rechercher..."/>
        </div>
        <div class="right-nav-container">
            @auth
                <a class="primary-button icon-text-button" href="ask">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M1 7H13M7 13V1" stroke="#F9FAF4" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    Poser une question
                </a>
                <div class="dropdown-menu">
                    <button class="dropbtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                            <path d="M2 2H21M2 10H21M2 18H21" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu-content">
                        <span class="dropdown-user-name">John Do</span>
                        <hr>
                        <div class="dropdown-links">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            <a href="/" onclick="event.preventDefault(); this.closest('form').submit();">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="14" viewBox="0 0 10 14"
                                         fill="none">
                                        <path
                                            d="M4.99721 6.37329C4.93663 6.36723 4.86395 6.36723 4.79732 6.37329C4.10206 6.34968 3.44329 6.05639 2.96051 5.55552C2.47773 5.05465 2.20886 4.38555 2.21084 3.68989C2.21084 2.20584 3.41019 1.00044 4.90029 1.00044C5.25308 0.994073 5.60366 1.05726 5.93203 1.18638C6.2604 1.31551 6.56011 1.50805 6.81407 1.75301C7.06803 1.99796 7.27125 2.29054 7.41214 2.61404C7.55302 2.93754 7.62881 3.28562 7.63517 3.6384C7.64154 3.99119 7.57835 4.34177 7.44923 4.67014C7.3201 4.99851 7.12756 5.29823 6.8826 5.55218C6.63765 5.80614 6.34507 6.00936 6.02157 6.15025C5.69807 6.29113 5.34999 6.36692 4.99721 6.37329ZM1.96855 8.60844C0.502672 9.58973 0.502672 11.1889 1.96855 12.1641C3.63431 13.2786 6.36616 13.2786 8.03193 12.1641C9.4978 11.1828 9.4978 9.58367 8.03193 8.60844C6.37222 7.49995 3.64037 7.49995 1.96855 8.60844Z"
                                            stroke="#6061F1" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <span>Se déconnecter</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="7" height="14" viewBox="0 0 7 14"
                                     fill="none">
                                    <path d="M1 13L5.59317 8.06061C6.13561 7.47727 6.13561 6.52273 5.59317 5.93939L1 1"
                                          stroke="#6061F1" stroke-width="2" stroke-miterlimit="10"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="basic-link">S'inscrire</a>
                @endif
                <a href="{{ route('login') }}" class="primary-button">Se Connecter</a>
            @endauth
        </div>
    </div>
</div>
