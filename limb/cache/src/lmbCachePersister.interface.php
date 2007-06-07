<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com 
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html 
 */
define('LIMB_CACHE_NULL_RESULT', 'cache_null_' . md5(mt_rand()));

/**
 * interface lmbCachePersister.
 *
 * @package cache
 * @version $Id: lmbCachePersister.interface.php 5959 2007-06-07 13:47:57Z pachanga $
 */
interface lmbCachePersister
{
  function getId();
  function put($key, $value, $group = 'default');
  function get($key, $group = 'default');
  function flushValue($key, $group = 'default');
  function flushGroup($group);
  function flushAll();
}
?>
