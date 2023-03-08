<div class="question-container">
    <span class="question-title">{{$contents['queContent']}}</span>
    @if($contents['ansContent'])
        <span class="question-answer">{{$contents['ansContent']}}</span>
    @endif
    <hr>
    <div class="actions">
        <div class="two-button">
            <a class="primary-button icon-text-button" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                    <path
                            d="M7.38835 13.4862H4.71835C1.40835 13.4862 0.048351 11.1362 1.70835 8.26621L3.04835 5.95621L4.38835 3.64621C6.04835 0.776213 8.75835 0.776213 10.4184 3.64621L11.7584 5.95621L13.0983 8.26621C14.7583 11.1362 13.3984 13.4862 10.0884 13.4862H7.38835Z"
                            stroke="#F9FAF4" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                </svg>
                2.5k
            </a>
            <a class="secondary-button" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                    <path
                            d="M7.8207 1.48999H10.3225C13.424 1.48999 14.6983 3.84146 13.1429 6.71325L11.8873 9.0247L10.6317 11.3361C9.07629 14.2079 6.53699 14.2079 4.98156 11.3361L3.72596 9.0247L2.47037 6.71325C0.914937 3.84146 2.18927 1.48999 5.29077 1.48999L7.8207 1.48999Z"
                            stroke="#F9FAF4" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
        @if(Route::has('register'))
            @if($contents['ansContent'])
               <!-- TODO(sss): Add answer field ? -->
            @else
                <a href="/answer/{{ $contents['idQuestion'] }}" class="primary-button icon-text-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <path
                            d="M6.53395 2.66522C6.65974 3.39659 7.04911 4.06929 7.64096 4.57772C8.23281 5.08614 8.99361 5.40151 9.80395 5.47431M1.19995 11.9107H12M7.35595 1.87431L2.42995 6.61431C2.24395 6.79431 2.06395 7.14886 2.02795 7.39431L1.80595 9.16158C1.72795 9.79976 2.23195 10.2361 2.92795 10.127L4.85995 9.82704C5.12995 9.7834 5.50795 9.6034 5.69395 9.41795L10.62 4.67795C11.472 3.85976 11.856 2.92704 10.53 1.78704C9.20995 0.657947 8.20795 1.05613 7.35595 1.87431Z"
                            stroke="#F9FAF4" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>
                    Répondre
                </a>
            @endif
        @endif
    </div>
</div>
