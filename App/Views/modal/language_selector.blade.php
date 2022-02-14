<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Your Language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="lang">
                    <fieldset>
                        <legend>Please select your language and submit:</legend>
                        <div class="toggle">
                            <input type="radio" name="my_lang" value="english" id="my-lang-1" @if( isset($_COOKIE['ju_user_lang']) && $_COOKIE['ju_user_lang'] == 'english') checked="checked" @endif/>
                            <label for="my-lang-1">English</label>
                            <input type="radio" name="my_lang" value="hindi" id="my-lang-2"  @if( isset($_COOKIE['ju_user_lang']) && $_COOKIE['ju_user_lang'] == 'hindi') checked="checked" @endif />
                            <label for="my-lang-2">Hindi</label>
                        </div>

                        {{--<p class="status">Toggle is <span>auto width</span><span>full width</span>.</p>--}}
                        <p class="status">अपनी भाषा चुनिए हिंदी अथवा अंग्रेजी</p>
                    </fieldset>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="my-language-selector">Submit</button>
            </div>
        </div>
    </div>
</div>