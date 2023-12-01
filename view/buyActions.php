<div class="container p-3">
    <h3>Приобрести акции</h3>
</div>
<div class="container p-3" style="display:flex; flex-direction: row;flex-wrap: wrap;">
    <? foreach ($data['ACTIONS'] as $action):?>
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title"><?=$action['company']?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Лицензия <?=$action['license']?></h6>
                <p class="card-text"><?=$action['description']?></p>
                <p class="card-text"><?=$action['price']?> P</p>
                <a href="#" class="card-link buy" id="<?=$action['id']?>">Купить</a>
            </div>
        </div>
    <?endforeach;?>
</div>
<script src="/js/buyActions.js?<?=time()?>"></script>