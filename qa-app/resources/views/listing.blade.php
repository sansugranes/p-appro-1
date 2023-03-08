<x-app-layout>
    <divakkskkealslleqwllas class="questions">
        @if($questionList['data'])
            @if($questionList['meta'])
                <x-pagination :meta="$questionList['meta']"></x-pagination>
            @endif
            @foreach($questionList['data'] as $question)
                <x-question-block :contents="$question"></x-question-block>
            @endforeach
            @if($questionList['meta'])
                <x-pagination :meta="$questionList['meta']"></x-pagination>
            @endif
        @else
            <p>No question available.</p>
        @endif
    </div>
</x-app-layout>
