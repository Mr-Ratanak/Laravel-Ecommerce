@extends('layouts.admin')

@section('content')
<form action="{{url('admin/setting/store')}}" method="POST" class="p-2">
    @csrf
    @component('components.alerts')
        
    @endcomponent
    <div class="card">
        <div class="card-header bg-primary">Website</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="website_name" class="font-weight-bolder">Website Name</label>
                            <input type="text" name="website_name" id="website_name" class="form-control" value="{{$settings->website_name ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="website_url">Website URL</label>
                            <input type="text" name="website_url" id="website_url" class="form-control" value="{{ old('website_url', isset($settings) ? $settings->website_url : '') }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="page_title">Page Title</label>
                            <input type="text" name="page_title" id="page_title" class="form-control" value="{{ old('page_title', isset($settings) ? $settings->page_title : '') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="meta_keyword">Meta Keyword</label>
                            <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ old('meta_keyword', isset($settings) ? $settings->meta_keyword : '') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" class="form-control">{{ old('meta_description', isset($settings) ? $settings->meta_description : '') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">Website Information</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control">{{ old('address', isset($settings) ? $settings->address : '') }}</textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone_one">Phone Number 1 <span class="text-danger">*</span></label>
                        <input type="text" name="phone_one" id="phone_one" class="form-control" value="{{ old('phone_one', isset($settings) ? $settings->phone_one : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone_two">Phone Number 2</label>
                        <input type="text" name="phone_two" id="phone_two" class="form-control" value="{{ old('phone_two', isset($settings) ? $settings->phone_two : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email_one">E-mail 1<span class="text-danger">*</span></label>
                        <input type="email" name="email_one" id="email_one" class="form-control" value="{{ old('email_one', isset($settings) ? $settings->email_one : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email_two">E-mail 2</label>
                        <input type="email" name="email_two" id="email_two" class="form-control" value="{{ old('email_two', isset($settings) ? $settings->email_two : '') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">Website - Social Media</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="facebook">Facebook <span>(Optional)</span></label>
                        <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', isset($settings) ? $settings->facebook : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="twitter">Twitter <span>(Optional)</span></label>
                        <input type="text" name="twitter" id="twitter" class="form-control" value="{{ old('twitter', isset($settings) ? $settings->twitter : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="instagram">Instagram <span>(Optional)</span></label>
                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{ old('instagram', isset($settings) ? $settings->instagram : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="youtube">Youtube <span>(Optional)</span></label>
                        <input type="text" name="youtube" id="youtube" class="form-control" value="{{ old('youtube', isset($settings) ? $settings->youtube : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="linkin">linkIn <span>(Optional)</span></label>
                        <input type="text" name="linkin" id="linkin" class="form-control" value="{{ old('linkin', isset($settings) ? $settings->linkin : '') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="telegram">Telegram <span>(Optional)</span></label>
                        <input type="text" name="telegram" id="telegram" class="form-control" value="{{ old('telegram', isset($settings) ? $settings->telegram : '') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary btn-lg rounded-0 float-end my-2">Save Setting</button>
    </div>
        
</form>

@endsection