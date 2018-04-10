<?php
/**
 * @link http://ipaya.cn/
 * @copyright Copyright (c) 2018 ipaya.cn
 */

namespace iPaya\Yii2\FileSystem;


use iPaya\FileSystem\Adapters\Adapter;
use iPaya\FileSystem\FileSystem;
use yii\di\Instance;

class Component extends \yii\base\Component
{
    /**
     * @var Adapter
     */
    public $adapter;

    private $_filesystem;

    public function init()
    {
        parent::init();
        Instance::ensure($this->adapter, Adapter::class);
    }

    /**
     * @return FileSystem
     */
    public function getFilesystem()
    {
        if ($this->_filesystem == null) {
            $this->_filesystem = new FileSystem($this->adapter);
        }
        return $this->_filesystem;
    }
}
