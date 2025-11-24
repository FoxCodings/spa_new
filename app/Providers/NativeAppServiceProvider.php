<?php

namespace App\Providers;

use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
     public function boot(): void
   {
       // MenuBar::create()
       //     // ->route('/about')
       //     ->width(300)
       //     ->height(300)
       //     ->showDockIcon();
       //
       // Menu::new()
       //     ->appMenu()
       //     ->editMenu()
       //     ->viewMenu()
       //     ->windowMenu()
       //     ->submenu('About', Menu::new()
       //         ->link('https://beyondco.de', 'Beyond Code')
       //         ->link('https://simonhamp.me', 'Simon Hamp')
       //         ->separator()
       //         ->label('My Label')
       //
       //     )->register();

       // Menu::new()
       //     ->appMenu()
       //     ->submenu('About', Menu::new()
       //         ->link('https://beyondco.de', 'Beyond Code')
       //         ->link('https://simonhamp.me', 'Simon Hamp')
       //     )
       //     ->submenu('View', Menu::new()
       //         ->toggleFullscreen()
       //         ->separator()
       //         ->link('https://laravel.com', 'Learn More', 'CmdOrCtrl+L')
       //     )
       //     ->register();

       Window::open()
           ->width(400)
           ->height(400)
           ->showDevTools(false)
           ->rememberState();
   }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [
          'memory_limit' => '512M',

          'display_errors' => '1',

          'error_reporting' => 'E_ALL',

          'max_execution_time' => '0',

          'max_input_time' => '0',

        ];
    }


}
