;<?php die(''); ?>
;for security reasons , don't remove or modify the first line

locale=fr_FR
charset=UTF-8

availableLocales=fr_FR

; see http://www.php.net/manual/en/timezones.php for supported values
timeZone="Europe/Paris"

theme=default

[modules]
jelix.enabled=on
jelix.installparam[wwwfiles]=vhost

test.enabled=on
news.enabled=on
jfeeds.enabled=on

adminui.enabled=on
adminui.installparam[wwwfiles]=vhost

authcore.enabled=on

jacl2.enabled=on
jacl2.installparam[eps]="[admin]"
jacl2db.enabled=on
jacl2db.installparam[defaultuser]=on
jacl2db.installparam[defaultgroups]=on
authloginpass.enabled=on
jacl2db_admin.enabled=on

[coordplugins]

[responses]
html=testResponse
rss2.0="jfeeds~jResponseRss20"
atom1.0="jfeeds~jResponseAtom10"

[error_handling]
messageLogFormat="%date%\t%ip%\t[%code%]\t%msg%\n\tat: %file%\t%line%\n\turl: %url%\n\t%http_method%: %params%\n\treferer: %referer%\n%trace%\n\n"
errorMessage="Une erreur technique est survenue. Désolé pour ce désagrément."


[compilation]
checkCacheFiletime=on
force=off

[jResponseHtml]
plugins=debugbar

[urlengine]

; enable the parsing of the url. Set it to off if the url is already parsed by another program
; (like mod_rewrite in apache), if the rewrite of the url corresponds to a simple url, and if
; you use the significant engine. If you use the simple url engine, you can set to off.
enableParser=on

multiview=off

; basePath corresponds to the path to the base directory of your application.
; so if the url to access to your application is http://foo.com/aaa/bbb/www/index.php, you should
; set basePath = "/aaa/bbb/www/".
; if it is http://foo.com/index.php, set basePath="/"
; Jelix can guess the basePath, so you can keep basePath empty. But in the case where there are some
; entry points which are not in the same directory (ex: you have two entry point : http://foo.com/aaa/index.php
; and http://foo.com/aaa/bbb/other.php ), you MUST set the basePath (ex here, the higher entry point is index.php so
; : basePath="/aaa/" )
basePath="/"

; leave empty to have jelix error messages
notfoundAct=
;notfoundAct = "jelix~error:notfound"

jelixWWWPath="jelix/"


[fileLogger]
default=messages.log

[mailer]
webmasterEmail="root@localhost"
webmasterName=Root
mailerType=file


[mailLogger]
email="root@localhost"

[acl2]
driver=db
hiddenRights=
hideRights=false
authAdapterClass="\Jelix\Authentication\Core\Acl2Adapter"

[webassets_common]
jquery.js="adminlte-assets/plugins/jquery/jquery.js"
adminlte-bootstrap.require="jquery,jquery_ui"
adminlte-bootstrap.js[]="adminlte-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"
adminlte-fontawesome.css[]="adminlte-assets/plugins/fontawesome-free/css/all.min.css"
adminlte.require="jquery,adminlte-bootstrap,adminlte-fontawesome"
adminlte.css[]="adminlte-assets/dist/css/adminlte.min.css"
adminlte.css[]="adminlte-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
adminlte.css[]="adminui-assets/SourceSansPro/SourceSansPro.css"
adminlte.css[]="adminui-assets/adminui.css"
adminlte.js[]="adminlte-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"
adminlte.js[]="adminlte-assets/plugins/jquery-mousewheel/jquery.mousewheel.js"
adminlte.js[]="adminlte-assets/plugins/fastclick/fastclick.js"
adminlte.js[]="adminlte-assets/dist/js/adminlte.min.js"
adminlte.js[]="adminui-assets/adminui.js"
knob.js[]="adminlte-assets/plugins/jquery-knob/jquery.knob.min.js"
daterangepicker.require=moment
daterangepicker.js[]="adminlte-assets/plugins/daterangepicker/daterangepicker.js"
daterangepicker.css[]="adminlte-assets/plugins/daterangepicker/daterangepicker.css"
jqvmap.js[]="adminlte-assets/plugins/jqvmap/jquery.vmap.js"
jqvmap.css[]="adminlte-assets/plugins/jqvmap/jqvmap.css"
sparkline.js[]="adminlte-assets/plugins/sparklines/sparkline.js"
chartjs.js[]="adminlte-assets/plugins/chart.js/Chart.min.js"
chartjs.css[]="adminlte-assets/plugins/chart.js/Chart.css"
summernote.js[]="adminlte-assets/plugins/summernote/summernote-bs4.min.js"
moment.js[]="adminlte-assets/plugins/moment/moment.min.js"
tempusdominus.require=moment
tempusdominus.js[]="adminlte-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"
tempusdominus.css[]="adminlte-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"

jacl2_admin.css[]="$jelix/design/jacl2.css"
jacl2_admin.js[]="$jelix/js/jacl2db_admin.js"
jacl2_admin.require[]=jquery_ui

[session]
storage=

[adminui]
appVersion=1.0.0
appTitle=Admin
htmlLogo="<b>Admin</b>UI"
htmlLogoMini="<b>A</b>UI"
htmlCopyright="<strong>Copyright &copy; 2024 Jelix.</strong>."
dashboardTemplate=
disableDashboardMenuItem=off
bodyCSSClass=hold-transition
bareBodyCSSClass="hold-transition login-page"
adminlteAssetsUrl="adminlte-assets/"
fullScreenModeEnabled=off
darkmode=off
header.fixed=off
header.border=on
header.smalltext=off
header.color=white
header.darktext=on
header.brand.smalltext=off
sidebar.collapsed=off
sidebar.fixed=off
sidebar.mini=on
sidebar.nav.flat.style=off
sidebar.nav.compact=off
sidebar.nav.child.indent=off
sidebar.nav.child.collapsed=off
sidebar.nav.smalltext=off
sidebar.dark=on
sidebar.current-item.color=primary
footer.fixed=off
footer.smalltext=off
body.smalltext=off

[authentication]
idp[]=loginpass
sessionHandler=php

[sessionauth]
missingAuthAction="authcore~sign:in"
missingAuthAjaxAction=
authRequired=off

[loginpass_idp]
backends[]=dbdao
afterLogin="adminui~default:index"

[loginpass:common]
passwordHashAlgo=1
passwordHashOptions=
deprecatedPasswordCryptFunction=
deprecatedPasswordSalt=

[loginpass:dbdao]
backendType=dbdao
profile=default
dao="authloginpass~user"
sessionAttributes="login,email,username"
