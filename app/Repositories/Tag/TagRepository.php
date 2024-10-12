<?php
namespace App\Repositories\Tag;
use App\Models\Tag;
use Auth;

class TagRepository implements TagRepositoryInterface
{
    public function create_tag($tag)
    {
        Tag::create($tag);
        return true;
    }
    public function get_tags()
    {
        $tags = Tag::where('user_id', Auth::user()->id)->get();
        return $tags;
    }
    public function change_status($id, $status)
    {
        $tags = Tag::findOrFail($id);
        if ($tags) {
            $tags->status = $status;
            $tags->save();
            return true;
        } else {
            return false;
        }
    }
}