@extends('backend.admin-master')
@section('site-title')
    {{__('OTP Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.success/>
                <x-msg.error/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">{{__("OTP Settings")}}</h4>
                        <form action="{{route('admin.general.otp.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!--otp env settings -->
                            <h6>{{ __('Configure Twilio credentials') }}</h6>
                            <div class="form-group mt-3">
                                <label for="TWILIO_SID"><strong>{{__('Twilio SID')}} <span class="text-danger">*</span> </strong></label>
                                    <input type="text"  class="form-control" name="TWILIO_SID" value="{{ env('TWILIO_SID') }}" 
                                    placeholder="{{ __('TWILIO_SID')}}">
                                                                  
                            </div>

                            <div class="form-group">
                                <label for="TWILIO_AUTH_TOKEN"><strong>{{__('Twilio Auth Token')}} <span class="text-danger">*</span></strong></label>
                                    <input type="text"  class="form-control" name="TWILIO_AUTH_TOKEN" value="{{ env('TWILIO_AUTH_TOKEN') }}"
                                    placeholder="{{ __('TWILIO_AUTH_TOKEN')}}">                                   
                            </div> 
                            
                            <div class="form-group">
                                <label for="TWILIO_NUMBER"><strong>{{__('Valid Twilio Number')}} <span class="text-danger">*</span> </strong></label>
                                    <input type="text" class="form-control" name="TWILIO_NUMBER" value="{{ env('TWILIO_NUMBER') }}"
                                    placeholder="{{ __('TWILIO_NUMBER')}}">  
                            </div>  
                                    
{{--                            <div class="form-group">--}}
{{--                                <label for="disable_user_otp_verify"><strong>{{__('User OTP Verify')}}</strong></label>--}}
{{--                                <label class="switch">--}}
{{--                                    <input type="checkbox" name="disable_user_otp_verify"  @if(!empty(get_static_option('disable_user_otp_verify'))) checked @endif id="disable_user_otp_verify">--}}
{{--                                    <span class="slider-enable-disable"></span>--}}
{{--                                </label>--}}
{{--                                <span class="form-text text-muted">{{__('Disable, means user must have to verify their OTP in order to access his/her dashboard.')}}</span>--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="disable_user_otp_verify"><strong>{{__('OTP Expire Time Add')}}</strong></label>
                                <select name="user_otp_expire_time" class="form-control">
                                    <option  value="30" @if(get_static_option('user_otp_expire_time') == '30')  selected  @endif>{{__('30 Second')}}</option>
                                    <option  value="1" @if(get_static_option('user_otp_expire_time') == '1')  selected  @endif>{{__('1 Minute')}}</option>
                                    <option  value="1.5" @if(get_static_option('user_otp_expire_time') == '1.5')  selected  @endif>{{__('1.5 Minutes')}}</option>
                                    <option  value="2" @if(get_static_option('user_otp_expire_time') == '2')  selected  @endif>{{__('2 Minutes')}}</option>
                                    <option  value="2.5" @if(get_static_option('user_otp_expire_time') == '2.5')  selected  @endif>{{__('2.5 Minutes')}}</option>
                                    <option  value="3" @if(get_static_option('user_otp_expire_time') == '3')  selected  @endif>{{__('3. Minutes')}}</option>
                                    <option  value="3.5" @if(get_static_option('user_otp_expire_time') == '3.5')  selected  @endif>{{__('3.5 Minutes')}}</option>
                                    <option  value="4" @if(get_static_option('user_otp_expire_time') == '4')  selected  @endif>{{__('4 Minutes')}}</option>
                                    <option  value="4.5" @if(get_static_option('user_otp_expire_time') == '4.5')  selected  @endif>{{__('4.5 Minutes')}}</option>
                                    <option  value="5" @if(get_static_option('user_otp_expire_time') == '5')  selected  @endif>{{__('5 Minutes')}}</option>
                                </select>
                                <span class="form-text text-muted">{{__('User OTP verify Expire Time Add.')}}</span>
                            </div>                                                 

                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection