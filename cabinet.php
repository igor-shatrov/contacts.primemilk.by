<?php
//var_dump($_COOKIE);
if (!isset($_COOKIE['email']) or trim($_COOKIE['email']) == '') {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>User cabinet</title>
    <link rel="shortcut icon" href="picture/favicon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />

    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cabinet.css">
</head>

<body>
    <header class="site-header">
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><img src="picture/shapka-primemilk.png" alt=""></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#" id="log-out">Выйти</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="tools right-align">
        <a class="waves-effect waves-light btn modal-show" data-modal="#add-new-worker"><i class="material-icons right">add</i>Добавить нового сотрудника</a>
    </div>

    <div class="container white ">
        <div class="col l12">
            <h1 class="site-title">Контакты</h1>
        </div>
        <div class="col l12">
            <form>
                <div class="row">
                    <div class="input-field col l6 s12 ">
                        <input placeholder="Ведите фамилию или имя" id="search" type="text" class="validate">
                        <label for="search">Поиск</label>
                    </div>
                    <div class="input-field col l6 s12">
                        <select class="select" id="main-select">
                            <option id="select-unit-default" value="" selected disabled>Выберите подразделение</option>
                            <option value="Администрация">Администрация</option>
                            <option value="Офис">Офис</option>
                            <option value="Производственная лаборатория">Производственная лаборатория</option>
                            <option value="Производство">Производство</option>
                            <option value="Складское хозяйство">Складское хозяйство</option>
                            <option value="Служба главного инженера">Служба главного инженера</option>
                            <option value="Участок ведомственной охраны">Участок ведоственной охраны</option>

                        </select>
                        <label>Фильтр по подразделениям</label>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- <div class="modal-wrap hide" id="log-in">
        <div class="modal-project">
            <form>
                <div class="row">
                    <div class="input-field col l12">
                        <input placeholder="Your email" name="email" id="login-email" type="text" class="validate">
                        <label for="login-email">Email</label>
                    </div>
                    <div class="input-field col l12">
                        <input name="pass" id="login-pass" type="password">
                        <label for="login-pass">Password</label>
                    </div>
                    <div class="col l12 right-align">
                        <button id="login-submit" class="waves-effect waves-light btn">Login</button>
                    </div>
                </div>
            </form>
            <button class="modal-project-close btn-floating waves-effect waves-light blue lighten-1">
                <i class="material-icons">close</i></button>
        </div>
    </div> -->

    <div class="contacts-base container">
    </div>

    <div class="modal-wrap hide" id="worker-show">
        <div class="modal-worker">
            <div class="col l12 row worker-form">
                <div class="col l4 photo-wrapper">
                    <span class="hide" id="id"></span>
                    <img id="photo" src="" alt="">
                </div>
                <div class="col l8 row">
                    <div class="col l12">
                        <span class="col l4 bold" id="first_name">Фамилия</span>
                        <span class="col l4 bold" id="second_name">ИмЯ</span>
                        <span class="col l4 bold" id="last_name">Отчество</span>
                    </div>
                    <div class="col l12">
                        <span class="col l4">Email:</span>
                        <span class="col l8 bold" id="email"></span>
                    </div>
                    <div class="col l12">
                        <span class="col l4">Мобильный:</span>
                        <span class="col l8 bold" id="mobile_phone"></span>
                    </div>
                    <div class="col l12">
                        <span class="col l4">Внутренний:</span>
                        <span class="col l8 bold" id="inside_phone"></span>
                    </div>
                    <div class="col l12">
                        <span class="col l4">Подразделение:</span>
                        <span class="col l8 bold" id="unit"></span>
                    </div>
                    <div class="col l12">
                        <span class="col l4">Должность:</span>
                        <span class="col l8 bold" id="position"></span>
                    </div>
                    <div class="col l12">
                        <span class="col l4">Дата рождения</span>
                        <span class="col l8 bold" id="birthday"></span>
                    </div>



                </div>
            </div>
            <button class="modal-project-close btn-floating waves-effect waves-light blue lighten-1">
                <i class="material-icons">close</i></button>
            <div class="right-align" id="worker-tools-wrapper">
                <a class="waves-effect waves-light btn right-align blue lighten-1" id="delete-worker"><i class="material-icons right">delete</i>Delete</a>
                <a class="waves-effect waves-light btn right-align blue lighten-1 modal-show" data-modal="#edit-worker" id="edit-worker-btn"><i class="material-icons right">edit</i>Edit</a>
            </div>
            <div class="right-align hide" id="delete-sure-wrapper">
                <p>Вы точно уверены, что хотите удалить данные этого сотрудника?</p>
                <a class="waves-effect waves-light btn right-align red lighten-1" id="delete-worker-yes"><i class="material-icons right">delete_forever</i>Да, удаляем!</a>
                <a class="waves-effect waves-light btn right-align blue lighten-1" id="delete-worker-no"><i class="material-icons right">cancel</i>ААААА, неееет, это ошибка!!!</a>
            </div>
        </div>
    </div>

    <div class="modal-wrap hide" id="add-new-worker">
        <div class="modal-add">
            <div class="col l12 row">
                <div class="col l4">
                    <div class="input-field col l8">
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="photo" id="photo_add">
                        </form>
                    </div>
                </div>
                <form class="col l8">
                    <div class="row">
                        <div class="input-field col l5">
                            <input id="first_name_add" type="text" class="validate">
                            <label for="first_name_add">Фамилия</label>
                        </div>
                        <div class="input-field col l5">
                            <input id="second_name_add" type="text" class="validate">
                            <label for="second_name_add">Имя</label>
                        </div>
                        <div class="input-field col l10">
                            <input id="last_name_add" type="text" class="validate">
                            <label for="last_name_add">Отчество</label>
                        </div>
                        <div class="input-field col l6">
                            <input id="mobile_phone_add" type="text" class="validate">
                            <label for="mobile_phone_add">Мобильный телефон</label>
                        </div>
                        <div class="input-field col l4">
                            <input id="inside_phone_add" type="text" class="validate">
                            <label for="inside_phone_add">Внутренний телефон</label>
                        </div>
                        <div class="input-field col l10">
                            <input id="email_add" type="email" class="validate">
                            <label for="email_add">Email</label>
                        </div>
                        <div class="input-field col l10">
                            <select class="select" id="unit_add">
                                <option value="" disabled selected>Выберите подразделение</option>
                                <option value="Администрация">Администрация</option>
                                <option value="Офис">Офис</option>
                                <option value="Производственная лаборатория">Производственная лаборатория</option>
                                <option value="Производство">Производство</option>
                                <option value="Складское хозяйство">Складское хозяйство</option>
                                <option value="Служба главного инженера">Служба главного инженера</option>
                                <option value="Участок ведомственной охраны">Участок ведоственной охраны</option>

                            </select>
                            <label>Подразделение</label>
                        </div>
                        <div class="input-field col l10">
                            <input id="position_add" type="text" class="validate">
                            <label for="position_add">Должность</label>
                        </div>
                        <div class="input-field col l5">
                            <input type="text" class="datepicker" id="birthday_add" placeholder="1990-01-01">
                            <label for="birthday_add">Дата рождения</label>
                        </div>

                    </div>

            </div>
            </form>
            <button class="modal-project-close btn-floating waves-effect waves-light blue lighten-1">
                <i class="material-icons">close</i></button>
            <div class="right-align">
                <a class="waves-effect waves-light btn right-align blue lighten-1" id="add-new-worker-btn"><i class="material-icons right">add</i>Add</a>
            </div>
        </div>
    </div>

    <div class="modal-wrap hide" id="edit-worker">
        <div class="modal-edit">
            <div class="col l12 row">
                <div class="col l4">
                    <div class="input-field col l12">
                        <span class="hide" id="id_edit"></span>
                        <form method="post" enctype="multipart/form-data" id="photo_edit_form" class="hide">
                            <input type="file" name="photo" id="photo_edit">
                        </form>
                        <div class="col l12 photo-wrapper-edit">
                            <img id="photo_edit_img" class="left-align" src="" alt="">
                        </div>
                        <a class="waves-effect waves-light btn blue lighten-1" id="delete_photo">Удалить фото</a>
                        <div class="right-align hide" id="delete-photo-sure-wrapper">
                            <p>Вы точно уверены, что хотите удалить фото этого сотрудника?</p>
                            <a class="waves-effect waves-light btn right-align red lighten-1" id="delete-photo-yes"><i class="material-icons right">delete_forever</i>Да!</a>
                            <a class="waves-effect waves-light btn right-align blue lighten-1" id="delete-photo-no"><i class="material-icons right">cancel</i>Нет!</a>
                        </div>
                        
                    </div>
                </div>
                <form class="col l8">
                    <div class="row">
                        <div class="input-field col l5">
                            <input id="first_name_edit" type="text" class="validate">
                            <label class="active" for="first_name_edi">Фамилия</label>
                        </div>
                        <div class="input-field col l5">
                            <input id="second_name_edit" type="text" class="validate">
                            <label class="active" for="second_name_edit">Имя</label>
                        </div>
                        <div class="input-field col l10">
                            <input id="last_name_edit" type="text" class="validate">
                            <label class="active" for="last_name_edit">Отчество</label>
                        </div>
                        <div class="input-field col l6">
                            <input id="mobile_phone_edit" type="text" class="validate">
                            <label class="active" for="mobile_phone_edit">Мобильный телефон</label>
                        </div>
                        <div class="input-field col l4">
                            <input id="inside_phone_edit" type="text" class="validate">
                            <label class="active" for="inside_phone_edit">Внутренний телефон</label>
                        </div>
                        <div class="input-field col l10">
                            <input id="email_edit" type="email" class="validate">
                            <label class="active" for="email_edit">Email</label>
                        </div>
                        <div class="input-field col l10">
                            <select class="select" id="unit_edit">
                                <option value="" disabled selected>Выберите подразделение</option>
				 <option value="Администрация">Администрация</option>
                           	 <option value="Офис">Офис</option>
                           	 <option value="Производственная лаборатория">Производственная лаборатория</option>
                   	         <option value="Производство">Производство</option>
                        	 <option value="Складское хозяйство">Складское хозяйство</option>
                           	 <option value="Служба главного инженера">Служба главного инженера</option>
                           	 <option value="Участок ведомственной охраны">Участок ведоственной охраны</option>

                            </select>
                            <label>Подразделение</label>
                        </div>
                        <div class="input-field col l10">
                            <input id="position_edit" type="text" class="validate">
                            <label class="active" for="position_edit">Должность</label>
                        </div>
                        <div class="input-field col l5">
                            <input type="text" class="datepicker" id="birthday_edit" placeholder="1990-01-01">
                            <label class="active" for="birthday_edit">Дата рождения</label>
                        </div>
                    </div>
            </div>



            </form>
            <button class="modal-project-close btn-floating waves-effect waves-light blue lighten-1">
                <i class="material-icons">close</i></button>
            <div class="right-align">
                <a class="waves-effect waves-light btn right-align blue lighten-1" id="save-worker-btn"><i class="material-icons right">cloud</i>Save</a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/cabinet.js"></script>
    <script src="js/take_data.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/delete_worker.js"></script>
    <script src="js/edit.js"></script>
</body>

</html>
