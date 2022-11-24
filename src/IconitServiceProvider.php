<?php

namespace Naykel\Iconit;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class IconitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'iconit');
        $this->configureComponents();
    }

    /**
     * Configure the Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
        $this->createComponentsFromDirectory(); // base directory
        $this->createComponentsFromDirectory('payment');
        $this->createComponentsFromDirectory('logos');
    }

    /**
     * Create component from directory files
     *
     * @param mixed $dir leave blank for components directory
     * @return void
     */

    protected function createComponentsFromDirectory($dir = '')
    {

        $filesInFolder = \File::files(__dir__ . "/../resources/views/components/$dir");

        foreach ($filesInFolder as $path) {
            $fileInfo = pathinfo($path);

            // for reasons I do not understand you can not strip
            // the period from the components root directory so it
            // needs to be removed separately
            $component = rtrim($fileInfo['filename'], 'blade');
            $component = rtrim($component, '.');

            $this->registerComponent($component, $dir);
        }
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @param  string  $dir component directory
     * @param  string  $prefix (prefix.component)
     * @return void
     */
    protected function registerComponent(string $component, string $dir = '', string $prefix = 'iconit-')
    {
        if (!empty($dir)) {
            $dir = ".$dir";
        }

        Blade::component("iconit::components" . "$dir.$component", $prefix . $component);
    }
}
