@extends('layouts.app')

@php($seoKey = 'author')

@section('content')
    <section class="section">
        <div class="container prose stack-lg">
            <h1>Über den Autor dieser Website</h1>

            <p>
                Diese Website wurde mit viel Liebe, Sorgfalt und technischem Anspruch entwickelt.
            </p>

            <p>
                <strong>Stanov Oleksandr</strong> — Webentwickler mit Fokus auf saubere Architektur,
                Performance und langlebige Lösungen.
            </p>

            <h2>Kontakt</h2>
            <p>
                E-Mail:
                <a href="mailto:aleksstanov84@gmail.com">aleksstanov84@gmail.com</a>
            </p>
        </div>
    </section>
@endsection
