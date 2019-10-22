<?php
/**
 * @author:wangwei<1194023603@qq.com>
 * Project:lock
 * File:ServiceContainer.php
 * Time:2019/10/21 11:32
 */

namespace Wei\Lock\Kernel;


use Pimple\Container;

class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $providers = [];

    /**
     * @var array
     */
    protected $defaultConfig = [];

    public function __construct(array $config, array $values = [])
    {
        parent::__construct($values);
        $this->registerConfig($config)
            ->registerProviders();
    }

    protected function registerConfig($config)
    {
        $this['config'] = function () use ($config) {
            return new Config(
                array_replace_recursive(
                    $this->defaultConfig,
                    $config
                )
            );
        };

        return $this;
    }

    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider);
        }

        return $this;
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed  $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }
}