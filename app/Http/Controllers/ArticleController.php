<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function summarize(Request $request)
    {
        $request->validate(['url' => 'required|url']);

        $url = $request->input('url');

        // Fetch the article content
        $response = Http::get($url);
        $html = $response->body();

        // Parse the HTML to extract the article text
        $articleText = $this->extractArticleText($html);

        // Call ChatGPT API to summarize the article
        $summary = $this->getSummary($articleText);

        return view('index', compact('summary', 'url'));
    }

    private function extractArticleText($html)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($html); // Suppress warnings for invalid HTML

        $xpath = new \DOMXPath($dom);

        // Adjust the XPath query based on the structure of the article's HTML
        $nodes = $xpath->query('//article');

        if ($nodes->length > 0) {
            $articleText = '';
            foreach ($nodes as $node) {
                $articleText .= $dom->saveHTML($node);
            }
            return strip_tags($articleText); // Remove HTML tags
        }

        return ''; // Fallback if no article node is found
    }

    private function getSummary($text)
    {
        $apiKey = env('OPENAI_API_KEY');
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post($endpoint, [
            'model' => 'gpt-4o-mini', // Use the latest available model or 'gpt-4'
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => "Summarize the following article: " . $text],
            ],
            'max_tokens' => 150,
        ]);

        $data = $response->json();
        // dd($data);
        return $data['choices'][0]['message']['content'];
    }
}
