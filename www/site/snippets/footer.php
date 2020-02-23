<footer>
    <div class="footer__background">
        <div class="footer__container">
            <div class="footer-list">
                <ul>
                    <?php if($kirby->language() != "en"): ?>

                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/rounds">
                            Rounds
                        </a>
                    </li>
                    <?php endif ?>

                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/articles">Articles</a>
                    </li>
                    <?php if($kirby->language() != "en"): ?>
                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/podcasts">Podcasts</a>
                    </li>
                    <?php endif ?>

                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/feed.xml">
                            <?php echo t('rss site') ?></a>
                    </li>
                    <?php if($site->language()->code() != "en"): ?>
                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/podcasts/feed.xml">
                            <?php echo t('rss podcasts') ?></a>
                    </li>
                    <?php endif ?>

                </ul>
            </div>
            <div class="footer-list">
                <ul>
                 <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/carte-des-assos-bagarre-francophones">
                            Trouver des joueurs
                        </a>
                    </li>
                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/sponsors">
                            Sponsors
                        </a>
                    </li>
                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/contact">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="https://basgrospoing.fr/<?php echo $kirby->language(); ?>/mentions-legales">
                            <?php echo t('legal') ?></a>
                    </li>

                </ul>
            </div>
            
            <?php snippet('patterns/molecules/footersocial/footersocial') ?>
            <?php snippet('patterns/molecules/footertimer/footertimer') ?>
        </div>
    </div>
</footer>

<?php if($kirby->language() == "fr") { 
        snippet('patterns/molecules/helpbgp/helpbgp');
    } ?>

<div class="theme-switcher" onclick="toggleDarkLight()" title="Toggle dark/light mode">
    <span>
        <svg style="height:20px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 89 89"><title>Fichier 1</title><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><image width="89" height="89" xlink:href="data:image/png;base64,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"/></g></g></svg>
    </span>
</div>

<script>

    document.addEventListener("DOMContentLoaded", function() {
  var lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

  if ("IntersectionObserver" in window) {
    let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          let lazyImage = entry.target;
          lazyImage.src = lazyImage.dataset.src;
          lazyImage.srcset = lazyImage.dataset.srcset;
          lazyImage.classList.remove("lazy");
          lazyImageObserver.unobserve(lazyImage);
        }
      });
    });

    lazyImages.forEach(function(lazyImage) {
      lazyImageObserver.observe(lazyImage);
    });
  } else {
    // Possibly fall back to a more compatible method here
  }
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
  var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
});

</script>


<script>
//Footer countdown
document.addEventListener("DOMContentLoaded", function () {
    var timeoutHandle;
    var hasStarted = false;
    function countdown(minutes) {
        var seconds = 11;

        function tick() {
            var counter = document.getElementById("timer");
            seconds--;
            counter.innerHTML =
                (seconds < 10 ? "" : "") + String(seconds);
            if (seconds > 0) {
                timeoutHandle = setTimeout(tick, 1000);
            } else {
                counter.innerHTML = "GAME OVER";
            }
        }
        tick();
    }

    var footer = document.querySelector('footer');
    var bounding = footer.getBoundingClientRect();
    if (isInViewport(footer) && hasStarted == false) {
        hasStarted = true;
        countdown(0);
    } else {
        window.addEventListener('scroll', function (event) {
            if (isInViewport(footer) && hasStarted == false) {
                hasStarted = true;

                countdown(0);
            }
        }, false);
    }

});

var isInViewport = function (elem) {
    var bounding = elem.getBoundingClientRect();
    return (
        bounding.top >= 0 &&
        bounding.left >= 0 &&
        bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
};

</script>

<script>
  var lastScrollTop = 0;
  var mag;
  if (document.querySelector("#magazine")) {
    window.addEventListener("scroll", function () {
      var st = window.pageYOffset || document.documentElement.scrollTop;
      if (st > lastScrollTop) {
        var header = document.getElementsByTagName("header")[0];
        header.classList.add("header-mag");
      } else {
        var header = document.getElementsByTagName("header")[0];
        header.classList.remove("header-mag");
      }
      lastScrollTop = st;
    }, false);
  }

  window.addEventListener('scroll', function (e) {
    var s = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode ||
      document.body).scrollTop;
    var body = document.body;
    var html = document.documentElement;
    var d = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
    var c = window.innerHeight;
    var position = (s / (d - c)) * 100;
    document.getElementById('Progress-bar').setAttribute('style', 'width: ' + position + '%');
  });
</script>

</body>
</html>