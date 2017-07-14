<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    
    <script src="assets/jquery.js"></script>


    <link rel="stylesheet" type="text/css" href="semantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="semantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="semantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/transition.css">
    
    <style type="text/css">

        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }
        .masthead .logo.item img {
            margin-right: 1em;
        }
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        .ui.vertical.stripe .button + h3,
        .ui.vertical.stripe p + h3 {
            margin-top: 3em;
        }
        .ui.vertical.stripe .floated.image {
            clear: both;
        }
        .ui.vertical.stripe p {
            font-size: 1.33em;
        }
        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }
        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
            .masthead.segment {
                min-height: 350px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }

    </style>

    <script src="semantic/dist/components/visibility.js"></script>
    <script src="semantic/dist/components/sidebar.js"></script>
    <script src="semantic/dist/components/transition.js"></script>

    <script>
      $(document)
        .ready(function() {

          // fix menu when passed
          $('.masthead')
            .visibility({
              once: false,
              onBottomPassed: function() {
                $('.fixed.menu').transition('fade in');
              },
              onBottomPassedReverse: function() {
                $('.fixed.menu').transition('fade out');
              }
            })
          ;

          // create sidebar and attach to menu open
          $('.ui.sidebar')
            .sidebar('attach events', '.toc.item')
          ;

        })
      ;
    </script>
</head>
<body>

<div class="ui large top fixed hidden menu">
    <div class="ui container">
        <a class="active item">Главная страница</a>
        <a class="item">Товары</a>
        <a class="item">О Компании</a>
        <a class="item">Вакансии</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button">Log in</a>
            </div>
            <div class="item">
                <a class="ui primary button">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
    <a class="active item">Главная страница</a>
    <a class="item">Товары</a>
    <a class="item">О компании</a>
    <a class="item">Вакансии</a>
    <a class="item">Вход</a>
    <a class="item">Регистрация</a>
</div>
<div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment">
        <div class="ui container">
            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="active item">Главная страница</a>
                    <a class="item">Товары</a>
                    <a class="item">О компании</a>
                    <a class="item">Вакансии</a>
                    <div class="right item">
                        <a class="ui inverted button">Вход</a>
                        <a class="ui inverted button">Регистрация</a>
                    </div>
                </div>
            </div>

            <div class="ui text container">
                <h1 class="ui inverted header">
                    Магазин диковин
                </h1>
                <h2>Мы продаем разные штуки, которые вам не нужны. Но вы их купите.</h2>
                <div class="ui huge primary button">Начать тратить деньги <i class="right arrow icon"></i></div>
            </div>

        </div>
    </div>
    <div class="ui container">
        
    </div>
</div>

</body>
</html>