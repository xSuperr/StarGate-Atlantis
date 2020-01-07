<?php
namespace alemiz\sga\packets;

/* This class helps you to create your own/custom Packets
* Your packet must extend this class so 'extends StarGatePacket'
* I recommend to look into some official packet to better understanding*/

use alemiz\sga\StarGateAtlantis;

abstract class StarGatePacket{

    /**
     * Literally its packet Name
     * @var string
     */
    protected $type;

    /**
     * Every packet must have its own ID
     * ID must be unique to prevent crashes or packets rewrites
     * Official IDs are registered in @class Packets
     * @var int
     */
    protected $ID;

    /** @var string */
    public $encoded;

    /** @var boolean */
    public $isEncoded = false;

    /**
     * UUID is used for returning response if is needed
     * @var string
     */
    public $uuid;

    /** We use this functions to be able work with string compression
     * encode() => Converts data to string and save it tp $encoded
     * decode() => Converts from string in $encoded and saves it
     * Every packet has custom data, so you must adjust it yourself
     * Try to inspire by official packets*/

    public abstract function encode();
    public abstract function decode();

    /**
     * StarGatePacket constructor.
     * @param string $type
     * @param int $ID
     */
    public function __construct(string $type, int $ID){
        $this->type = $type;
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function putPacket() : string{
        return StarGateAtlantis::getInstance()->putPacket($this);
    }

    /**
     * @return string
     */
    public function getType() : string {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getID() : int {
        return $this->ID;
    }
}