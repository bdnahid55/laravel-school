<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

use App\Models\Logo;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Announcement;
use App\Models\SchoolHistory;
use App\Models\SpeechOne;
use App\Models\SpeechTwo;
use App\Models\Download;
use App\Models\ImportantLink;
use App\Models\Notice;
use App\Models\Footer;
use App\Models\Page;



class HomePageController extends Controller
{

    public function index()
    {
        $Logo = Logo::first();
        $Menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        $Slider = Slider::all();
        $Announcement = Announcement::all();
        $SchoolHistory = SchoolHistory::first();
        $SpeechOne = SpeechOne::first();
        $SpeechTwo = SpeechTwo::first();
        $Download = Download::all();
        $ImportantLink = ImportantLink::all();
        $Notice = Notice::all();
        $Footer = Footer::first();
        $Page = Page::all();

        // echo "<pre>";
        // print_r($Download);
        // print_r($SchoolHistory);
        // print_r($SpeechTwo);
        // print_r($SpeechOne);
        // print_r($Footer);
        // echo "</pre>";
        // exit();

        return view('front.index', compact('Logo', 'Menus', 'Slider', 'Announcement', 'SchoolHistory', 'SpeechOne', 'SpeechTwo', 'Download', 'Notice', 'ImportantLink', 'Footer', 'Page'));
        // End of code
    }

    public function announcementshow($id)
    {
        $Logo = Logo::first();
        $Menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        $Footer = Footer::first();
        $preview_announcement = DB::table('announcements')
            ->where('id', $id)
            ->first();

        //$preview_announcement = Announcement::find($id);

        // echo "<pre>";
        // print_r($preview_announcement);
        // echo "</pre>";
        // exit();

        return view('front.announcement', compact('preview_announcement', 'Menus', 'Footer', 'Logo'));

        // End of code
    }

    public function downloadshow($id)
    {
        $Logo = Logo::first();
        $Menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        $Footer = Footer::first();
        $preview_download = DB::table('downloads')
            ->where('id', $id)
            ->first();

        //$preview_download = Download::find($id);

        // echo "<pre>";
        // print_r($preview_download);
        // echo "</pre>";
        // exit();

        return view('front.download', compact('preview_download', 'Menus', 'Footer', 'Logo'));

        // End of code
    }

    public function noticeshow($id)
    {
        $Logo = Logo::first();
        $Menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        $Footer = Footer::first();
        $preview_notice = DB::table('notices')
            ->where('id', $id)
            ->first();

        //$preview_notice = Notice::find($id);

        // echo "<pre>";
        // print_r($preview_notice);
        // echo "</pre>";
        // exit();

        return view('front.notice', compact('preview_notice', 'Menus', 'Footer', 'Logo'));

        // End of code
    }

    public function pageshow($id)
    {
        $Logo = Logo::first();
        $Menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        $Footer = Footer::first();
        $preview_page = DB::table('pages')
            ->where('id', $id)
            ->first();

        //$preview_page = Page::find($id);

        // echo "<pre>";
        // print_r($preview_page);
        // echo "</pre>";
        // exit();

        return view('front.page', compact('preview_page', 'Menus', 'Footer', 'Logo'));

        // End of code
    }
}
