<div class="container" style="width: 100%; display: flex; justify-content: center; align-items: center">
    <div class="container" style="width: 400px; height: 300px; display: flex; flex-direction: column; align-items: center">
        <h4>Авторизация</h4>
        <form class="container-fluid" action="/auth/doauth" method="post" style="width: 100%;">
            <div class="form-group">
                <label for="phoneNum">Номер телефона</label>
                <input type="tel" class="form-control" id="phoneNum" placeholder="Введите номер телефона" name="phone" value="<?=$data['VALUES']['phone']?:''?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" aria-describedby="passHelp" placeholder="Введите пароль">
                <small id="passHelp" class="form-text text-muted">Никому не сообщайте свой пароль!</small>
            </div>
            <p class="fs-6">Еще не зарегистрированы? <a href="/reg/index" class="text-decoration-underline">Зарегистрируйтесь</a></p>
            <button type="submit" class="btn btn-primary mt-1">Войти</button>
            <?if($data['ERRORS']):?>
                <p class="text-danger"><?=$data['ERRORS']?></p>
            <?endif;?>
        </form>
    </div>
</div>