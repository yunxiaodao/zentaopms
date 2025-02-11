<?php
/**
 * The block setter class file of zin lib.
 *
 * @copyright   Copyright 2023 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @author      Hao Sun <sunhao@easycorp.ltd>
 * @package     zin
 * @version     $Id
 * @link        https://www.zentao.net
 */

namespace zin;

require_once 'directive.class.php';

class to
{
    public static function __callStatic($name, $args)
    {
        return directive('block', array($name => $args));
    }
}
