<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Post;
use App\Models\Quest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'body' => 'required|min:300',
            'image' => 'nullable',
            'quest' => 'nullable',
            'character' => 'required'
        ]);

        $incomingFields['body'] = strip_tags($incomingFields['body'], '<p>');
        $incomingFields['user_id'] = auth()->id();

        $quest = Quest::where('name', $incomingFields['quest'])->first();
        if ($quest) {
            $incomingFields['quest_id'] = $quest->id;
        }

        $character = Character::where('name', $incomingFields['character'])->first();
        $incomingFields['character_id'] = $character->id;

        Post::create($incomingFields);
        return redirect('/roleplay');
    }

    public function editPost(Post $post, Request $request) {
        if (!auth()->user()) {
            return redirect('/home');
        }

        if (auth()->user()->id !== $post['user_id']) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $incomingFields = $request->validate([
            'body' => 'required|min:300',
            'image' => 'nullable',
            'quest' => 'nullable',
            'character' => 'required'
        ]);

        $incomingFields['body'] = strip_tags($incomingFields['body'], '<p>');

        $quest = Quest::where('name', $incomingFields['quest'])->first();
        if ($quest) {
            $incomingFields['quest_id'] = $quest->id;
        } else {
            $incomingFields['quest_id'] = null;
        }

        $character = Character::where('name', $incomingFields['character'])->first();
        $incomingFields['character_id'] = $character->id;

        $post->update($incomingFields);

        return response()->json([
            'editBody' => $post->body,
            'editCharName' => $character->name,
            'editCharSurname' => $character->surname,
            'editUpdateTime' => $post->updated_at->format('d M Y H:i'),
            'editUserName' => $post->user->name,
            'editQuest' => $quest ? $quest->name : ""
        ]);
    }

    public function deletePost(Post $post, Request $request) {
        if ($request->isMethod('delete')) {

            if (auth()->user()->id !== $post['user_id']) {
                return redirect('/roleplay');
            }

            $post->delete();

            return redirect('/roleplay');
        }
        return redirect('/home');
    }

    public function showPosts() {
        if (auth()->user()) {
            $characters = auth()->user()->characters;
            $posts = Post::orderBy('updated_at', 'desc')->get();
            $users = User::all();
            $allCharacters = Character::all();
            $quests = Quest::all();
            return view('roleplay', compact('characters', 'posts', 'users', 'allCharacters', 'quests'));
        }
        return redirect('/home');
    }

    public function editWindowWithCharacters(Post $post) {
        if (auth()->user()) {
            if (auth()->user()->id !== $post['user_id']) {
                return redirect('/roleplay');
            }

            $characters = auth()->user()->characters;
            return view('edit-post', compact('characters', 'post'));
        }
        return redirect('/home');
    }

    public function filterPosts(Request $request) {
        $authors = $request->input('authors');
        $characters = $request->input('characters');
        $quests = $request->input('quests');
        $questCanBeNull = false;

        foreach ($quests as $quest) {
            if ($quest === "NULL") {
                $questCanBeNull = true;
            }
        }

        $filteredPosts = Post::select('id')
            ->when($authors, function ($query) use ($authors) {
                return $query->whereIn('user_id', $authors);
            })
            ->when($characters, function ($query) use ($characters) {
                return $query->whereIn('character_id', $characters);
            })
            ->when($quests, function ($query) use ($quests, $questCanBeNull) {
                return $query->where(function ($query) use ($quests, $questCanBeNull) {
                    $query->whereIn('quest_id', $quests);
                    if ($questCanBeNull) {
                        $query->orWhereNull('quest_id');
                    }
                });
            })
            ->get();

        return response()->json($filteredPosts);
    }
}
