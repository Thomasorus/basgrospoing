<div class="timer">
    <a class="timer__continue" href="http://patreon.com/basgrospoing"  >Continue?</a>
    <div id="timer"></div>


    <?php if($kirby->language() == "fr"): ?>
        <a class="timer_coin"href="http://patreon.com/basgrospoing">Insert coin!</a>
    <?php else: ?>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business"
        value="admin@basgrospoing.fr">

    <!-- Specify a Donate button. -->
    <input type="hidden" name="cmd" value="_donations">

    <!-- Specify details about the contribution -->
    <input type="hidden" name="item_name" value="Bas Gros Poing">
    <input type="hidden" name="item_number" value="Articles about fighting games">
    <input type="hidden" name="currency_code" value="USD" />

    <!-- Display the payment button. -->

    <button name="submit"  alt="Donate" style='background:transparent; border:none;'> <h4 style="display: block;
    margin: 10px;
    color: #FFF; cursor:pointer; text-decoration:underline;
     letter-spacing: -1px;">Insert coin!</h4></button>

  

    </form>
    <?php endif ?>
    <p><?= t('help') ?></p>
</div>