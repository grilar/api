<?php

namespace Grilar\Api\Http\Controllers;

use Grilar\Api\Http\Requests\ApiSettingRequest;
use Grilar\Base\Facades\Assets;
use Grilar\Base\Facades\PageTitle;
use Grilar\Base\Http\Responses\BaseHttpResponse;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function settings()
    {
        PageTitle::setTitle(trans('packages/api::api.settings'));

        Assets::addScriptsDirectly('vendor/core/core/setting/js/setting.js');
        Assets::addStylesDirectly('vendor/core/core/setting/css/setting.css');

        return view('packages/api::settings');
    }

    public function storeSettings(ApiSettingRequest $request, BaseHttpResponse $response)
    {
        $this->saveSettings($request->except([
            '_token',
        ]));

        return $response
            ->setPreviousUrl(route('api.settings'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    protected function saveSettings(array $data)
    {
        foreach ($data as $settingKey => $settingValue) {
            if (is_array($settingValue)) {
                $settingValue = json_encode(array_filter($settingValue));
            }

            setting()->set($settingKey, (string)$settingValue);
        }

        setting()->save();
    }
}
