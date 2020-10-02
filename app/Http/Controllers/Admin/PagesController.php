<?php

namespace App\Http\Controllers\Admin;

use App\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return view('Admin.Pages.pages')->with('pages', $pages);
    }

    public function create()
    {
        return view('Admin.Pages.create');
    }

    public function parseHTML($html)
    {
        $description        =$html;
        $dom                = new \DomDocument();
        libxml_use_internal_errors(true);

        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            // dd(strlen($data));
            if (strlen($data) < 25) {
                continue;
            }

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data              = base64_decode($data);

            $image_name= '/pages/' . time() . $k . '.png';
            $path      = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();
        return $description;
    }

    public function store(Request $request)
    {
        $description = $this->parseHTML($request->page);
        Pages::create([
            'page'       => $this->removeWhiteSpaces($description),
            'visibility' => $request->visibility,
            'slug'       => Str::slug($request->title),
            'title'      => $request->title,
        ]);

        return redirect()->route('pages.index');
    }

    public function show($page)
    {
        $page = Pages::where('slug', $page)->first();

        return view('frontend.pages.pages', compact('page'));
    }

    public function edit(Pages $page)
    {
        return view('Admin.Pages.edit', compact('page'));
    }

    public function update(Request $request, Pages $page)
    {
        $description = $this->parseHTML($request->description);
        $page->update([
            'page'       => $this->removeWhiteSpaces($description),
            'visibility' => $request->visibility,
            'slug'       => Str::slug($request->title),
            'title'      => $request->title,
        ]);
        return redirect()->route('pages.index');
    }

    public function removeWhiteSpaces($string)
    {
        return preg_replace('/\s\s+/', ' ', $string);
    }

    public function destroy(Pages $page)
    {
        $page->delete();
        return redirect()->back();
    }
}
