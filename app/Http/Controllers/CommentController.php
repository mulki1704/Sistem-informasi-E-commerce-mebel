<?php
namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, berita $berita)
    {
        if (! Auth::check()) {
            return redirect('/login')->with('LoginError', 'Silakan login terlebih dahulu untuk mengirim komentar.');
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Comment::create([
            'berita_id' => $berita->id,
            'user_id'   => Auth::id(),
            'body'      => $request->body,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }

    public function reply(Request $request, Comment $comment)
    {
        if (! Auth::check()) {
            return redirect('/login')->with('LoginError', 'Silakan login terlebih dahulu untuk membalas komentar.');
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Comment::create([
            'berita_id' => $comment->berita_id,
            'user_id'   => Auth::id(),
            'parent_id' => $comment->id,
            'body'      => $request->body,
        ]);

        return back()->with('success', 'Balasan berhasil dikirim.');
    }

    public function update(Request $request, Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403);
        }

        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment->update(['body' => $request->body]);

        return back()->with('success', 'Komentar berhasil diperbarui.');
    }

    public function destroy(Comment $comment)
    {
        $isAdmin = Auth::check() && Auth::user()->role === 'admin';
        if (Auth::id() !== $comment->user_id && ! $isAdmin) {
            abort(403);
        }

        if ($comment->replies()->exists()) {
            $comment->replies()->delete();
        }

        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'Komentar berhasil dihapus.');
    }

    public function adminIndex()
    {
        $comments = Comment::with(['berita', 'user', 'replies.user', 'parent.user'])
            ->whereNull('parent_id')
            ->latest()
            ->paginate(20);

        return view('backend.comments.index', [
            'title'    => 'Komentar Berita',
            'comments' => $comments,
        ]);
    }

    public function adminShow(Comment $comment)
    {
        $comment->load(['berita', 'user', 'replies.user', 'parent.user']);

        return view('backend.comments.show', [
            'title'   => 'Detail Komentar',
            'comment' => $comment,
        ]);
    }

    public function adminEdit(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            return redirect()->route('admin.comments.index')
                ->with('error', 'Hanya komentar yang Anda miliki yang dapat diedit.');
        }

        $comment->load(['berita', 'user', 'parent.user']);

        return view('backend.comments.edit', [
            'title'   => 'Edit Komentar',
            'comment' => $comment,
        ]);
    }

    public function adminDelete(Comment $comment)
    {
        $comment->load(['berita', 'user', 'parent.user']);

        return view('backend.comments.delete', [
            'title'   => 'Hapus Komentar',
            'comment' => $comment,
        ]);
    }
}
