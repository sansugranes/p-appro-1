<x-app-layout>
    <div class="questions">
        @if(Route::has('register'))
            <form method="POST" action="/answer" class="question-container">
                @csrf

                <input type="hidden" name="questionId" value="{{$contents['idQuestion']}}">
                <span class="question-title">{{$contents['queContent']}}</span>
                <hr>
                @if(!$contents['ansContent'])
                    <textarea name="answer"></textarea>
                @endif
                <button type="submit" class="primary-button icon-text-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <path
                            d="M6.53395 2.66522C6.65974 3.39659 7.04911 4.06929 7.64096 4.57772C8.23281 5.08614 8.99361 5.40151 9.80395 5.47431M1.19995 11.9107H12M7.35595 1.87431L2.42995 6.61431C2.24395 6.79431 2.06395 7.14886 2.02795 7.39431L1.80595 9.16158C1.72795 9.79976 2.23195 10.2361 2.92795 10.127L4.85995 9.82704C5.12995 9.7834 5.50795 9.6034 5.69395 9.41795L10.62 4.67795C11.472 3.85976 11.856 2.92704 10.53 1.78704C9.20995 0.657947 8.20795 1.05613 7.35595 1.87431Z"
                            stroke="#F9FAF4" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round"/>
                    </svg>
                    Répondre
                </button>
            </form>
        @endif
    </div>
</x-app-layout>
