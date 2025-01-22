<?php
use App\Http\Controllers\SohbetController;

use Illuminate\Support\Facades\Route;

Route::post('/', function (\Illuminate\Http\Request $request) {
    $Sorular = $request->session()->get('Sorular', [
        ['role' => 'system', 'content' => 'You are Sohbet-GPT - A ChatGPT clone. Answer as concisely as possible.']
    ]);

    $Sorular[] = ['role' => 'user', 'content' => $request->input('soru')];

    $response = \OpenAI\Laravel\Facades\OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => $Sorular]);
    $Sorular[] = ['role' => 'assistant', 'content' => $response->choices[0]->message->content];
    $request->session()->put('Sorular', $Sorular);

    return redirect('/');

});

Route::get('/reset', [SohbetController::class, 'reset']);


Route::get('/', function () {
    $Sorular = collect(session('Sorular', []))->reject(fn ($soru) => $soru['role'] === 'system');

    return view('welcome', [
        'Sorular' => $Sorular
    ]);
});
?>
