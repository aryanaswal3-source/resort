@extends('layout.site-layout')

@section('title', 'home page')

@push('styles')


@endpush

@section('content')



<section class="hero">
  <svg class="hero-cliffs" viewBox="0 0 1440 420" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Illustration of dark volcanic cliffs above the ocean at dusk">
    <polygon points="0,420 0,260 90,300 170,210 260,270 340,180 430,250 520,150 610,240 700,170 800,260 900,190 1000,270 1100,200 1220,280 1310,220 1440,290 1440,420" fill="#0E1113"></polygon>
    <polygon points="0,420 0,330 120,360 240,320 360,370 480,330 620,380 760,340 900,390 1050,350 1200,390 1320,360 1440,400 1440,420" fill="#191E20"></polygon>
  </svg>
  <div class="hero-content">
    <div class="hero-headline-block">
      <p class="eyebrow dark">Marejada &nbsp;·&nbsp; a cliff above the Atlantic</p>
      <h1 class="serif">Where the ocean<br>runs out of <em>land</em>.</h1>
      <p class="hero-sub">Eighteen rooms cut into black volcanic rock, forty metres above open water. No entertainment schedule. No children under fourteen. Just the tide, the wind, and a very long table.</p>
    </div>
    <div class="horizon-line"></div>
    <div class="hero-below-line">
      <span class="hero-coords mono">28.2916° N &nbsp;16.6291° W</span>
      <span class="hero-scroll">Scroll &nbsp;↓</span>
    </div>
  </div>
</section>

<section class="section intro wrap">
  <div>
    <p class="eyebrow" style="color:var(--sea);margin-bottom:16px;">The cliff</p>
    <h2 class="serif">Built from the stone<br>it stands on.</h2>
  </div>
  <div class="intro-copy">
    <p>Marejada was quarried, not built — the same black basalt pulled from its own foundations was cut, stacked, and set back into the walls of every room. What couldn't be sourced from the cliff was left alone: the wind, the gulls, the sound of the swell against the rock forty metres below.</p>
    <p>There is one road in, and it ends at the door. Everything past that point moves at the pace of the tide.</p>
    <div class="stat-row">
      <div><div class="stat-num serif">18</div><div class="stat-label">Rooms, total</div></div>
      <div><div class="stat-num serif">1957</div><div class="stat-label">Quarry opened</div></div>
      <div><div class="stat-num serif">40m</div><div class="stat-label">Above the water</div></div>
    </div>
  </div>
</section>

<section class="stays section" id="stays">
  <div class="wrap">
    <p class="eyebrow">Stays</p>
    <h2 class="serif">Three ways to sleep<br>above the water.</h2>
  </div>
  <div class="stay-grid">
    <div class="stay-card">
      <div class="stay-mark mono">01</div>
      <h3>The Cliff Room</h3>
      <p>A single volcanic-stone room facing due west, with a plunge pool cut into the rock ledge outside the window.</p>
      <div class="stay-meta"><span>32m² · 1 terrace</span><span class="stay-price">from €410</span></div>
    </div>
    <div class="stay-card">
      <div class="stay-mark mono">02</div>
      <h3>Horizon Suite</h3>
      <p>Two rooms joined by an open-air walkway, built around a private stretch of the cliff's edge and its own stone stair to the sea.</p>
      <div class="stay-meta"><span>58m² · 2 terraces</span><span class="stay-price">from €640</span></div>
    </div>
    <div class="stay-card">
      <div class="stay-mark mono">03</div>
      <h3>The Point</h3>
      <p>The resort's only freestanding house, set apart on the furthest edge of the quarry, with its own kitchen, pool, and boat mooring below.</p>
      <div class="stay-meta"><span>140m² · full house</span><span class="stay-price">from €1,450</span></div>
    </div>
  </div>
</section>

<section class="days section wrap" id="days">
  <p class="eyebrow" style="color:var(--sea);margin-bottom:16px;">Days here</p>
  <h2 class="serif">Set by the tide,<br>not the clock.</h2>
  <p class="days-lede">There's no printed activity board. Instead, a chalk tide table is redrawn each morning at the boathouse — today's reads like this.</p>
  <div class="tide-table">
    <div class="tide-row">
      <span class="tide-time mono">06:40</span>
      <span class="tide-name serif">Dawn swim<span>Off the stone stair, before the boats go out.</span></span>
      <span class="tide-tag">Low tide</span>
    </div>
    <div class="tide-row">
      <span class="tide-time mono">09:15</span>
      <span class="tide-name serif">Boat to the sea caves<span>A forty-minute crossing to the north wall, weather allowing.</span></span>
      <span class="tide-tag">Rising</span>
    </div>
    <div class="tide-row">
      <span class="tide-time mono">14:00</span>
      <span class="tide-name serif">Siesta service<span>Shutters down, terrace bar open, nothing scheduled.</span></span>
      <span class="tide-tag">High tide</span>
    </div>
    <div class="tide-row">
      <span class="tide-time mono">18:30</span>
      <span class="tide-name serif">Wine on the rock<span>An open pour at the western ledge, until the light goes.</span></span>
      <span class="tide-tag">Falling</span>
    </div>
    <div class="tide-row">
      <span class="tide-time mono">21:30</span>
      <span class="tide-name serif">Night dive<span>Guided, torch-lit, for confirmed divers only.</span></span>
      <span class="tide-tag">Low tide</span>
    </div>
  </div>
</section>

<section class="dining section" id="table">
  <div class="wrap dining-inner">
    <div>
      <p class="eyebrow" style="color:var(--sea);margin-bottom:16px;">Table</p>
      <h2 class="serif">One table.<br>One seating.</h2>
      <p>Dinner is served once a night, at a single long stone table that seats the whole house together. The menu isn't printed until the boats come back — it's built that afternoon, around whatever was caught.</p>
      <p>No menus, no substitutions, no separate check. You eat what came off the water today.</p>
    </div>
    <div class="menu-sample">
      <p class="eyebrow">Tonight, subject to the catch</p>
      <div class="menu-item"><span>Raw local amberjack, citrus, oil</span><span>I</span></div>
      <div class="menu-item"><span>Charred octopus, black potato</span><span>II</span></div>
      <div class="menu-item"><span>Grilled catch of the day, ash butter</span><span>III</span></div>
      <div class="menu-item"><span>Goat's curd, fig leaf, honey</span><span>IV</span></div>
    </div>
  </div>
</section>

<section class="cta-strip" id="reserve">
  <h2 class="serif">Come find the edge of it.</h2>
  <a href="#" class="btn-light">Check availability</a>
</section>



@endsection

@push('scripts')


@endpush
