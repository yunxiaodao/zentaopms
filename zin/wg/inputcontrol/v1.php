<?php
namespace zin;

require_once dirname(__DIR__) . DS . 'control' . DS . 'v1.php';

class inputControl extends wg
{
    protected static $defineProps =
    [
        'prefix?: mixed',
        'suffix?: mixed',
        'prefixWidth?: string|number',
        'suffixWidth?: string|number',
    ];

    public static $defineBlocks =
    [
        'prefix' => [],
        'suffix' => [],
    ];

    protected function build()
    {
        list($prefix, $suffix, $prefixWidth, $suffixWidth) = $this->prop(['prefix', 'suffix', 'prefixWidth', 'suffixWidth']);

        if(empty($prefix)) $prefix = $this->block('prefix');
        if(empty($suffix)) $suffix = $this->block('suffix');

        $class = ['input-control'];
        $vars  = [];
        if(!empty($prefix))
        {
            if(is_numeric($prefixWidth))
            {
                $vars['input-control-prefix'] = $prefixWidth . 'px';
                $class[] = 'has-prefix';
            }
            elseif(!empty($prefixWidth))
            {
                $class[] = "has-prefix-$prefixWidth";
            }
            else
            {
                $class[] = 'has-prefix';
            }
        }
        if(!empty($suffix))
        {
            if(is_numeric($suffixWidth))
            {
                $vars['input-control-suffix'] = $suffixWidth . 'px';
                $class[] = 'has-suffix';
            }
            elseif(!empty($suffixWidth))
            {
                $class[] = "has-suffix-$suffixWidth";
            }
            else
            {
                $class[] = 'has-suffix';
            }
        }

        return div
        (
            setClass($class),
            empty($vars) ? NULL : setCssVar($vars),
            $this->children(),
            empty($prefix) ? NULL : div(setClass('input-control-prefix'), $prefix),
            empty($suffix) ? NULL : div(setClass('input-control-suffix'), $suffix)
        );
    }
}
