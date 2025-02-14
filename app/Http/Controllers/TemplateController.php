<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:docx|max:2048'
        ]);

        // Store file in storage/app/templates/
        $filePath = $request->file('file')->store('templates');


        // Save in DB
        Template::create([
            'name' => $request->name,
            'file_path' => $filePath
        ]);

        return redirect()->route('templates.create')->with('success', 'Template uploaded successfully');
    }
}
