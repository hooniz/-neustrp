<div class="container p-3">
    <h3>Мои акции</h3>
</div>
<div class="container p-3" style="display:flex; flex-direction: row;flex-wrap: wrap;">
    <?foreach ($data['ACTIONS'] as $action):?>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$action['company']?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Лицензия <?=$action['license']?></h6>
                <a href="#" class="card-link sale" id="<?=$action['actions_id']?>">Продать</a>
            </div>
        </div>
    <?endforeach;?>
</div>
<script src="/js/myActions.js?<?=time()?>"></script>