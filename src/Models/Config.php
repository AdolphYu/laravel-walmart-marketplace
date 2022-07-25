<?php
namespace AdolphYu\WalmartMarketplace\Models;


/**
 * Class Config
 * @package AdolphYu\WalmartMarketplace\Models
 */
class  Config extends Model
{
    public $channel_type;
    public $client_id;
    public $client_secret;
    public $country;
    public $mode;
    public $consumer_id;
    public $private_key;

    public function __construct($config)
    {
        $this->channel_type = $config['channel_type'];
        $this->client_id = $config['client_id'] ?? '';
        $this->client_secret = $config['client_secret'] ?? '';
        $this->country = $config['country'] ?? 'us';
        $this->mode = $config['mode'] ?? 'dev';
        $this->consumer_id = $config['consumer_id'] ?? '';
        $this->private_key = $config['private_key'] ?? '';
    }

    public function toArray()
    {
        return [
            'channel_type'=>$this->channel_type,
            'client_id'=>$this->client_id,
            'client_secret'=>$this->client_secret,
            'country'=>$this->country,
            'mode'=>$this->mode,
        ];
        // TODO: Implement toArray() method.
    }
}