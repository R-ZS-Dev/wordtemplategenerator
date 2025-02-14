<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Template;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

class WordExportController extends Controller
{
    public function generateWord($orderId, $templateId)
    {
        $order = Order::findOrFail($orderId);
        $template = Template::findOrFail($templateId);

        // Ensure template file exists
        $templatePath = storage_path('app/private/templates/' . basename($template->file_path));
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template file not found at: ' . $templatePath], 404);
        }

        $templateProcessor = new TemplateProcessor($templatePath);

        // Replace placeholders
        $templateProcessor->setValue('customer_name', $order->customer_name);
        $templateProcessor->setValue('email', $order->email);
        $templateProcessor->setValue('order_date', \Carbon\Carbon::parse($order->order_date)->format('Y-m-d'));
        $templateProcessor->setValue('total_amount', number_format($order->total_amount, 2));

        // Ensure the generated_documents folder exists
        $outputDir = storage_path('app/generated_documents/');
        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true); // Create directory with full permissions
        }

        // Define output file name
        $outputFilePath = $outputDir . 'invoice_' . $order->id . '.docx';

        // Save and download
        $templateProcessor->saveAs($outputFilePath);

        return response()->download($outputFilePath)->deleteFileAfterSend();
    }
}
