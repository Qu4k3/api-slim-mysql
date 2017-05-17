<!DOCTYPE html>
<html lang="es" style="background-color:#fff;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>UF4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>


    <style>
        .shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }

        .thumbnail {
            border-radius: 0px;
            background-color: #333;
            border: 1px solid #ddd;
        }

        .iframe {
            min-height: 460px;
            width: 100%;
            border-style: none;
            border: 1px solid #ddd;
            background-color: #ddd;

            white-space:pre;
            display:block;
            unicode-bidi:embed;
        }

        .glyphicon{
            font-size: 12px;
        }
    </style>
</head>

<body style="background-color: rgba(33,38,43,0.98); color:#fff;">

    <section class="container">

        <h2>LSNote API REST</h2>

        <hr>		

        <section class="row" style="margin-top:25px;">

            <section class="col-xs-12 col-sm-6 col-md-4">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>a. /</p>
                                <p><a href="api.php" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>b. Ruta no trobada</p>
                                <p><a href="api.php/qwerty" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>c. /getAll</p>
                                <p><a href="api.php/getAll" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>d. /getPublic</p>
                                <p><a href="api.php/getPublic" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>e. /getOne</p>
                                <p><a href="api.php/getOne" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>f. /insert</p>
                                <p><a href="api.php/insert" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>g. /remove</p>
                                <p><a href="api.php/remove" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>h. /getAllWithTag</p>
                                <p><a href="api.php/getAllWithTag" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>i. /addTagOnNote</p>
                                <p><a href="api.php/addTagOnNote" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>j. /deleteTagOnNote</p>
                                <p><a href="api.php/deleteTagOnNote" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>k. /updateNote</p>
                                <p><a href="api.php/updateNote" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>l. /flipPrivate</p>
                                <p><a href="api.php/flipPrivate" target="iframe_1" class="btn btn-default" role="button">executa <span class="glyphicon glyphicon-link" aria-hidden="true"></span></a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="thumbnail shadow">
                            <div class="caption" style="color:#fff;">
                                <p>m. Ordenar</p>
                                <p>Per les rutes /getAll, /getPublic o /getAllWithTag (Mínim una)</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </section>

            <section class="col-xs-12 col-sm-6 col-md-8">

                <p style="font-weight: bold; font-size: 18px;">Visualització</p>

                <iframe src="api.php" name="iframe_1" height="460" width="100%" class="iframe shadow">
                    <p>Your browser does not support iframes.</p>
                </iframe>


            </section>

        </section>

    </section>

</body>

</html>