<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Список категорий</title>

    <!-- Bootstrap -->
    <!-- Bootstrap CSS (Cloudflare CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous">
    <!-- jQuery (Cloudflare CDN) -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle JS (Cloudflare CDN) -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Список статей</h1>
        <div class='row'>
            <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addArticle">

                Добавить статью

            </button>

        </div>
        <br />
        <div class='row @if(count($categories)!= 0) show @else hidden @endif' id='articles-wrap'>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($categories as $category)

                    <tr>

                        <td>{{ $category->id }}</td>

                        <td><a href="{{ route('admin.category.show', ['id' => $category->id]) }}">{{ $category->title }}</a></td>

                        <td><a href="" class="delete" data-href=" {{ route('admin.category.destroy',$category->id) }} ">Удалить</a></td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="row">

            <div class="alert alert-warning @if(count($categories) != 0) hidden @else show @endif" role="alert"> Записей нет</div>

        </div>

    </div>

    <!-- Modal -->

    <div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="addArticleLabel">Добавление статьи</h4>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label for="title">Заголовок</label>

                        <input type="text" class="form-control" id="title">

                    </div>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label for="text">Текст</label>

                        <textarea class="form-control" id="text"></textarea>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

                    <button type="button" class="btn btn-primary" id="save">Сохранить</button>

                </div>

            </div>

        </div>

    </div>
    <button type="button" class="btn btn-primary" data-toggle="popover" title="Сообщение" data-content="Ура, Bootstrap 4 работает">Поднеси ко мне курсор</button>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <!-- После подключения jQuery, Popper и Bootstrap JS -->
    <script>
        $(function() {
            alert(jQuery.fn.jquery);
            $('[data-toggle="popover"]').popover({
                trigger: 'hover'
            });
        });
    </script>

</body>

</html>