<?php

namespace App\Http\Livewire;

use App\Post;
use App\UserLikedPost;
use App\UserPostComment;
use Livewire\Component;

class ReadPost extends Component
{
    public $post, $liked, $comments, $commented, $other_comments = [];

    public function mount($slug){
        $this->post = Post::where('slug', $slug)->firstOrFail();
        $this->commented = false;
        if($this->post) {
            $this->liked = UserLikedPost::where('user_id', auth()->id())->where('post_id', $this->post->id)->exists();
            $this->commented = UserPostComment::where('user_id', auth()->id())->where('post_id', $this->post->id)->exists();
        }
    }
    protected $rules = [
        'comments' => 'required'
    ];
    public function render()
    {
        return view('livewire.read-post')
            ->extends('layouts.app');
    }
    public function toggleLike(){
        $this->liked = !$this->liked;
        
        if($this->liked) {
            UserLikedPost::updateOrCreate([
                'user_id' => auth()->id(),
                'post_id' => $this->post->id
            ]);
        } else {
            UserLikedPost::where('user_id', auth()->id())->where('post_id', $this->post->id)->delete();
        }
    }
    public function addComments(){
        $this->validate();

        UserPostComment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'comments' => $this->comments
        ]);
        
        $this->commented = true;
    }
}
