<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        $head = $this->seo->render(
            env('APP_NAME') . ' | Upinside Treinamentos',
            'descricao de teste',
            url('/'),
            asset('images/img_bg_1.jpg')
        );

        return view('template.home', [
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function course()
    {
        $head = $this->seo->render(
            env('APP_NAME') . ' | Sobre o Curso',
            'descricao de teste',
            url('/curso'),
            asset('images/img_bg_1.jpg')
        );

        return view('template.course', [
            'head' => $head
        ]);
    }

    public function blog()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $head = $this->seo->render(
            env('APP_NAME') . ' | Blog',
            'descricao de teste',
            url('/blog'),
            asset('images/img_bg_1.jpg')
        );

        return view('template.blog', [
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function article($uri)
    {
        $post = Post::where('uri', $uri)->first();

        $head = $this->seo->render(
            env('APP_NAME') . ' | '.$post->title,
            $post->subtitle,
            url('/article'),
            \Illuminate\Support\Facades\Storage::url(\App\Support\Cropper::thumb($post->cover, 1200, 628))
        );

        return view('template.article', [
            'head' => $head,
            'post' => $post
        ]);
    }

    public function contact()
    {
        $head = $this->seo->render(
            env('APP_NAME') . ' | Contatos',
            'descricao de teste',
            url('/contato'),
            asset('images/img_bg_1.jpg')
        );

        return view('template.contact', [
            'head' => $head
        ]);
    }

    public function sendMail(Request $request)
    {
        $data = [
            'reply_name' => $request->first_name . " " . $request->last_name,
            'reply_email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::send(new Contact($data));

        return redirect()->route('contact');

        //return new Contact($data);
    }
}
