<?php
namespace app\components;

use ScssPhp\ScssPhp\Compiler;

class ScssCompiler
{
    public static function compile($scssFile, $cssFile)
    {
        $compiler = new Compiler();
        $compiler->setImportPaths(dirname($scssFile));
        
        $scssContent = file_get_contents($scssFile);
        
        // Используем новый метод compileString()
        $cssContent = $compiler->compileString($scssContent)->getCss();
        
        file_put_contents($cssFile, $cssContent);
    }
}