<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\SeoContent;
use App\Models\Redirection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // Checking if any redireciton exists
        $redirectionCheck = Redirection::where('url',request()->fullUrl())->where('status',1)->first();
        if($redirectionCheck)
        {
            http_response_code($redirectionCheck->redirect_status);
            $url = "http://www.tradewheel.devs/rice?debugT=yes";
            header("Location: $redirectionCheck->redirection_url"); 
            exit;
        }
        
        // Setting up header/footer scripts if any
        $seoContent = SeoContent::whereIn('key',['template_header_tags','template_footer_tags'])->get()->keyBy('key');
        
        if($seoContent->count() > 0 )
        {

            if(isset($seoContent['template_header_tags']))
            {
                \Config::set('global.header_scripts', $seoContent['template_header_tags']->content);
            }
            
            if(isset($seoContent['template_footer_tags']))
            {
                \Config::set('global.footer_scripts', $seoContent['template_footer_tags']->content);
            }
          
        }
        
        
        
    }
}