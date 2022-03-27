<!-- Subscribe / get email part -->
<div id="subscribe" class="subscribe main-wrapper">
    <div class="container">
        <div class="subscribe-box">
            <h2>@lang('home.get_match_argent_bride')</h2>
            <p>@lang('home.start_communication_with_potention_partner')</p>
            <div class="email-box">
                <form method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="left-content">
                                <h6>@lang('home.subscriber_here_to_get_member_notification')</h6>
                                <input class="subs-input" type="email" class="form-control" placeholder="@lang('home.email_address')" name="email" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="right-content">
                                <h5>@lang('home.to_get_notification')</h5>
                                <div class="subs-btn">
                                    <button type="submit"> @lang('home.subscribe') </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




