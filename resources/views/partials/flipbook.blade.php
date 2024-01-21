<div class="flex-center">
    <div class="cont-background">
        <p>{{ $quote }}</p>
    </div>
    <div id="flipbook" class="flipbook">
        <div class="hard hide-when-back cover-page-outside"><h1>Questy</h1></div>
        <div id="fixed-front" class="hard hide-when-back cover-page-inside-left"></div>
        @php($counter = 0)
        @foreach($quests as $quest)
            @if($quest->location === $lokacia)
                <div class="own-size hide-when-back normal-page">
                    <h3>{{ $quest->name }}</h3>
                    <p>{{ $quest->body }}</p>
                    @php($counter++)
                </div>
                @if($quest->image_path)
                    <div class="own-size hide-when-back normal-page">
                        <img src="{{ asset('storage/' . $quest->image_path) }}" alt="Quest Image" style="object-fit: cover; width: 312px; height: 450px; margin: 50px">
                    </div>
                    @php($counter++)
                @endif
            @endif
        @endforeach
        @if($counter % 2 == 1)
            <div class="own-size hide-when-back normal-page"></div>
        @endif
        <div id="fixed-back" class="hard fixed cover-page-inside-right"></div>
        <div class="hard cover-page-outside"></div>
    </div>
</div>
