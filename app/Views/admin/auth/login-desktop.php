<?php /** Login DESKTOP (mockup hal. 16 desktop): merpati berpita kiri, cupid kanan, ikon amplop/gembok/mata. */ ?>
<main class="flex min-h-screen items-center justify-center p-6 lg:p-10">
  <div class="login-paper w-full max-w-[1080px] px-8 py-14 lg:px-12">
    <img src="<?= e(asset('images/ornaments/hydrangea-corner-top.png')) ?>" alt="" class="pointer-events-none absolute right-0 top-0 w-40 xl:w-52">
    <img src="<?= e(asset('images/ornaments/hydrangea-corner-bottom.png')) ?>" alt="" class="pointer-events-none absolute bottom-0 left-0 w-32 xl:w-40">

    <div class="relative grid items-center gap-6 lg:grid-cols-[1fr_minmax(0,24rem)_1fr]">
      <img src="<?= e(asset('images/ornaments/doves-ribbon-gold.png')) ?>" alt="" class="hidden w-full max-w-[22rem] justify-self-end lg:block">

      <div class="mx-auto w-full max-w-sm">
        <h1 class="login-title text-center text-[4.2rem] leading-[.85] xl:text-[5rem]">Admin<br>Masuk</h1>
        <div class="my-5"><?= component('divider', ['class' => 'mx-auto max-w-[11rem]']) ?></div>

        <form method="post" action="/admin/login" class="space-y-4" novalidate>
          <?= csrf_field() ?>
          <div class="relative">
            <label for="identity" class="sr-only">Email atau nama pengguna</label>
            <img src="<?= e(asset('images/ui/icon-envelope.png')) ?>" alt="" class="pointer-events-none absolute left-4 top-1/2 h-5 w-auto -translate-y-1/2 opacity-80">
            <input id="identity" name="identity" type="text" autocomplete="username" placeholder="Email / Nama pengguna" class="field field-soft !pl-12 font-semibold" required>
          </div>
          <div class="relative">
            <label for="password" class="sr-only">Kata sandi</label>
            <img src="<?= e(asset('images/ui/icon-lock.png')) ?>" alt="" class="pointer-events-none absolute left-4 top-1/2 h-5 w-auto -translate-y-1/2 opacity-80">
            <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Kata sandi" class="field field-soft !pl-12 !pr-12 font-semibold" required>
            <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full p-1.5 hover:bg-gold-soft/60" data-toggle-password="password" aria-label="Tampilkan password" aria-pressed="false">
              <img src="<?= e(asset('images/ui/icon-eye.png')) ?>" alt="" class="h-4 w-auto opacity-80">
            </button>
          </div>
          <button type="submit" class="login-btn">Masuk</button>
        </form>
      </div>

      <img src="<?= e(asset('images/ornaments/cupid-gold.png')) ?>" alt="" class="hidden w-full max-w-[20rem] justify-self-start lg:block">
    </div>
  </div>
</main>
<?php if (!empty($flash)): ?><div hidden data-flash="<?= e($flash['text']) ?>" data-flash-type="<?= e($flash['type']) ?>"></div><?php endif; ?>
