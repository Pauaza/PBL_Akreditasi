<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PageConfigController extends Controller
{
    public function getConfig()
    {
        try {
            $config = json_decode(Storage::get('page_config.json'), true);
            if (!is_array($config)) {
                throw new \Exception('File page_config.json tidak valid atau kosong.');
            }
            return $config;
        } catch (\Exception $e) {
            Log::error('Gagal membaca page_config.json: ' . $e->getMessage());
            return [];
        }
    }

    protected function saveConfig($config)
    {
        Storage::put('page_config.json', json_encode($config, JSON_PRETTY_PRINT));
    }

    public function index()
    {
        $pages = $this->getConfig();
        return view('superAdmin.pageconfig.index', compact('pages'));
    }

    public function view($id, $tab)
    {
        $config = $this->getConfig();
        $content = isset($config[$id][$tab]['content']) ? (string)($config[$id][$tab]['content'] ?? '') : null;
        $image_path = $config[$id][$tab]['image_path'] ?? null;
        Log::info('View - Content for ' . $id . '/' . $tab . ': ', [$content]);
        return view('superAdmin.pageConfig.view_ajax', [
            'page_id' => $id,
            'tab' => $tab,
            'content' => $content,
            'image_path' => $image_path,
        ]);
    }

    public function edit($id, $tab)
    {
        $config = $this->getConfig();
        $content = isset($config[$id][$tab]['content']) ? (string)($config[$id][$tab]['content'] ?? '') : null;
        $image_path = $config[$id][$tab]['image_path'] ?? null;
        Log::info('Edit - Content for ' . $id . '/' . $tab . ': ', [$content]);
        return view('superAdmin.pageConfig.edit_ajax', [
            'page_id' => $id,
            'tab' => $tab,
            'content' => $content,
            'image_path' => $image_path,
        ]);
    }

    public function update(Request $request, $id, $tab)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // Ubah max dari 2048 ke 5120 (5MB)
        ]);
        $config = $this->getConfig();
        if (!isset($config[$id])) {
            $config[$id] = [];
        }
        if (!isset($config[$id][$tab])) {
            $config[$id][$tab] = [];
        }
        $config[$id][$tab]['content'] = $request->input('content');
        if ($request->hasFile('image')) {
            if (!empty($config[$id][$tab]['image_path'])) {
                Storage::disk('public')->delete($config[$id][$tab]['image_path']);
            }
            $imagePath = $request->file('image')->store('page_images', 'public');
            $config[$id][$tab]['image_path'] = $imagePath;
        }
        $this->saveConfig($config);
        return response()->json([
            'status' => true,
            'message' => 'Konten berhasil diperbarui!',
        ]);
    }
}
