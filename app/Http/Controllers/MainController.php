<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected function random()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 6);
    }

    public function index()
    {
        return view('index');
    }

    public function create(Request $request)
    {
        $url = $request->input('url');
        $check_url = preg_match("%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu
", $url);
        if ($check_url) {
            $hash = $this->random();

            $link = new Link();
            $link->hash = $hash;
            $link->url = $url;
            $link->save();

            return view('index', ['url' => $link->hash]);
        } else {
            return view('index', ['error' => "Неверная ссылка"]);
        }

    }

    public function url($hash)
    {
        $link = Link::where('hash', $hash)->get();

        return redirect($link[0]->url);
    }

}
