<?php
namespace ZF2Tracy;

use Zend\Mvc\MvcEvent;
use Tracy\Debugger;

/**
 *
 * @author Jorge Sierra
 */
class Module
{
    /**
     * Setup Tracy\Debugger with options
     *
     * @param MvcEvent $e
     * @return void
     */
    public function onBootstrap(MvcEvent $e)
    {
        $app = $e->getApplication();
        $config = $app->getConfig();

        if (empty($config['tracy_debug'])
            || empty($config['tracy_debug']['enabled'])
        ) return;

        array_key_exists('mode', $config['tracy_debug']) or $config['tracy_debug']['mode'] = NULL;
        array_key_exists('log', $config['tracy_debug']) or $config['tracy_debug']['log'] = NULL;
        array_key_exists('email', $config['tracy_debug']) or $config['tracy_debug']['email'] = NULL;

        Debugger::enable(
            $config['tracy_debug']['mode'],
            $config['tracy_debug']['log'],
            $config['tracy_debug']['email']
        );

        !array_key_exists('strict', $config['tracy_debug']) or Debugger::$strictMode = $config['tracy_debug']['strict'];
        !array_key_exists('max_depth', $config['tracy_debug']) or Debugger::$maxDepth = $config['tracy_debug']['max_depth'];
        !array_key_exists('max_len', $config['tracy_debug']) or Debugger::$maxLen = $config['tracy_debug']['max_len'];
    }

    /**
     * Module default config
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Default autoloader config
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'Tracy' => __DIR__ . '/../../vendor/Tracy',
                ),
            ),
        );
    }
}