<?php


namespace AdolphYu\WalmartMarketplace;

use AdolphYu\FBMessenger\Events\MessagingReferralEvent;
use AdolphYu\FBMessenger\Exceptions\ServiceException;
use AdolphYu\FBMessenger\Models\Messaging\Messaging;
use AdolphYu\FBMessenger\Models\Messaging\TextMessaging;
use AdolphYu\FBMessenger\Processes\MessageDeliveryProcess;
use AdolphYu\FBMessenger\Processes\MessageEchoProcess;
use AdolphYu\FBMessenger\Processes\MessageProcess;
use AdolphYu\FBMessenger\Processes\MessageReactionProcess;
use AdolphYu\FBMessenger\Processes\MessagingAccountLinkingProcess;
use AdolphYu\FBMessenger\Processes\MessagingGamePlayProcess;
use AdolphYu\FBMessenger\Processes\MessagingHandoverProcess;
use AdolphYu\FBMessenger\Processes\MessagingOptinProcess;
use AdolphYu\FBMessenger\Processes\MessagingPolicyEnforcementProcess;
use AdolphYu\FBMessenger\Processes\MessagingPostbackProcess;
use AdolphYu\FBMessenger\Processes\MessagingReferralProcess;
use AdolphYu\FBMessenger\Processes\StandbyProcess;
use AdolphYu\WalmartMarketplace\Request\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Broadcasting\BroadcastException;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Log;

/**
 * Class WalmartMarketplace
 */
class WalmartMarketplace
{
    public $app;

    public $config;

    /**
     * constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * 设置配置
     * @return $this
     */
    public function setConfig($config){
        $this->config = $config;
        return $this;
    }

    protected function call($request){
        $request->setConfig($this->config)->send();
    }

    /**
     * Send the request
     * @param Request $request
     * @return array
     */
    public function send(Request $request):array
    {
        return $this->call($request);
    }




}
