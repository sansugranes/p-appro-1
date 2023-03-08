<?php

namespace App\Http\Controllers\Api;

use Illuminate\Auth\Events\Authenticated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Constant defining base access path for questions API
     */
    private const API_URL = 'api:3000/question/';

    public function answer(int $id)
    {
        $contents = self::get($id);
        if ($contents[0]['ansContent'] == null) {
            return view('question.answer', [
                'contents' => $contents[0]
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public static function createAnswer(Request $request)
    {
        $response = Http::patch(self::API_URL . '/' . $request->input('questionId'), ["content" => $request->input('answer'), "author" => Auth::user()->name]);
        return redirect()->route('home');
    }

    public function ask()
    {
        return view('question.ask');
    }

    public function createQuestion(Request $request)
    {
        $response = Http::post(self::API_URL, ["content" => $request->input('question'), "author" => Auth::user()->name]);
        return redirect()->route('home');
    }

    /**
     * Create question. Sends question data to API.
     * @param $questionArray
     * @return array
     */
    public static function create($questionArray): array
    {
        // TODO(sss): Test if questionArray is valid
        $response = Http::post(self::API_URL, $questionArray);
        return $response->json();
    }

    /**
     * Lists all questions with a pagination system.
     * @param Request $request
     * @return array Array of questions in data, current page in meta.
     */
    public static function list(Request $request): array
    {
        $page = 1;
        $validated = $request->validate(['page' => 'numeric']);
        if (array_key_exists('page', $validated)) {
            $page = $validated['page'] ?: 1;
        }
        // If user doesn't exist, set request type to onlyAnswered
        $type = $request->user() == null ? 'onlyAnswered' : 'all';

        $response = Http::get(self::API_URL, ['page' => $page, 'type' => $type]);
        return $response->json();
    }

    /**
     * Gets a specific question based on its ID.
     * @param int $id Question ID to remove.
     * @return array
     */
    public static function get(int $id): array
    {
        $response = Http::get(self::API_URL . $id);
        return $response->json();
    }

    /**
     * Remove a question based on its ID.
     * TODO(sss): Implement user check.
     * @param int $id Question ID to remove.
     * @return array
     */
    public static function remove(int $id): array
    {
        throw new Exception('Not implemented.');

        //$response = Http::delete(self::API_URL . $id);
        //return $response->json();
    }
}
