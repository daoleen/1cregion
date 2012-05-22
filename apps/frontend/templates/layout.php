<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas(); ?>
    <?php include_metas() ?>
      <title><?php include_slot('title', '1CRegion.ru - биржа фриланса для 1С'); ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
      <div id="container">
          <div id="header">
              <div id="header_logo">
                  <a href="<?php echo url_for("@homepage"); ?>"><img src="/images/logo.png" /></a>
              </div>
              <div id="header_title">
                  <h1>1СRegion.ru - это биржа фриланса</h1>
                  <p>Основное направление нашей биржи - это проекты связанные с ситемой 1С, сайты, дизайн, а также специалисты по бухгалтерскому учету и юрисприденции</p>
                  <p class="action"><font size="4">Проект находится в стадии разработки.</font></p>
              </div>
              <div id="clear"></div>
          </div>
          
        <?php if($sf_user->isAuthenticated()): ?>
          <?php $guardUser = $sf_user->getGuardUser(); ?>
            <div id="user_toolbar">
                <span style="color: #ccc;">Бонус: <b><?php echo $guardUser->Bonus->getBonus(); ?></b></span>
                <a href="<?php echo url_for('@project_new'); ?>">Добавить проект</a>
                <strong><?php echo $guardUser; ?></strong> 
                <a href="<?php echo url_for("@sf_guard_signout"); ?>">Выход</a>
            </div>
        <?php endif; ?>
          
        <div id="content">
            <?php if($sf_user->hasFlash('notice')): ?>
                <div id="notice" class="error">
                    <?php echo $sf_user->getFlash('notice'); ?>
                </div>
            <?php endif; ?>
            
            <?php if($sf_user->hasFlash('notice_notification')): ?>
                <div id="notice" class="notification">
                    <?php echo $sf_user->getFlash('notice_notification'); ?>
                </div>
            <?php endif; ?>
            
            <?php echo $sf_content; ?>
        </div>
        <div id="footer">
            1CRegion.ru&copy;,&nbsp;2012<br />
            All Rights Reserved.
        </div>
      </div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter14044600 = new Ya.Metrika({id:14044600,
                    clickmap:true,
                    trackLinks:true});
        } catch(e) {}
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/14044600" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
      
  </body>
</html>
