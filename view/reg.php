<div class="container" style="width: 100%; display: flex; justify-content: center; align-items: center">
    <div class="container" style="width: 400px; height: 300px; display: flex; flex-direction: column; align-items: center">
        <h4>Регистрация</h4>
        <form class="container-fluid" action="/reg/doreg" method="post" style="width: 100%">
            <div class="form-group">
                <label for="phoneNum">Номер телефона</label>
                <input type="tel" class="form-control" id="phoneNum" placeholder="Введите номер телефона" name="phone" value="<?=$data['VALUES']['phone']?:''?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ФИО</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="names" placeholder="Введите ФИО" value="<?=$data['VALUES']['names']?:''?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Введите пароль">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Повторите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="repeatPassword" aria-describedby="passHelp" placeholder="Введите пароль">
                <small id="passHelp" class="form-text text-muted">Никому не сообщайте свой пароль!</small>
            </div>
            <p class="fs-6">Уже зарегистрированы? <a href="/auth/index" class="text-decoration-underline">Авторизуйтесь</a></p>
            <button type="submit" class="btn btn-primary mt-1">Зарегистрироваться</button>
            <?if($data['ERRORS']):?>
                <p class="text-danger"><?=$data['ERRORS']?></p>
            <?endif;?>
        </form>
    </div>
</div>