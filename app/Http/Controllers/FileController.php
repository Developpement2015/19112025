<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    /**
     * Serve note files with authentication
     */
    public function serveNoteFile($filename)
    {
        // Decode the filename in case it contains special characters
        $filename = urldecode($filename);
        
        // Build the full path
        $path = storage_path('app/public/' . $filename);
        
        // Check if file exists
        if (!file_exists($path)) {
            abort(404, 'Fichier non trouvé: ' . $filename);
        }
        
        // Check if file is readable
        if (!is_readable($path)) {
            abort(403, 'Fichier non accessible');
        }
        
        // Get file info
        $mimeType = mime_content_type($path);
        $fileSize = filesize($path);
        
        // Return the file response
        return response()->file($path, [
            'Content-Type' => $mimeType,
            'Content-Length' => $fileSize,
            'Cache-Control' => 'no-cache, must-revalidate',
        ]);
    }
}
