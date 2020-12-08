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

    public function __construct($config)
    {
        $this->channel_type = $config['channel_type'];
        $this->client_id = $config['client_id'];
        $this->client_secret = $config['client_secret'];
    }

    public function toArray()
    {
        return [
            'channel_type'=>$this->channel_type,
            'client_id'=>$this->client_id,
            'client_secret'=>$this->client_secret,
        ];
        // TODO: Implement toArray() method.
    }
}