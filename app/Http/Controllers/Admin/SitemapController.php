<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\SeoContent;
use App\Models\BasicDetails;
class SitemapController extends Controller
{
   public function edit()
{
    // Read the content of the robots.txt file
    $filePath = public_path('sitemap.xml');
    $sitemapContent = file_get_contents($filePath);

    $page_title = 'Edit Sitemap.xml'; // Set the page title
    $basic_details = BasicDetails::where('id','1')->first();

    return view('admin.sitemap.edit', compact('sitemapContent', 'page_title','basic_details'));
}

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required',
        ]);

        // Get the content from the request
        $content = $request->input('content');

        // Write the content to the robots.txt file
        $filePath = public_path('sitemap.xml');
        file_put_contents($filePath, $content);

        // Optionally, you can add a success flash message or any other logic you need here

        return redirect()->back()->with('success', 'Sitemap.xml file updated successfully');
    }
}
