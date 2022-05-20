<?php

namespace App\Services\Web;

use App\Models\Admin\Account;
use App\Models\Admin\Category;
use App\Models\Admin\Currency;
use App\Models\Admin\DefaultAccount;
use App\Models\Admin\Language;
use App\Models\Admin\Page;
use App\Models\Admin\HomeBanner;
use App\Models\Localization;


use App\Traits\ApiResponser;

class HomeService
{
    use ApiResponser;
    public function homeIndex()
    {
        $data['language'] = $this->getLanguage();
        $data['currency'] = $this->getCurrency();
        $data['category'] = $this->getCategory();

        $data['selectedLenguage'] = $this->selectedLenguage();
        $data['selectedLenguageName'] = $this->selectedLenguageName();
        
        $data['selectedCurrency'] = $this->selectedCurrency();
        $data['selectedCurrencyName'] = $this->selectedCurrencyName();

        $data['direction'] =$this->selectedLenguagePosition();
        $data['pages'] = $this->contentpages();
        $data['homeBanners'] = $this->HomeBanners();
        return $data;
    }

    public function getLanguage()
    {
        return Language::get();
    }

    public function getCurrency()
    {
        return Currency::get();
    }

    public function getCategory()
    {
        $category = Category::with('detail')->with('gallary')->with('icon');
        $languageId = $this->selectedLenguage();
        $category = $category->getCategoryByLanguageId($languageId);
        return $category->get();
    }

    public function selectedLenguage(){
        $current_language_code = Localization::where('ip',\Request::ip())->first();
        if($current_language_code){
            return Language::where('code',$current_language_code->current_language)->first()->id;
        }else{
            return Language::where('is_default',1)->first()->id;
        }
    }
    public function selectedLenguageName(){
        $current_language_code = Localization::where('ip',\Request::ip())->first();
        if($current_language_code){
            return Language::where('code',$current_language_code->current_language)->first()->name;
        }else{
            return Language::where('is_default',1)->first()->name;
        }
    }

    public function selectedLenguagePosition(){
        $current_language_code = Localization::where('ip',\Request::ip())->first();
        if($current_language_code){
            return Language::where('code',$current_language_code->current_language)->first()->direction;
        }else{
            return Language::where('is_default',1)->first()->direction;
        }
    }

    public function selectedCurrency(){
        return Currency::where('is_default',1)->first()->id;
    }
    public function selectedCurrencyName(){
        return Currency::where('is_default',1)->first()->title;
    }

    public function contentpages(){
        $languageId = $this->selectedLenguage();
        $page = new Page;
        $page = $page->getPageDetailByLanguageId($languageId);
        $page = $page->where('id','<','6');
        $page = $page->get();
        return $page;
    }

    public function HomeBanners(){
        $languageId = $this->selectedLenguage();
        $homeBanners = HomeBanner::with('gallary')->where('language_id',$languageId)->get();
        return $homeBanners;
    }
}
