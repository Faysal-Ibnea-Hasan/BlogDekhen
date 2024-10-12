<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\Tag\TagRepositoryInterface;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    protected $tagRepository;
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    public function store(TagRequest $request)
    {
        $tag = $request->all();
        $this->tagRepository->create_tag($tag);
        return response()->json([
            'status' => true,
            'message' => 'Tag added successfully'
        ], 200);
    }
    public function myTags()
    {
        $tags = $this->tagRepository->get_tags();
        return view('tag.myTags', [
            'tags' => $tags
        ]);
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $this->tagRepository->change_status($id,$status);
        return response()->json([
            'status' => true,
            'message' => 'Tag status updated successfully'
        ]);
    }
    public function delete(Request $request)
    {
        $tag = Tag::findOrFail($request->id);
        if ($tag) {
            $tag->delete();
            return response()->json([
                'status' => true,
                'message' => 'Tag deleted successfully'
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete the tag.'], 500);
        }
    }
}
