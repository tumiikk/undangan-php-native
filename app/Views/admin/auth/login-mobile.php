<?php /** Login MOBILE (mockup hal. 16 mobile): hanya cupid di atas, tanpa ikon pada field. */ ?>
<main class="mx-auto flex min-h-screen max-w-[26rem] items-center px-4 py-8">
  <div class="login-paper w-full px-6 pb-14 pt-8">
    <img src="<?= e(asset('images/ornaments/hydrangea-corner-top.png')) ?>" alt="" class="pointer-events-none absolute right-0 top-0 w-28">
    <img src="<?= e(asset('images/ornaments/hydrangea-corner-bottom.png')) ?>" alt="" class="pointer-events-none absolute bottom-0 left-0 w-24">

    <div class="relative">
      <img src="<?= e(asset('images/ornaments/cupid-gold.png')) ?>" alt="" class="mx-auto -ml-1 w-[78%] max-w-[16rem]">
      <h1 class="login-title -mt-2 text-center text-[3.6rem] leading-[.85]">Admin<br>Masuk</h1>
      <div class="my-4"><?= component('divider', ['class' => 'mx-auto max-w-[9rem]']) ?></div>

      <form method="post" action="/admin/login" class="space-y-3.5" novalidate>
        <?= csrf_field() ?>
        <div>
          <label for="identity" class="sr-only">Email atau nama pengguna</label>
          <input id="identity" name="identity" type="text" autocomplete="username" placeholder="Email / Nama pengguna" class="field field-soft font-semibold" required>
        </div>
        <div>
          <label for="password" class="sr-only">Kata sandi</label>
          <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Kata sandi" class="field field-soft font-semibold" required>
        </div>
        <button type="submit" class="login-btn">Masuk</button>
      </form>
    </div>
  </div>
</main>
<?php if (!empty($flash)): ?><div hidden data-flash="<?= e($flash['text']) ?>" data-flash-type="<?= e($flash['type']) ?>"></div><?php endif; ?>
